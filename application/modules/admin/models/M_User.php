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

    public function create($data = [])
    {
        $this->db->insert('user', $data);
    }

    public function update($id, $data = [])
    {
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }

    public function delete($id)
    {
        $this->db->delete('user', ['id' => $id]);
    }

}