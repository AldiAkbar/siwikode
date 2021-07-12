<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        
        $this->load->model('M_User');
    }

    public function index() {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->M_User->getUser();
        $data['total_user'] = $this->M_User->getCountUser();
        $data['total_rekreasi'] = $this->M_User->getCountRekreasi();
        $data['total_kuliner'] = $this->M_User->getCountKuliner();
        $data['total_artikel'] = $this->M_User->getCountArtikel();

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('v_admin/index', $data);
        $this->load->view('layouts/footer');
    }


}