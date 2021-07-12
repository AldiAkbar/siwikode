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

}