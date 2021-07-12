<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SubMenu extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('M_User');
        $this->load->model('M_Menu');
    }

    public function index() {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->M_User->getUser();
        
        $data['menu'] = $this->M_Menu->getMenu();
        $data['subMenu'] = $this->M_Menu->getSubMenu('menu');

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar', $data);
            $this->load->view('layouts/topbar', $data);
            $this->load->view('v_admin/submenu', $data);
            $this->load->view('layouts/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];

            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your new submenu has been succesfully added.</div>');
            redirect('admin/SubMenu');
        }
    }

    public function editSubMenu() {
        $data['menu'] = $this->M_Menu->getMenu();
        $data['subMenu'] = $this->M_Menu->getSubMenu('menu');

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');
    
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your submenu has not been edited.</div>');
            redirect('admin/SubMenu');
        } else {
            $id = $this->input->post('id');
            $data = [
                'id' => $id,
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];

            $this->db->where('id', $id);
            $this->db->update('user_sub_menu', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your submenu has been successfully edited.</div>');
            redirect('admin/SubMenu');
        }
    }

    public function deleteSubMenu($id) {
        $this->db->delete('user_sub_menu', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your submenu has been successfully deleted.</div>');
        redirect('admin/SubMenu');
    }

    


}