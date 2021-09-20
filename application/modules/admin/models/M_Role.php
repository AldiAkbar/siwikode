<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Role extends CI_Model {

    public function getRole() {
        return $this->db->get('user_role')->result_array();
    }

    public function getRoleById($role_id) {
        return $this->db->get_where('user_role', ['id' => $role_id])->row_array();
    }

    public function getAccessMenu($data)
    {
        return $this->db->get_where('user_access_menu', $data);
    }

    public function create($data = [])
    {
        $this->db->insert('user_role', $data);
    }

    public function update($id, $data = [])
    {
        $this->db->where('id', $id);
        $this->db->update('user_role', $data);
    }

    public function delete($id)
    {
        $this->db->delete('user_role', ['id' => $id]);
    }

    public function createAccess($data = [])
    {
        $this->db->insert('user_access_menu', $data);
    }

    public function deleteAccess($data)
    {
        $this->db->delete('user_access_menu', $data);
    }

}