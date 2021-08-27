<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Message extends CI_Model
{

    public function getMessage()
    {
        return $this->db->get('message')->result_array();
    }
}
