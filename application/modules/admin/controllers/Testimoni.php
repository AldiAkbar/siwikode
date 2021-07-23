<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Testimoni extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('M_Testimoni');
        $this->load->model('M_User');
    }

    public function index()
    {

        $data['title'] = 'Testimoni Management';
        $data['user'] = $this->M_User->getUser();
        $data['testimoni'] = $this->M_Testimoni->getTestimoni();

        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('job', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('description', 'Testimoni', 'required|max_length[100]');

        if ($this->form_validation->run() == false) {
            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar', $data);
            $this->load->view('layouts/topbar', $data);
            $this->load->view('v_admin/testimoni', $data);
            $this->load->view('layouts/footer');
        } else {
            $image = $_FILES['image']['name'];
            if ($image) {
                $config['upload_path'] = 'asset/img/testimoni/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '1024';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $image = $this->upload->data('file_name');
                }
            } else {
                $image = 'default.jpg';
            }

            $data = [
                'name' => $this->input->post('name'),
                'job' => $this->input->post('job'),
                'description' => $this->input->post('description'),
                'image' => $image
            ];
            // var_dump($data);
            // die;

            $this->db->insert('testimoni', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Testimoni has been succesfully added.</div>');
            redirect('admin/testimoni');
        }
    }

    public function edit()
    {
        $data['testimoni'] = $this->M_Testimoni->getTestimoni();

        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('job', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('description', 'Testimoni', 'required|max_length[100]');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your Testimoni has been fail to updated.</div>');
            redirect('admin/testimoni');
        } else {
            $id = $this->input->post('id');
            $oldImage = $this->input->post('oldImage');
            $image = $_FILES['image']['name'];
            if ($image) {
                $config['upload_path'] = 'asset/img/testimoni/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '1024';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    if ($oldImage != 'default.jpg') {
                        unlink(FCPATH . 'asset/img/testimoni/' . $oldImage);
                    }
                    $new_image = $this->upload->data('file_name');
                    $image = $new_image;
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                $image = $oldImage;
            }

            $data = [
                'id' => $id,
                'name' => $this->input->post('name'),
                'job' => $this->input->post('job'),
                'description' => $this->input->post('description'),
                'image' => $image
            ];
            // var_dump($data);
            // die;

            $this->db->where('id', $id);
            $this->db->update('testimoni', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Testimoni has been succesfully updated.</div>');
            redirect('admin/testimoni');
        }
    }

    public function delete($id)
    {
        $this->db->delete('testimoni', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your Wisata Kuliner has been successfully deleted.</div>');
        redirect('admin/testimoni');
    }
}
