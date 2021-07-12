<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Writer extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('M_Writer');
    }

    public function index() {
        $data['title'] = 'Profile Writer';
        $data['user'] = $this->M_Writer->getUser();

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('v_writer/index', $data);
        $this->load->view('layouts/footer');
    }


}