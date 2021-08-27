<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_User extends CI_Model {
    
    public function getUser() {
        return $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    }

    public function getListUser()
    {
        return $this->db->get('user')->result_array();
    }

    public function getImageUser($id)
    {
        $query = "SELECT `image` FROM `user` WHERE id = $id";
        return $this->db->query($query)->row_array();
    }

}