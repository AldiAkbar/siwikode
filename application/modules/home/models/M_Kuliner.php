<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Kuliner extends CI_Model {

    public function getDescKuliner() {
        $query = "SELECT `kuliner`.`id`, `kuliner`.`name`, `kuliner`.`image`, `kuliner`.`deskripsi` 
                    FROM `kuliner`
                ";
        return $this->db->query($query)->result_array();
    }

    public function getDetailKuliner($slug)
    {
        return $this->db->get_where('kuliner', ['slug' => $slug])->row_array();
    }

}