<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Artikel extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('M_Writer');
        $this->load->model('M_Artikel');
    }

    public function index() {
        
        $data['title'] = 'Write Article';
        $data['user'] = $this->M_Writer->getUser();
        $data['artikel'] = $this->M_Artikel->getArtikel();

        $this->form_validation->set_rules('judul_artikel', 'Title', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori Artikel', 'required');
        $this->form_validation->set_rules('penulis', 'Penulis', 'required');
        $this->form_validation->set_rules('preview', 'Preview', 'required|max_length[100]');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|min_length[250]');

        if ($this->form_validation->run() == false) {
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar', $data);
            $this->load->view('layouts/topbar', $data);
            $this->load->view('v_writer/write_artikel', $data);
            $this->load->view('layouts/footer');
        } else {
            $image = $this->M_Artikel->uploadImage("artikel");
            $data = [
                'title' => $this->input->post('judul_artikel'),
                'category_artikel_id' => $this->input->post('kategori'),
                'preview' => $this->input->post('preview'),
                'penulis' => $this->input->post('penulis'),
                'image' => $image,
                'detail_artikel' => $this->input->post('deskripsi')
            ];
            // var_dump($data);
            // die;

            $this->db->insert('artikel', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your new article has been succesfully added.</div>');
            redirect('writer/artikel');
        }
    }


}