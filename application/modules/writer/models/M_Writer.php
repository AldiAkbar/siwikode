<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Writer extends CI_Model {

    public function getUser() {
        return $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    }

}