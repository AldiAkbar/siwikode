<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        
        $this->load->model('M_User');
        $this->load->model('M_Admin');
    }

    public function index() {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->M_User->getUser();
        $data['total_user'] = $this->M_Admin->getCountUser();
        $data['total_rekreasi'] = $this->M_Admin->getCountRekreasi();
        $data['total_kuliner'] = $this->M_Admin->getCountKuliner();
        $data['total_artikel'] = $this->M_Admin->getCountArtikel();

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('v_admin/index', $data);
        $this->load->view('layouts/footer');
    }


}