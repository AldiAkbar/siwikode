<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Rekreasi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('M_Rekreasi');
        $this->load->model('M_User');
    }

    public function index() {

        $data['title'] = 'Rekreasi Management';
        $data['user'] = $this->M_User->getUser();
        $data['rekreasi'] = $this->M_Rekreasi->getRekreasi();
        $data['jenis_rekreasi'] = $this->M_Rekreasi->getJenisRekreasi();

        $this->form_validation->set_rules('name', 'Nama Wisata', 'required');
        $this->form_validation->set_rules('jenis_rekreasi', 'Jenis Rekreasi', 'required');
        $this->form_validation->set_rules('facility', 'Fasilitas', 'required');
        $this->form_validation->set_rules('ticket', 'Tiket Masuk', 'required');
        $this->form_validation->set_rules('time_open', 'Waktu Buka', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar', $data);
            $this->load->view('layouts/topbar', $data);
            $this->load->view('v_admin/rekreasi', $data);
            $this->load->view('layouts/footer');
        } else {
            $id = $this->input->post('id');
            $data = [
                'id' => $id,
                'name' => $this->input->post('name'),
                'jenis_rekreasi_id' => $this->input->post('jenis_rekreasi'),
                'facility' => $this->input->post('facility'),
                'ticket' => $this->input->post('ticket'),
                'time_open' => $this->input->post('time_open'),
            ];
            // var_dump($data);
            // die;

            $this->db->where('id', $id);
            $this->db->update('rekreasi', $data);
            $this->session->set_flashdata('message', 'Diubah');
            redirect('admin/rekreasi');
        }


    }

    public function delete($id) {
        $old_image = $this->M_Rekreasi->getImageRekreasi($id);
        unlink("asset/img/rekreasi/" . $old_image['image']);
        $this->db->delete('rekreasi', ['id' => $id]);

        $this->session->set_flashdata('message', 'Dihapus');
        redirect('admin/rekreasi');
    }
    

}
