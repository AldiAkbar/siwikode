<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Rekreasi extends CI_Controller {

    protected $user;

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('M_Home');
        $this->load->model('M_Rekreasi');

        if ($this->session->userdata("email")) {
			$this->user = $this->M_Home->getAccount();
		}
    }

    public function index() {
        $data['title'] = 'Wisata Rekreasi';
        $data['user'] = $this->user;
        $data['rekreasi'] = $this->M_Home->getRekreasi();

        $data['descRekreasi'] = $this->M_Rekreasi->getDescRekreasi('rekreasi');

        $this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('v_home/rekreasi',$data);
		$this->load->view('layouts/footer');
    }

    public function detail($slug)
    {
        $data['title'] = 'Wisata Rekreasi';
        $data['user'] = $this->user;
        $data['rekreasi'] = $this->M_Rekreasi->getDetailRekreasi($slug);

        $this->load->view('layouts/header',$data);
		$this->load->view('layouts/navbar',$data);
		$this->load->view('v_home/detail_rekreasi',$data);
		$this->load->view('layouts/footer');
    }

}