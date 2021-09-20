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
            $this->M_Role->create(['role' => $this->input->post('role')]);
            $this->session->set_flashdata('message', 'Ditambah');
            redirect('admin/role');
        }
    }

    public function editRole() {
        $data['role'] = $this->M_Role->getRole();

        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == true) {
            $id = $this->input->post('id');
            $role = $this->input->post('role');
            $data = [   
                'id'    => $id,
                'role'  => $role
            ];

            $this->M_Role->update($id, $data);
            $this->session->set_flashdata('message', 'Diubah');
            redirect('admin/role');
        }
    }

    public function deleteRole($id) {
        $this->M_Role->delete($id);
        $this->session->set_flashdata('message', 'Dihapus');
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

        $result = $this->M_Role->getAccessMenu($data);

        if ($result->num_rows() < 1) {
            $this->M_Role->createAccess($data);
        } else {
            $this->M_Role->deleteAccess($data);
        }

        $this->session->set_flashdata('message', 'Diubah');

    }

}