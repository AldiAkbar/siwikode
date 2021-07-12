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

    public function getJenisRekreasi() {
        return $this->db->get('jenis_rekreasi')->result_array();
    }

    public function uploadImage($upload_path) {
        $config['upload_path'] = 'asset/img/'.$upload_path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']     = '1024';

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image')) {
            return $this->upload->data('file_name');
        } else {
            echo $this->upload->display_errors();
        }
    }

}