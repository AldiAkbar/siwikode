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
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your new menu has been succesfully added.</div>');
            redirect('admin/menu');
        }
    }

    public function editMenu() {
        $data['menu'] = $this->M_Menu->getMenu();

        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your menu has not been edited</div>');
            redirect('menu');
        } else {
            $id = $this->input->post('id');
            $menu = $this->input->post('menu');
            $data = [
                'id' => $id,
                'menu' => $menu
            ];

            $this->db->where('id', $id);
            $this->db->update('user_menu', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your menu has been edited.</div>');
            redirect('admin/menu');
        }
    }

    public function deleteMenu($id) {
        $this->db->delete('user_menu', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your menu has been succesfully deleted.</div>');
        redirect('admin/menu');
    }

}