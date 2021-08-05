<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Testimoni extends CI_Model
{
    public function getTestimoni()
    {
        return $this->db->get('testimoni')->result_array();
    }

    public function getImageTestimoni($id)
    {
        $query = "SELECT `image` FROM `testimoni` WHERE id = $id";
        return $this->db->query($query)->row_array();
    }
}
