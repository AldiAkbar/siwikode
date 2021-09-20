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

            $this->M_Testimoni->create($data);
            $this->session->set_flashdata('message', 'Ditambah');
            redirect('admin/testimoni');
        }
    }

    public function edit()
    {
        $data['testimoni'] = $this->M_Testimoni->getTestimoni();

        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('job', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('description', 'Testimoni', 'required|max_length[100]');

        if ($this->form_validation->run() == true) {
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

            $this->M_Testimoni->update($id, $data);
            $this->session->set_flashdata('message', 'Diubah');
            redirect('admin/testimoni');
        }
    }

    public function delete($id)
    {
        $old_image = $this->M_Testimoni->getImageTestimoni($id);
        unlink("asset/img/testimoni/" . $old_image['image']);

        $this->M_Testimoni->delete($id);
        $this->session->set_flashdata('message', 'Dihapus');
        redirect('admin/testimoni');
    }
}
