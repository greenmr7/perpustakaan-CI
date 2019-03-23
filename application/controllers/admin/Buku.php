<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{

    public function __construct() {
      parent::__construct();
      // $this->load->model('home_model');
      $this->load->model('buku_model');
      $this->load->model('jenis_model');
      $this->load->model('bahasa_model');
    }


    public function index(){
      $buku = $this->buku_model->listing();

      $data = array('title' => 'Data Buku('.count($buku).')',
                  'buku'	=> 	$buku,
                  'isi'   => 'admin/buku/list'
                  );
        $this->load->view('admin/layout/file', $data, false);
    }

    public function tambah(){
			$jenis = $this->jenis_model->listing();
			$bahasa = $this->bahasa_model->listing();

      $valid = $this->form_validation;
      $valid->set_rules('judul_buku','Judul Buku','required', array( 'required' => 'Judul Buku harus diisi'));
      $valid->set_rules('penulis_buku','Penulis Buku','required', array( 'required' => 'Penulis Buku harus diisi'));
     if($valid->run()) {
       if(!empty($_FILES['cover_buku']['name'])){
        $config['upload_path']   = './assets/upload/buku/';
        $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
        $config['max_size']      = '12000'; // KB
        $this->upload->initialize($config);
        if(! $this->upload->do_upload('cover_buku')) {
     // End validasi

         $data = array( 'title' 	=> 'Create Buku/Administrator',
    										// 'home'  => $home,
    										'jenis'		=> $jenis,
    										'bahasa'	=> $bahasa,
                        'error'   => $this->upload->display_errors(),
                        'isi'  		=> 'admin/buku/tambah');
         $this->load->view('admin/layout/file',$data,false);

     // masuk database
     }else{
        $upload_data        		    = array('uploads' =>$this->upload->data());
        // Image Editor
        $config['image_library']  	= 'gd2';
        $config['source_image']   	= './assets/upload/buku/'.$upload_data['uploads']['file_name'];
        $config['new_image']      	= './assets/upload/buku/thumbs/';
        $config['create_thumb']   	= TRUE;
        $config['quality']        	= "100%";
        $config['maintain_ratio']   = TRUE;
        $config['width']       		  = 360; // Pixel
        $config['height']       	  = 360; // Pixel
        $config['x_axis']         	= 0;
        $config['y_axis']         	= 0;
        $config['thumb_marker']   	= '';
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
   			$i = $this->input;
   			$data = array( 	'id_user'				  => 	$this->session->userdata('id_user'),
   											'id_jenis'				=>	$i->post('id_jenis'),
   											'id_bahasa'		    =>	$i->post('id_bahasa'),
   											'judul_buku'		  => 	$i->post('judul_buku'),
   											'penulis_buku'		=>	$i->post('penulis_buku'),
                        'subjek_buku'	    =>  $i->post('subjek_buku'),
                        'letak_buku'    	=>  $i->post('letak_buku'),
                        'kode_buku'	      =>  $i->post('kode_buku'),
                        'kolasi'	        =>  $i->post('kolasi'),
                        'penerbit'	      =>  $i->post('penerbit'),
                        'no_seri'	        =>  $i->post('no_seri'),
                        'status_buku'	    =>  $i->post('status_buku'),
                        'ringkasan'	      =>  $i->post('ringkasan'),
                        'cover_buku'	    =>  $upload_data['uploads']['file_name'],
                        'jumlah_buku'   	=>  $i->post('jumlah_buku'),
   											'tanggal_entri'  	=>  Date('Y-m-d H:i:s')
                      );
   			$this->buku_model->tambah($data);
   			$this->session->set_flashdata('success','Buku/Administrator created successfully');
   			redirect(base_url('admin/buku'),'refresh');
 		 }
   }else {
     $i = $this->input;
     $data = array( 	'id_user'				  => 	$this->session->userdata('id_user'),
                     'id_jenis'			  	=>	$i->post('id_jenis'),
                     'id_bahasa'		    =>	$i->post('id_bahasa'),
                     'judul_buku'		    => 	$i->post('judul_buku'),
                     'penulis_buku'	  	=>	$i->post('penulis_buku'),
                     'subjek_buku'	    =>  $i->post('subjek_buku'),
                     'letak_buku'      	=>  $i->post('letak_buku'),
                     'kode_buku'	      =>  $i->post('kode_buku'),
                     'kolasi'	          =>  $i->post('kolasi'),
                     'penerbit'	        =>  $i->post('penerbit'),
                     'no_seri'	        =>  $i->post('no_seri'),
                     'status_buku'	    =>  $i->post('status_buku'),
                     'ringkasan'	      =>  $i->post('ringkasan'),
                     'jumlah_buku'     	=>  $i->post('jumlah_buku'),
                     'tanggal_entri'  	=>  Date('Y-m-d H:i:s')
                   );
     $this->buku_model->tambah($data);
     $this->session->set_flashdata('success','Buku/Administrator created successfully');
     redirect(base_url('admin/buku'),'refresh');
     }
   }
   $data = array( 'title' 	=> 'Create Buku/Administrator',
                  // 'home'  => $home,
                  'jenis'		=> $jenis,
                  'bahasa'	=> $bahasa,
                  'isi'  		=> 'admin/buku/tambah');
   $this->load->view('admin/layout/file',$data,false);
  }

  // Edit Buku
	public function edit($id_buku) {
		// $home = $this->home_model->listing();
		$buku = $this->buku_model->detail($id_buku);

		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama','Nama','required', array( 'required' => 'Nama harus diisi'));

	  $valid->set_rules('email','Email','required|valid_email',
 												array( 'required' 		=> 'email harus diisi',
	 												 		 'valid_email'	=> 'Email tidak valid'));

		if($valid->run()===FALSE) {
		// End validasi

			$data = array( 	'title' 	=> 'Edit Buku/Administrator'.$buku->nama,
											'buku'		=> $buku,
											'isi' 		=> 'admin/buku/edit');
			$this->load->view('admin/layout/file',$data);
		// masuk database
		}else{
			$i = $this->input;
			if(strlen($i->post('password')) > 6  ){
				$data = array( 	'id_buku'			=> 	$id_buku,
												'nama'				=> 	$i->post('nama'),
												'email'				=>	$i->post('email'),
                        'password'		=>	sha1($i->post('password')), //enkripsi md5+
                        'keterangan'	=>	$i->post('keterangan'),
												'akses_level'	=> $i->post('akses_level'));
			}else {
				$data = array( 	'id_buku'			=> 	$id_buku,
												'nama'				=> 	$i->post('nama'),
												'email'				=>	$i->post('email'),
                        'keterangan'  =>	$i->post('keterangan'),
												'akses_level'	=>  $i->post('akses_level'));
			}
			$this->buku_model->edit($data);
			$this->session->set_flashdata('success','Buku/Administrator updated successfully');
			redirect(base_url('admin/buku'));
		}
		// End masuk database
	}

  // Delete Buku
	public function delete($id_buku) {
    //proteksi halaman
    if($this->session->userdata('bukuname') == "" && $this->session->userdata('akses_level') == "" ){
      $this->session->set_flashdata('Success','Silahkan login terlebih dahulu');
      redirect(base_url('login'),'refresh');
    }

    $buku = $this->buku_model->detail($id_buku);

    if($buku->cover_buku != ""){
      unlink('./assets/upload/buku/'.$buku->cover_buku);
      unlink('./assets/upload/buku/thumbs'.$buku->cover_buku);
    }

		$data = array('id_buku'=> $id_buku);
		$this->buku_model->delete($data);
		$this->session->set_flashdata('Success','Buku/Administrator Deleted successfully');
		redirect (base_url('admin/buku'),'refresh');
	}
}
