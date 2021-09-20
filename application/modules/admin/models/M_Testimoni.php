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

    public function create($data = [])
    {
        $this->db->insert('testimoni', $data);
    }

    public function update($id, $data = [])
    {
        $this->db->where('id', $id);
        $this->db->update('testimoni', $data);
    }

    public function delete($id)
    {
        $this->db->delete('testimoni', ['id' => $id]);
    }
}
