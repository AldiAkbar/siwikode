<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Rekreasi extends CI_Model {

    public function getRekreasi() {
        $query = "SELECT `rekreasi`.*, `jenis_rekreasi`.`jenis`
                FROM `rekreasi` JOIN `jenis_rekreasi`
                ON `rekreasi`.`jenis_rekreasi_id` = `jenis_rekreasi`.`id`
            ";
        return $this->db->query($query)->result_array();
    }

    public function getRekreasiBySlug($slug)
    {
        return $this->db->get_where('rekreasi', ['slug' => $slug])->row_array();
    }

    public function getJenisRekreasi() {
        return $this->db->get('jenis_rekreasi')->result_array();
    }

    public function getImageRekreasi($id)
    {
        $query = "SELECT `image` FROM `rekreasi` WHERE id = $id";
        return $this->db->query($query)->row_array();
    }

    public function update($id, $data = [])
    {
        $this->db->where('id', $id);
        $this->db->update('rekreasi', $data);
    }

    public function delete($id)
    {
        $this->db->delete('rekreasi', ['id' => $id]);
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