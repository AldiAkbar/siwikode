<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Artikel extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('M_Artikel');
        $this->load->model('M_User');
        $this->load->helper('text');
        $this->load->helper('admin');
    }

    public function index() {

        $data['title'] = 'Article Management';
        $data['user'] = $this->M_User->getUser();
        $data['artikel'] = $this->M_Artikel->getArtikel();
        $data['kategori_wisata'] = $this->M_Artikel->getKategoriWisata();

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('v_admin/artikel', $data);
        $this->load->view('layouts/footer');
    }

    public function view($slug)
    {
        $data['title'] = 'Article Management';
        $data['user'] = $this->M_User->getUser();
        $data['artikel'] = $this->M_Artikel->getArtikelBySlug($slug);

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('v_admin/view_artikel', $data);
        $this->load->view('layouts/footer');
    }

    public function edit($slug)
    {
        $data['title'] = 'Article Management';
        $data['user'] = $this->M_User->getUser();
        $data['artikel'] = $this->M_Artikel->getArtikelBySlug($slug);
        $data['kategori_wisata'] = $this->M_Artikel->getKategoriWisata();

        $this->form_validation->set_rules('judul_artikel', 'Title', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori Artikel', 'required');
        $this->form_validation->set_rules('penulis', 'Penulis', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|min_length[250]');

        if ($this->form_validation->run() == false) {
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar', $data);
            $this->load->view('layouts/topbar', $data);
            $this->load->view('v_admin/edit_artikel', $data);
            $this->load->view('layouts/footer');
        } else {
            $id = $this->input->post('id');
            $old_image = $this->input->post('old_image');
            $new_image = $_FILES['image']['name'];
            $image = $this->M_Artikel->uploadImage("artikel", $old_image, $new_image);
            $data = [
                'id' => $id,
                'slug' => create_slug(strtolower($this->input->post('judul_artikel'))),
                'title' => $this->input->post('judul_artikel', true),
                'kategori_wisata_id' => $this->input->post('kategori'),
                'preview' => word_limiter(strip_tags($this->input->post('deskripsi')), 10),
                'penulis' => $this->input->post('penulis'),
                'image' => $image,
                'date_created' => date('Y-m-d H-i-s'),
                'detail_artikel' => $this->input->post('deskripsi', TRUE)
            ];

            $this->M_Artikel->update($id, $data);

            $this->session->set_flashdata('message', 'Diubah');
            redirect('admin/artikel');
        }
    }

    public function delete($id) {
        $old_image = $this->M_Artikel->getImageArtikel($id);
        unlink("asset/img/artikel/" . $old_image['image']);
        $this->M_Artikel->delete($id);


        $this->session->set_flashdata('message', 'Dihapus');
        redirect('admin/artikel');
    }

    public function add_kategori()
    {
        $data = [
            'kategori' => $this->input->post('kategori_artikel'),
            'slug' => create_slug(strtolower($this->input->post('kategori_artikel')))
        ];

        $this->M_Artikel->createKategori($data);
        $this->session->set_flashdata('kategori', 'Ditambahkan');
        redirect('admin/artikel');
    }

    public function edit_kategori()
    {
        $id = $this->input->post('id');
        $data = [
            'id' => $id,
            'kategori' => $this->input->post('kategori_artikel'),
            'slug' => create_slug(strtolower($this->input->post('kategori_artikel')))
        ];

        $this->M_Artikel->updateKategori($id, $data);
        $this->session->set_flashdata('kategori', 'Diubah');
        redirect('admin/artikel');
    }

    public function delete_kategori($id)
    {
        $this->M_Artikel->deleteKategori($id);
        $this->session->set_flashdata('kategori', 'Dihapus');
        redirect('admin/artikel');
    }
    

}
