<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kuliner extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('M_Kuliner');
        $this->load->model('M_User');
        $this->load->helper('text');
        $this->load->helper('admin');
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
            $this->session->set_flashdata('message', 'Diubah');
            redirect('admin/kuliner');
        }

    }

    public function view($slug)
    {
        $data['title'] = 'Kuliner Management';
        $data['user'] = $this->M_User->getUser();
        $data['kuliner'] = $this->M_Kuliner->getKulinerBySlug($slug);

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('v_admin/view_kuliner', $data);
        $this->load->view('layouts/footer');
    }

    public function edit($slug)
    {
        $data['title'] = 'Kuliner Management';
        $data['user'] = $this->M_User->getUser();
        $data['kuliner'] = $this->M_Kuliner->getKulinerBySlug($slug);
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
            $this->load->view('v_admin/edit_kuliner', $data);
            $this->load->view('layouts/footer');
        } else {
            $id = $this->input->post('id');
            $old_image = $this->input->post('old_image');
            $new_image = $_FILES['image']['name'];
            $image = $this->M_Kuliner->uploadImage("kuliner", $old_image, $new_image);
            $data = [
                'id' => $id,
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
            // die();

            $this->db->where('id', $id);
            $this->db->update('kuliner', $data);

            $this->session->set_flashdata('message', 'Diubah');
            redirect('admin/kuliner');
        }
    }

    public function delete($id) {
        $old_image = $this->M_Kuliner->getImageKuliner($id);
        unlink("asset/img/kuliner/" . $old_image['image']);
        $this->db->delete('kuliner', ['id' => $id]);

        $this->session->set_flashdata('message', 'Dihapus');
        redirect('admin/kuliner');
    }
    
}
