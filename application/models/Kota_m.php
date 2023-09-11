<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kota_m extends CI_Model
{

    public function get_provinces()
    {
        return $this->db->get('provinces');
    }

    function get_regencies($id)
    {
        $query = $this->db->get_where('regencies', array('province_id' => $id));
        return $query;
    }

    function get_districts($id)
    {
        $query = $this->db->get_where('districts', array('regency_id' => $id));
        return $query;
    }
    function get_villages($id)
    {
        $query = $this->db->get_where('villages', array('district_id' => $id));
        return $query;
    }
    function get_districts1()
    {
        $query = $this->db->get('districts');
        return $query;
    }
    function get_districts2()
    {
        $query = $this->db->get_where('districts', ['regency_id']);
        return $query;
    }
    function get_villages1($id)
    {
        $query = $this->db->get_where('villages', array('district_id' => $id));
        return $query;
    }
}
