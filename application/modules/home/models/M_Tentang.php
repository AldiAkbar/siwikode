<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Tentang extends CI_Model {

    public function getKontributor() {
        return $this->db->get('kontributor')->result_array();
    }

}