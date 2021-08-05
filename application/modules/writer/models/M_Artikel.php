<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Artikel extends CI_Model {

    public function getArtikel() {
        $query = "SELECT `artikel`.*, `kategori_wisata`.`kategori`
                FROM `artikel` JOIN `kategori_wisata`
                ON `artikel`.`kategori_wisata_id` = `kategori_wisata`.`id`
            ";
        return $this->db->query($query)->result_array();
    }

    public function getKategoriWisata()
    {
        return $this->db->get('kategori_wisata')->result_array();
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