<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kuliner extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('M_Kuliner');
        $this->load->model('M_User');
    }

    public function index() {

        $data['title'] = 'Kuliner Management';
        $data['user'] = $this->M_User->getUser();
        $data['kuliner'] = $this->M_Kuliner->getKuliner();
        $data['jenis_kuliner'] = $this->M_Kuliner->getJenisKuliner();

        $this->form_validation->set_rules('name', 'Nama Kuliner', 'required');
        $this->form_validation->set_rules('jenis_kuliner', 'Jenis Kuliner', 'required');
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        $this->form_validation->set_rules('price', 'Harga', 'required');
        $this->form_validation->set_rules('time_open', 'Waktu Buka', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar', $data);
            $this->load->view('layouts/topbar', $data);
            $this->load->view('v_admin/kuliner', $data);
            $this->load->view('layouts/footer');
        } else {
            $id = $this->input->post('id');
            $data = [
                'id' => $id,
                'name' => $this->input->post('name'),
                'jenis_kuliner_id' => $this->input->post('jenis_kuliner'),
                'menu' => $this->input->post('menu'),
                'price' => $this->input->post('price'),
                'time_open' => $this->input->post('time_open'),
            ];
            // var_dump($data);
            // die;

            $this->db->where('id', $id);
            $this->db->update('kuliner', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Wisata Kuliner has been succesfully updated.</div>');
            redirect('admin/kuliner');
        }


    }

    public function delete($id) {
        $this->db->delete('kuliner', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your Wisata Kuliner has been successfully deleted.</div>');
        redirect('admin/kuliner');
    }
    

}
