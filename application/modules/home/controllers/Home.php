<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {

    protected $user;

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('M_Home');
        if ($this->session->userdata("email")) {
			$this->user = $this->M_Home->getAccount();
		}
    }

    public function index()
    {
        $data['user'] = $this->user;
        $data['rekreasi'] = $this->M_Home->getRekreasi();
        $data['artikel'] = $this->M_Home->getArtikel();
        $data['kuliner'] = $this->M_Home->getKuliner();
        $data['menu_kuliner'] = $this->M_Home->getMenuKuliner();
        $data['testimoni'] = $this->M_Home->getTestimoni();

        $data['title'] = 'Beranda';
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/navbar', $data);
        $this->load->view('v_home/index', $data);
        $this->load->view('layouts/footer');
    }

    public function inbox()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'pesan' => $this->input->post('pesan')
        ];
        // var_dump($data);
        // die;
        $this->db->insert('message', $data);
        $this->session->set_flashdata('message', 'Dikirim');
        redirect('home');
    }

    public function about() {
        $data['title'] = 'Tentang';
        $data['user'] = $this->user;

        $this->load->model('M_Tentang');
        $data['kontributor'] = $this->M_Tentang->getKontributor();

        $this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('v_home/about',$data);
		$this->load->view('layouts/footer');
    }

}