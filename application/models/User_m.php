<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User_m extends CI_Model
{
    public function get_all()
    {
        $this->db->select('user.*, user_role.nama as role');
        $this->db->from('user');
        // $this->db->where('is_active', 1);
        $this->db->join('user_role', 'user.role_id = user_role.id');
        return $this->db->get();
    }

    public function get_role()
    {
        return $this->db->get('user_role')->result();
    }

    public function getUserID($id)
    {
        $this->db->select('user.*, user_role.nama as role');
        $this->db->from('user');
        $this->db->where('user.id', $id);
        $this->db->join('user_role', 'user.role_id = user_role.id');
        return $this->db->get();
    }
}
