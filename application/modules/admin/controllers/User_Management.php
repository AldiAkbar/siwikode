<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_Management extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('M_User');
        $this->load->model('M_Menu');
    }

    public function index() {
        $data['title'] = 'User Management';
        $data['user'] = $this->M_User->getUser();
        $data['listUser'] = $this->M_User->getListUser(); 

        $this->load->model('M_Role');
        $data['role'] = $this->M_Role->getRole();

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            "is_unique" => 'This email has already registered'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]');

        if ($this->form_validation->run() == false) {
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar', $data);
            $this->load->view('layouts/topbar', $data);
            $this->load->view('v_admin/user', $data);
            $this->load->view('layouts/footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('username'), true),
                'email' => htmlspecialchars($this->input->post('email'), true),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role_id'),
                'is_active' => $this->input->post('is_active'),
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', 'Ditambah');
            redirect('admin/user');
        }
    }

    public function editUser() {
        $data['user'] = $this->M_User->getUser();
        $id = $this->input->post('id');
        if (!empty($this->input->post('password'))) {
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        } else {
            $password = $data['user']['password'];
        } 
        $data = [
            'name' => htmlspecialchars($this->input->post('username'), true),
            'email' => htmlspecialchars($this->input->post('email'), true),
            'password' => $password,
            'role_id' => $this->input->post('role_id'),
            'is_active' => $this->input->post('is_active'),
        ]; 

        $this->db->where('id', $id);
        $this->db->update('user', $data);

        $this->session->set_flashdata('message', 'Diubah');
        redirect('admin/user');
    }

    public function deleteUser($id) {
        $old_image = $this->M_User->getImageUser($id);
        unlink("asset/img/profile/" . $old_image['image']);

        $this->db->delete('user', ['id'=>$id]);
        $this->session->set_flashdata('message', 'Dihapus');
        redirect('admin/user');
    }

}