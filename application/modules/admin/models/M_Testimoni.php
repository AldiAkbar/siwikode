<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Testimoni extends CI_Model
{
    public function getTestimoni()
    {
        return $this->db->get('testimoni')->result_array();
    }
}
