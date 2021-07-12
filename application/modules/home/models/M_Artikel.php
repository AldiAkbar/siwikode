<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Artikel extends CI_Model {

    public function getArtikelById($id) {
        return $this->db->get_where('artikel', ['id' => $id])->row_array();
    }


}