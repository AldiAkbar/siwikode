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

}