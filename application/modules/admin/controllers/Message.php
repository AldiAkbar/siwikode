<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Message extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('M_Message');
        $this->load->model('M_User');
    }

    public function index()
    {
        $data['title'] = 'Message Received';
        $data['user'] = $this->M_User->getUser();
        $data['message'] = $this->M_Message->getMessage();

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('v_admin/message', $data);
        $this->load->view('layouts/footer');
    }

    public function delete($id)
    {
        $this->db->delete('message', ['id' => $id]);
        $this->session->set_flashdata('message', 'Dihapus');
        redirect('admin/message');
    }
}
