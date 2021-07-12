<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Artikel extends CI_Controller {

    protected $user;

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('M_Home');
        if ($this->session->userdata("email")) {
			$this->user = $this->M_Home->getAccount();
		}
    }

    public function index() {
        $data['title'] = 'Artikel';
        $data['user'] = $this->user;
        $data['artikel'] = $this->M_Home->getArtikel();

        $this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('v_home/artikel',$data);
		$this->load->view('layouts/footer');
    }

    public function detail($id) {
        $data['title'] = 'Artikel';
        $data['user'] = $this->user;

        $this->load->model('M_Artikel');
        $data['artikel'] = $this->M_Artikel->getArtikelById($id);

        $this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('v_home/detail_artikel',$data);
		$this->load->view('layouts/footer');
    }

}