<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_User extends CI_Model {

    public function getListUser() {
        return $this->db->get('user')->result_array();
    }

    public function getUser() {
        return $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    }

}