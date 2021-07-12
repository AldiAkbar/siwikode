<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Artikel extends CI_Model {

    public function getArtikel() {
        $query = "SELECT `artikel`.*, `category_artikel`.`category`
                FROM `artikel` JOIN `category_artikel`
                ON `artikel`.`category_artikel_id` = `category_artikel`.`id`
            ";
        return $this->db->query($query)->result_array();
    }

    public function uploadImage($upload_path) {
        $config['upload_path'] = 'asset/img/'.$upload_path;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = '1024';

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image')) {
            return $this->upload->data('file_name');
        } else {
            echo $this->upload->display_errors();
        }
    }

}