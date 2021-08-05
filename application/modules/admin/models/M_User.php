<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_User extends CI_Model {

    public function getListUser() {
        return $this->db->get('user')->result_array();
    }

    public function getUser() {
        return $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    }

    public function getCountUser() {
        return $this->db->get('user')->num_rows();
    }

    public function getCountRekreasi() {
        return $this->db->get('rekreasi')->num_rows();
    }

    public function getCountKuliner() {
        return $this->db->get('kuliner')->num_rows();
    }

    public function getCountArtikel() {
        return $this->db->get('artikel')->num_rows();
    }

    public function getImageUser($id)
    {
        $query = "SELECT `image` FROM `user` WHERE id = $id";
        return $this->db->query($query)->row_array();
    }

}