<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Artikel extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('M_Artikel');
        $this->load->model('M_User');
    }

    public function index() {

        $data['title'] = 'Article Management';
        $data['user'] = $this->M_User->getUser();
        $data['artikel'] = $this->M_Artikel->getArtikel();
        $data['category_artikel'] = $this->M_Artikel->getCategoryArtikel();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori Artikel', 'required');
        $this->form_validation->set_rules('penulis', 'Penulis', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar', $data);
            $this->load->view('layouts/topbar', $data);
            $this->load->view('v_admin/artikel', $data);
            $this->load->view('layouts/footer');
        } else {
            $id = $this->input->post('id');
            $data = [
                'id' => $id,
                'title' => $this->input->post('title'),
                'category_artikel_id' => $this->input->post('kategori'),
                'penulis' => $this->input->post('penulis'),
            ];
            // var_dump($data);
            // die;

            $this->db->where('id', $id);
            $this->db->update('artikel', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your article has been succesfully updated.</div>');
            redirect('admin/artikel');
        }


    }

    public function delete($id) {
        $this->db->delete('artikel', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your article has been successfully deleted.</div>');
        redirect('admin/artikel');
    }
    

}
