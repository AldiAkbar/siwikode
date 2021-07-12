<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Artikel extends CI_Model {

    public function getArtikel() {
        $query = "SELECT `artikel`.*, `category_artikel`.`category`
                FROM `artikel` JOIN `category_artikel`
                ON `artikel`.`category_artikel_id` = `category_artikel`.`id`
            ";
        return $this->db->query($query)->result_array();
    }

    public function getCategoryArtikel() {
        return $this->db->get('category_artikel')->result_array();
    }

}