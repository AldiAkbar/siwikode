<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Role extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('M_User');
        $this->load->model('M_Role');
    }

    public function index() {
        $data['title'] = 'Access Manager';
        $data['user'] = $this->M_User->getUser();
        $data['role'] = $this->M_Role->getRole();

        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar', $data);
            $this->load->view('layouts/topbar', $data);
            $this->load->view('v_admin/role', $data);
            $this->load->view('layouts/footer');
        } else {
            $this->db->insert('user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your new role has been succesfully added.</div>');
            redirect('admin/role');
        }
    }

    public function editRole() {
        $data['role'] = $this->M_Role->getRole();

        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your new role has not been edited.</div>');
            redirect('admin/role');
        } else {
            $id = $this->input->post('id');
            $role = $this->input->post('role');
            $data = [   
                'id'    => $id,
                'role'  => $role
            ];

            $this->db->where('id', $id);
            $this->db->update('user_role', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your new role has been succesfully edited.</div>');
            redirect('admin/role');
        }
    }

    public function deleteRole($id) {
        $this->db->delete('user_role', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your role has been succesfully deleted.</div>');
        redirect('admin/role');
        
    }

    public function roleAccess($role_id) {
        $data['title'] = 'Role Access';
        $data['user'] = $this->M_User->getUser();
        $data['role'] = $this->M_Role->getRoleById($role_id);

        // $this->db->where('id != '. 1);
        $this->load->model('M_Menu');
        $data['menu'] = $this->M_Menu->getMenu();
    
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('v_admin/roleAccess', $data);
        $this->load->view('layouts/footer');
    
    }

    public function changeAccess() {
        $menu_id = $this->input->get('menuId');
        $role_id = $this->input->get('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your role access has been succesfully changed.</div>');

    }

}