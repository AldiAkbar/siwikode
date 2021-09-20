<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Menu extends CI_Model {

    public function getMenu() {
        return $this->db->get_where('user_menu')->result_array();
    }

    public function create($data = [])
    {
        $this->db->insert('user_menu', $data);
    }

    public function update($id, $data = [])
    {
        $this->db->where('id', $id);
        $this->db->update('user_menu', $data);
    }

    public function delete($id)
    {
        $this->db->delete('user_menu', ['id' => $id]);
    }

    public function getSubMenu() {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                    FROM `user_sub_menu` JOIN `user_menu`
                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                ";
        return $this->db->query($query)->result_array();
    }

    public function createSUbMenu($data = [])
    {
        $this->db->insert('user_sub_menu', $data);
    }

    public function updateSubMenu($id, $data = [])
    {
        $this->db->where('id', $id);
        $this->db->update('user_sub_menu', $data);
    }

    public function deleteSubMenu($id)
    {
        $this->db->delete('user_sub_menu', ['id' => $id]);
    }

}