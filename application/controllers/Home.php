<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		
	}

	public function index()
	{
		// $site = $this->home_model->listing();
		// $produk	= $this->produk_model->home();
		// $new	= $this->produk_model->new();
		// $berita = $this->berita_model->home();
		// $slide = $this->galeri_model->slide();

    $data = array('title'  			=> 'Sistem Informasi Katalog Buku Online',//$site['namaweb'].' | '.$site['tagline']
									// 'produk'			=> $produk,
									// 'new'					=> $new,
									// 'berita'  		=> $berita,
									// 'slide'  			=> $slide,
                  'isi'    			=> 'home/list');

    $this->load->view('layout/file',$data,FALSE);
	}
}
