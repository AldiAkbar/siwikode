<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Rekreasi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('M_Rekreasi');
        $this->load->model('M_User');
        $this->load->helper('text');
        $this->load->helper('admin');
    }

    public function index() {

        $data['title'] = 'Rekreasi Management';
        $data['user'] = $this->M_User->getUser();
        $data['rekreasi'] = $this->M_Rekreasi->getRekreasi();
        $data['jenis_rekreasi'] = $this->M_Rekreasi->getJenisRekreasi();

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('v_admin/rekreasi', $data);
        $this->load->view('layouts/footer');

    }

    public function view($slug)
    {
        $data['title'] = 'Rekreasi Management';
        $data['user'] = $this->M_User->getUser();
        $data['rekreasi'] = $this->M_Rekreasi->getRekreasiBySlug($slug);

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('v_admin/view_rekreasi', $data);
        $this->load->view('layouts/footer');
    }

    public function edit($slug)
    {
        $data['title'] = 'Rekreasi Management';
        $data['user'] = $this->M_User->getUser();
        $data['rekreasi'] = $this->M_Rekreasi->getRekreasiBySlug($slug);
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
            $this->load->view('v_admin/edit_rekreasi', $data);
            $this->load->view('layouts/footer');
        } else {
            $id = $this->input->post('id');
            $old_image = $this->input->post('old_image');
            $new_image = $_FILES['image']['name'];
            $image = $this->M_Rekreasi->uploadImage("rekreasi", $old_image, $new_image);
            $data = [
                'id' => $id,
                'slug' => create_slug(strtolower($this->input->post('name'))),
                'name' => $this->input->post('name'),
                'image' => $image,
                'jenis_rekreasi_id' => $this->input->post('jenis_rekreasi'),
                'facility' => $this->input->post('facility'),
                'ticket' => $this->input->post('ticket'),
                'address' => $this->input->post('alamat'),
                'time_open' => $this->input->post('time_open'),
                'deskripsi' => $this->input->post('deskripsi')
            ];

            $this->M_Rekreasi->update($id, $data);
            $this->session->set_flashdata('message', 'Diubah');
            redirect('admin/rekreasi');
        }
    }

    public function delete($id) {
        $old_image = $this->M_Rekreasi->getImageRekreasi($id);
        unlink("asset/img/rekreasi/" . $old_image['image']);
        $this->M_Rekreasi->delete($id);

        $this->session->set_flashdata('message', 'Dihapus');
        redirect('admin/rekreasi');
    }
    

}
