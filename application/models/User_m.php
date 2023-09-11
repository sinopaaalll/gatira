<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User_m extends CI_Model
{
    public function get_all()
    {
        $this->db->select('user.*, user_role.nama as role');
        $this->db->from('user');
        $this->db->join('user_role', 'user.role_id = user_role.id');
        return $this->db->get();
    }
}
