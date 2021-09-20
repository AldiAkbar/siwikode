<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('M_User');
        $this->load->model('M_Menu');
    }

    public function index() {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->M_User->getUser();
        
        $data['menu'] = $this->M_Menu->getMenu();

        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar', $data);
            $this->load->view('layouts/topbar', $data);
            $this->load->view('v_admin/menu', $data);
            $this->load->view('layouts/footer');
        } else {
            $this->M_Menu->create($this->input->post('menu'));
            $this->session->set_flashdata('message', 'Ditambah');
            redirect('admin/menu');
        }
    }

    public function editMenu() {
        $data['menu'] = $this->M_Menu->getMenu();

        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if ($this->form_validation->run() == true) {
            $id = $this->input->post('id');
            $menu = $this->input->post('menu');
            $data = [
                'id' => $id,
                'menu' => $menu
            ];

            $this->M_Menu->update($id, $data);

            $this->session->set_flashdata('message', 'Diubah');
            redirect('admin/menu');
        }
    }

    public function deleteMenu($id) {
        $this->M_Menu->delete($id);
        $this->session->set_flashdata('message', 'Dihapus');
        redirect('admin/menu');
    }

}