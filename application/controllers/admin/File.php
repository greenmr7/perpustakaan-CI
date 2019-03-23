<?php
defined('BASEPATH') or exit('No direct script access allowed');

class File extends CI_Controller
{

    public function __construct() {
      parent::__construct();
      // $this->load->model('home_model');
      $this->load->model('file_model');
      $this->load->model('buku_model');
    }


    public function index(){
      $file = $this->file_model->listing();

      $data = array('title' => 'Data File Buku ('.count($file).')',
                  'file'	=> 	$file,
                  'isi'   => 'admin/file/list'
                  );
        $this->load->view('admin/layout/file', $data, false);
    }

    //kelola file buku
    public function kelola($id_buku){
      $file = $this->file_model->buku($id_buku);
      $buku = $this->buku_model->detail($id_buku);

      $data = array('title' => 'Data File Buku : '.$buku->judul_buku.'('.count($file).')',
                  'file'	=> 	$file,
                  'buku'	=> 	$buku,
                  'isi'   => 'admin/file/list'
                  );
        $this->load->view('admin/layout/file', $data, false);
    }

    public function tambah(){
			$jenis = $this->jenis_model->listing();
			$bahasa = $this->bahasa_model->listing();

      $valid = $this->form_validation;
      $valid->set_rules('judul_file','Judul File','required', array( 'required' => 'Judul File harus diisi'));
      $valid->set_rules('penulis_file','Penulis File','required', array( 'required' => 'Penulis File harus diisi'));
     if($valid->run()) {
       if(!empty($_FILES['cover_file']['name'])){
        $config['upload_path']   = './assets/upload/file/';
        $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
        $config['max_size']      = '12000'; // KB
        $this->upload->initialize($config);
        if(! $this->upload->do_upload('cover_file')) {
     // End validasi

         $data = array( 'title' 	=> 'Create File',
    										// 'home'  => $home,
    										'jenis'		=> $jenis,
    										'bahasa'	=> $bahasa,
                        'error'   => $this->upload->display_errors(),
                        'isi'  		=> 'admin/file/tambah');
         $this->load->view('admin/layout/file',$data,false);

     // masuk database
     }else{
        $upload_data        		    = array('uploads' =>$this->upload->data());
        // Image Editor
        $config['image_library']  	= 'gd2';
        $config['source_image']   	= './assets/upload/file/'.$upload_data['uploads']['file_name'];
        $config['new_image']      	= './assets/upload/file/thumbs/';
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
   											'judul_file'		  => 	$i->post('judul_file'),
   											'penulis_file'		=>	$i->post('penulis_file'),
                        'subjek_file'	    =>  $i->post('subjek_file'),
                        'letak_file'    	=>  $i->post('letak_file'),
                        'kode_file'	      =>  $i->post('kode_file'),
                        'kolasi'	        =>  $i->post('kolasi'),
                        'penerbit'	      =>  $i->post('penerbit'),
                        'tahun_terbit'	  =>  $i->post('tahun_terbit'),
                        'no_seri'	        =>  $i->post('no_seri'),
                        'status_file'	    =>  $i->post('status_file'),
                        'ringkasan'	      =>  $i->post('ringkasan'),
                        'cover_file'	    =>  $upload_data['uploads']['file_name'],
                        'jumlah_file'   	=>  $i->post('jumlah_file'),
   											'tanggal_entri'  	=>  Date('Y-m-d H:i:s')
                      );
   			$this->file_model->tambah($data);
   			$this->session->set_flashdata('success','File created successfully');
   			redirect(base_url('admin/file'),'refresh');
 		 }
   }else {
     $i = $this->input;
     $data = array( 	'id_user'				  => 	$this->session->userdata('id_user'),
                     'id_jenis'			  	=>	$i->post('id_jenis'),
                     'id_bahasa'		    =>	$i->post('id_bahasa'),
                     'judul_file'		    => 	$i->post('judul_file'),
                     'penulis_file'	  	=>	$i->post('penulis_file'),
                     'subjek_file'	    =>  $i->post('subjek_file'),
                     'letak_file'      	=>  $i->post('letak_file'),
                     'kode_file'	      =>  $i->post('kode_file'),
                     'kolasi'	          =>  $i->post('kolasi'),
                     'penerbit'	        =>  $i->post('penerbit'),
                     'tahun_terbit'	  =>  $i->post('tahun_terbit'),
                     'no_seri'	        =>  $i->post('no_seri'),
                     'status_file'	    =>  $i->post('status_file'),
                     'ringkasan'	      =>  $i->post('ringkasan'),
                     'jumlah_file'     	=>  $i->post('jumlah_file'),
                     'tanggal_entri'  	=>  Date('Y-m-d H:i:s')
                   );
     $this->file_model->tambah($data);
     $this->session->set_flashdata('success','File created successfully');
     redirect(base_url('admin/file'),'refresh');
     }
   }
   $data = array( 'title' 	=> 'Create File',
                  // 'home'  => $home,
                  'jenis'		=> $jenis,
                  'bahasa'	=> $bahasa,
                  'isi'  		=> 'admin/file/tambah');
   $this->load->view('admin/layout/file',$data,false);
  }

  // Edit File
  public function edit($id_file){
    $file = $this->file_model->detail($id_file);
    $jenis = $this->jenis_model->listing();
    $bahasa = $this->bahasa_model->listing();

    $valid = $this->form_validation;
    $valid->set_rules('judul_file','Judul File','required', array( 'required' => 'Judul File harus diisi'));
    $valid->set_rules('penulis_file','Penulis File','required', array( 'required' => 'Penulis File harus diisi'));
   if($valid->run()) {
     if(!empty($_FILES['cover_file']['name'])){
      $config['upload_path']   = './assets/upload/file/';
      $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
      $config['max_size']      = '12000'; // KB
      $this->upload->initialize($config);
      if(! $this->upload->do_upload('cover_file')) {
   // End validasi

       $data = array( 'title' 	=> 'Edit File '.$file->judul_file,
                      // 'home'  => $home,
                      'file'		=> $file,
                      'jenis'		=> $jenis,
                      'bahasa'	=> $bahasa,
                      'error'   => $this->upload->display_errors(),
                      'isi'  		=> 'admin/file/edit');
       $this->load->view('admin/layout/file',$data,false);

   // masuk database
   }else{
      $upload_data        		    = array('uploads' =>$this->upload->data());
      // Image Editor
      $config['image_library']  	= 'gd2';
      $config['source_image']   	= './assets/upload/file/'.$upload_data['uploads']['file_name'];
      $config['new_image']      	= './assets/upload/file/thumbs/';
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

      if($file->cover_file != ""){
        unlink('./assets/upload/file/'.$file->cover_file);
        unlink('./assets/upload/file/thumbs'.$file->cover_file);
      }

      $i = $this->input;
      $data = array( 	'id_file'				  => 	$id_file,
                      'id_user'				  => 	$this->session->userdata('id_user'),
                      'id_jenis'				=>	$i->post('id_jenis'),
                      'id_bahasa'		    =>	$i->post('id_bahasa'),
                      'judul_file'		  => 	$i->post('judul_file'),
                      'penulis_file'		=>	$i->post('penulis_file'),
                      'subjek_file'	    =>  $i->post('subjek_file'),
                      'letak_file'    	=>  $i->post('letak_file'),
                      'kode_file'	      =>  $i->post('kode_file'),
                      'kolasi'	        =>  $i->post('kolasi'),
                      'penerbit'	      =>  $i->post('penerbit'),
                      'tahun_terbit'	  =>  $i->post('tahun_terbit'),
                      'no_seri'	        =>  $i->post('no_seri'),
                      'status_file'	    =>  $i->post('status_file'),
                      'ringkasan'	      =>  $i->post('ringkasan'),
                      'cover_file'	    =>  $upload_data['uploads']['file_name'],
                      'jumlah_file'   	=>  $i->post('jumlah_file')
                    );
      $this->file_model->edit($data);
      $this->session->set_flashdata('success','File edited successfully');
      redirect(base_url('admin/file'),'refresh');
   }
 }else {
   $i = $this->input;
   $data = array(  'id_file'				  => 	$id_file,
                   'id_user'				  => 	$this->session->userdata('id_user'),
                   'id_jenis'			  	=>	$i->post('id_jenis'),
                   'id_bahasa'		    =>	$i->post('id_bahasa'),
                   'judul_file'		    => 	$i->post('judul_file'),
                   'penulis_file'	  	=>	$i->post('penulis_file'),
                   'subjek_file'	    =>  $i->post('subjek_file'),
                   'letak_file'      	=>  $i->post('letak_file'),
                   'kode_file'	      =>  $i->post('kode_file'),
                   'kolasi'	          =>  $i->post('kolasi'),
                   'penerbit'	        =>  $i->post('penerbit'),
                   'tahun_terbit'	    =>  $i->post('tahun_terbit'),
                   'no_seri'	        =>  $i->post('no_seri'),
                   'status_file'	    =>  $i->post('status_file'),
                   'ringkasan'	      =>  $i->post('ringkasan'),
                   'jumlah_file'     	=>  $i->post('jumlah_file')
                 );
   $this->file_model->edit($data);
   $this->session->set_flashdata('success','File edited successfully');
   redirect(base_url('admin/file'),'refresh');
   }
 }
 $data = array( 'title' 	=> 'Edit File '.$file->judul_file,
                // 'home'  => $home,
                'file'		=> $file,
                'jenis'		=> $jenis,
                'bahasa'	=> $bahasa,
                'isi'  		=> 'admin/file/edit');
 $this->load->view('admin/layout/file',$data,false);
}

  // Delete File
	public function delete($id_file) {
    //proteksi halaman
    if($this->session->userdata('filename') == "" && $this->session->userdata('akses_level') == "" ){
      $this->session->set_flashdata('Success','Silahkan login terlebih dahulu');
      redirect(base_url('login'),'refresh');
    }

    $file = $this->file_model->detail($id_file);

    if($file->cover_file != ""){
      unlink('./assets/upload/file/'.$file->cover_file);
      unlink('./assets/upload/file/thumbs'.$file->cover_file);
    }

		$data = array('id_file'=> $id_file);
		$this->file_model->delete($data);
		$this->session->set_flashdata('Success','File Deleted successfully');
		redirect (base_url('admin/file'),'refresh');
	}
}
