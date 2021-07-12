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

    public function getJenisKuliner() {
        return $this->db->get('jenis_kuliner')->result_array();
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