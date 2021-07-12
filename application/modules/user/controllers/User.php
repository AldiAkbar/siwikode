<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        
        $this->load->model('M_User');
    }

    public function index() {
        $data['title'] = 'My Profile';
        $data['user'] = $this->M_User->getUser();
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('v_user/index', $data);
        $this->load->view('layouts/footer');
    }

    public function editProfile() {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->M_User->getUser();
        
        $this->form_validation->set_rules('name', 'Name', 'required');
        if($this->form_validation->run() == false) {
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar', $data);
            $this->load->view('layouts/topbar', $data);
            $this->load->view('v_user/edit_profile', $data);
            $this->load->view('layouts/footer');
        } else {
            $email = $this->input->post('email');
            $name = $this->input->post('name');

            $image = $_FILES['image']['name'];
            if ($image) {
                $config['upload_path'] = 'asset/img/profile/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '1024';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'asset/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated.</div>');
            redirect('user');

        }
    }

    public function changePassword() {
        $data['title'] = 'Change Password';
        $data['user'] = $this->M_User->getUser();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[8]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Repeat Password', 'required|trim|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar', $data);
            $this->load->view('layouts/topbar', $data);
            $this->load->view('v_user/change_password', $data);
            $this->load->view('layouts/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');

            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your current password is wrong!</div>');
                redirect('user/changePassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your current password cannot be same with new password.</div>');
                    redirect('user/changePassword');
                } else {
                    $password = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your password has been changed.</div>');
                    redirect('user/changePassword');
                }
            }
        }
    }

    

}