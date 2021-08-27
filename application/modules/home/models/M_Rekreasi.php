<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Rekreasi extends CI_Model {

    public function getDescRekreasi() {
        $query = "SELECT `rekreasi`.`id`, `rekreasi`.`name`, `rekreasi`.`image`, `rekreasi`.`deskripsi` 
                    FROM `rekreasi`
                ";
        return $this->db->query($query)->result_array();
    }

    public function getDetailRekreasi($slug)
    {
        return $this->db->get_where('rekreasi', ['slug' => $slug])->row_array();
    }

}