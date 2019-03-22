<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{

    public function __construct() {
      parent::__construct();
      // $this->load->model('home_model');
      $this->load->model('buku_model');
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
      $valid = $this->form_validation;
      $valid->set_rules('nama','Nama','required', array( 'required' => 'Nama harus diisi'));
      $valid->set_rules('email','Email','required|valid_email',
  		 									array( 'required' 		=> '%s harus diisi',
  														 'valid_email'	=> '%s tidak valid'));

      $valid->set_rules('bukuname','Bukuname','required|is_unique[buku.bukuname]',
  											array( 'required' 	=> '%s harus diisi',
  														 'is_unique'	=> '%s: <strong>'.$this->input->post('bukuname').
  						   							 '</strong> sudah digunakan. Buat bukuname baru!'));

      $valid->set_rules('password','Password','required|max_length[32]|min_length[6]',
  											array( 'required' 		=> 'Password harus diisi',
  														 'min_length'		=> 'password min 6 character',
  													 	 'max_length'		=> 'password max 32 character'));

     if($valid->run()===FALSE) {
     // End validasi

     $data = array( 'title' => 'Create Buku/Administrator',
                    // 'home'  => $home,
                    'isi'  => 'admin/buku/tambah');
     $this->load->view('admin/layout/file',$data,false);

     // masuk database
     }else{
 			$i = $this->input;
 			$data = array( 	'nama'				=> 	$i->post('nama'),
 											'email'				=>	$i->post('email'),
 											'bukuname'		=>	$i->post('bukuname'),
 											'password'		=>	sha1($i->post('password')), //enkripsi md5
 											'keterangan'		=>	$i->post('keterangan'),
 											'akses_level'	=>  $i->post('akses_level'));
 			$this->buku_model->tambah($data);
 			$this->session->set_flashdata('success','Buku/Administrator created successfully');
 			redirect(base_url('admin/buku'),'refresh');
 		}
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
    if($this->session->bukudata('bukuname') == "" && $this->session->bukudata('akses_level') == "" ){
      $this->session->set_flashdata('Success','Silahkan login terlebih dahulu');
      redirect(base_url('login'),'refresh');
    }

		$data = array('id_buku'=> $id_buku);
		$this->buku_model->delete($data);
		$this->session->set_flashdata('Success','Buku/Administrator Deleted successfully');
		redirect (base_url('admin/buku'),'refresh');
	}
}
