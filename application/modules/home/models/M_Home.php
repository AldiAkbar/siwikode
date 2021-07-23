<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Home extends CI_Model {

    public function getAccount() {
        return $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    }

    public function getRekreasi() {
        return $this->db->get('rekreasi')->result_array();
    }

    public function getArtikel() {
        return $this->db->get('artikel')->result_array();
    }

    public function getKuliner() {
        return $this->db->get('kuliner')->result_array();
    }

    public function getMenuKuliner() {
        $query = "SELECT menu FROM kuliner";
        return $this->db->query($query)->result_array();
    }

    public function getTestimoni() {
        return $this->db->get('testimoni')->result_array();
    }

}