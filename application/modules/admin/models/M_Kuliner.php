<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Kuliner extends CI_Model {

    public function getKuliner() {
        $query = "SELECT `kuliner`.*, `jenis_kuliner`.`jenis`
                FROM `kuliner` JOIN `jenis_kuliner`
                ON `kuliner`.`jenis_kuliner_id` = `jenis_kuliner`.`id`
            ";
        return $this->db->query($query)->result_array();
    }

    public function getKulinerBySlug($slug)
    {
        return $this->db->get_where('kuliner', ['slug' => $slug])->row_array();
    }

    public function getJenisKuliner() {
        return $this->db->get('jenis_kuliner')->result_array();
    }

    public function getImageKuliner($id)
    {
        $query = "SELECT `image` FROM `kuliner` WHERE id = $id";
        return $this->db->query($query)->row_array();
    }

    public function update($id, $data = [])
    {
        $this->db->where('id', $id);
        $this->db->update('kuliner', $data);
    }

    public function delete($id)
    {
        $this->db->delete('kuliner', ['id' => $id]);
    }

    public function uploadImage($upload_path, $old_image, $new_image)
    {
        if ($new_image) {
            $config['upload_path'] = 'asset/img/' . $upload_path;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '1024';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                unlink(FCPATH . 'asset/img/artikel/' . $old_image);
                return $this->upload->data('file_name');
            } else {
                // return $this->upload->data($old_image);
                echo $this->upload->display_errors();
            }
        } else {
            return $old_image;
        }
    }

}