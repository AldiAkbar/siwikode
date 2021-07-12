<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Rekreasi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('M_Writer');
        $this->load->model('M_Rekreasi');
    }

    public function index() {
        
        $data['title'] = 'Write Rekreasi';
        $data['user'] = $this->M_Writer->getUser();
        $data['rekreasi'] = $this->M_Rekreasi->getRekreasi();
        $data['jenis_rekreasi'] = $this->M_Rekreasi->getJenisRekreasi();

        $this->form_validation->set_rules('name', 'Nama Wisata', 'required');
        $this->form_validation->set_rules('jenis_rekreasi', 'Jenis Rekreasi', 'required');
        $this->form_validation->set_rules('facility', 'Fasilitas', 'required');
        $this->form_validation->set_rules('ticket', 'Tiket Masuk', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|max_length[100]');
        $this->form_validation->set_rules('time_open', 'Waktu Buka', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|min_length[100]');

        if ($this->form_validation->run() == false) {
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar', $data);
            $this->load->view('layouts/topbar', $data);
            $this->load->view('v_writer/write_rekreasi', $data);
            $this->load->view('layouts/footer');
        } else {
            $image = $this->M_Rekreasi->uploadImage("rekreasi");
            $data = [
                'name' => $this->input->post('name'),
                'image' => $image,
                'jenis_rekreasi_id' => $this->input->post('jenis_rekreasi'),
                'facility' => $this->input->post('facility'),
                'ticket' => $this->input->post('ticket'),
                'address' => $this->input->post('alamat'),
                'time_open' => $this->input->post('time_open'),
                'deskripsi' => $this->input->post('deskripsi')
            ];
            // var_dump($data);
            // die;

            $this->db->insert('rekreasi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your new Wisata Rekreasi has been succesfully added.</div>');
            redirect('writer/rekreasi');
        }
    }


}