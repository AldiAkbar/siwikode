<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kuliner extends CI_Controller {

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
            $data['title'] = 'Wisata Kuliner';
            $data['user'] = $this->user;
            $data['kuliner'] = $this->M_Home->getKuliner();

            $this->load->model('M_Kuliner');
            $data['descKuliner'] = $this->M_Kuliner->getDescKuliner('kuliner');

            $this->load->view('layouts/header',$data);
            $this->load->view('layouts/navbar',$data);
            $this->load->view('v_home/kuliner',$data);
            $this->load->view('layouts/footer');
    }

    public function detail($id) {
        $data['title'] = 'Wisata Kuliner';
        $this->load->model('M_Kuliner');
        $data['user'] = $this->user;
        $data['kuliner'] = $this->M_Kuliner->getKulinerById($id);

        $this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('v_home/detail_kuliner',$data);
		$this->load->view('layouts/footer');
    }

}