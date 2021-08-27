<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Artikel extends CI_Controller {

    protected $user;

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('M_Home');
        $this->load->model('M_Artikel');
        if ($this->session->userdata("email")) {
			$this->user = $this->M_Home->getAccount();
		}
    }

    public function index()
    {
        $data['title'] = 'Artikel';
        $data['user'] = $this->user;
        $data['artikel'] = $this->M_Home->getArtikel();
        $data['categories'] = $this->M_Artikel->getCategory();

        $this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('v_home/artikel',$data);
		$this->load->view('layouts/footer');
    }

    public function kategori($category)
    {
        $data['title'] = 'Artikel';
        $data['user'] = $this->user;
        $data['category'] = $this->M_Artikel->getCategorySelected($category);
        $data['category_name'] = $data['category']['kategori'];
        $kategori_wisata_id = $data['category']['id'];
        $data['artikel'] = $this->M_Home->getArtikel($kategori_wisata_id);

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/navbar', $data);
        $this->load->view('v_home/kategori_artikel', $data);
        $this->load->view('layouts/footer');
    }

    public function detail($slug)
    {
        $data['title'] = 'Artikel';
        $data['user'] = $this->user;

        $data['artikel'] = $this->M_Artikel->getArtikelBySlug($slug);

        $this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('v_home/detail_artikel',$data);
		$this->load->view('layouts/footer');
    }

}