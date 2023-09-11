<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth_m extends CI_Model
{
    public function get_role()
    {
        return $this->db->get('user_role')->result();
    }
}