<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Admin extends CI_Model
{

    public function getCountUser()
    {
        return $this->db->get('user')->num_rows();
    }

    public function getCountRekreasi()
    {
        return $this->db->get('rekreasi')->num_rows();
    }

    public function getCountKuliner()
    {
        return $this->db->get('kuliner')->num_rows();
    }

    public function getCountArtikel()
    {
        return $this->db->get('artikel')->num_rows();
    }
}
