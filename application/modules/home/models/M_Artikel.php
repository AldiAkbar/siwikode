<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Artikel extends CI_Model {

    public function getArtikelBySlug($slug)
    {
        return $this->db->get_where('artikel', ['slug' => $slug])->row_array();
    }

    public function getCategory()
    {
        return $this->db->get('kategori_wisata')->result_array();
    }

    public function getCategorySelected($kategori)
    {
        return $this->db->get_where('kategori_wisata', ['slug' => $kategori])->row_array();
    } 

}