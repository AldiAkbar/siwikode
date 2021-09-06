<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kuliner extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('M_Writer');
        $this->load->model('M_Kuliner');
        $this->load->helper('writer');
    }

    public function index() {
        
        $data['title'] = 'Write Kuliner';
        $data['user'] = $this->M_Writer->getUser();
        $data['kuliner'] = $this->M_Kuliner->getKuliner();
        $data['jenis_kuliner'] = $this->M_Kuliner->getJenisKuliner();

        $this->form_validation->set_rules('nama_restoran', 'Nama Restoran', 'required');
        $this->form_validation->set_rules('jenis_restoran', 'Jenis Restoran', 'required');
        $this->form_validation->set_rules('menu', 'Menu Restoran', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|max_length[100]');
        $this->form_validation->set_rules('buka', 'Waktu Buka', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|min_length[100]');

        if ($this->form_validation->run() == false) {
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar', $data);
            $this->load->view('layouts/topbar', $data);
            $this->load->view('v_writer/write_kuliner', $data);
            $this->load->view('layouts/footer');
        } else {
            $image = $this->M_Kuliner->uploadImage("kuliner");
            $data = [
                'slug' => create_slug(strtolower($this->input->post('nama_restoran'))),
                'name' => $this->input->post('nama_restoran'),
                'image' => $image,
                'jenis_kuliner_id' => $this->input->post('jenis_restoran'),
                'menu' => $this->input->post('menu'),
                'price' => $this->input->post('harga'),
                'address' => $this->input->post('alamat'),
                'time_open' => $this->input->post('buka'),
                'deskripsi' => $this->input->post('deskripsi')
            ];
            // var_dump($data);
            // die;

            $this->db->insert('kuliner', $data);
            $this->session->set_flashdata('message', 'Ditambahkan');
            redirect('writer/kuliner');
        }
    }


}