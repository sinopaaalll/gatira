<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pelanggan_m extends CI_Model
{

    public function get_data()
    {
        $this->db->select('pelanggan.*, districts.name_districts as kecamatan, villages.name_villages as kelurahan, ket_spl.nama_status as ket');
        $this->db->from('pelanggan');
        $this->db->join('districts', 'id_districts = kec_pelanggan');
        $this->db->join('villages', 'id_villages = kel_pelanggan');
        $this->db->join('ket_spl', 'ket_spl.id = pelanggan.ket_spl');
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function get_data_by_wilayah($wilayah)
    {
        $this->db->select('pelanggan.*, districts.name_districts as kecamatan, villages.name_villages as kelurahan, ket_spl.nama_status as ket');
        $this->db->from('pelanggan');
        $this->db->where(['kode_pelayanan' => '01', 'kode_wilayah' => $wilayah]);
        $this->db->join('districts', 'id_districts = kec_pelanggan');
        $this->db->join('villages', 'id_villages = kel_pelanggan');
        $this->db->join('ket_spl', 'ket_spl.id = pelanggan.ket_spl');
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function get_data_by_id($id)
    {
        $this->db->select('pelanggan. *, jenis.nama_jenis as jenis , provinces.name_provinces as provinsi , regencies.name_regencies as kabupaten , districts.name_districts as kecamatan, villages.name_villages as kelurahan, ket_spl.nama_status as ket');
        $this->db->from('pelanggan');
        $this->db->where('pelanggan.id', $id);
        $this->db->join('provinces', 'id_provinces=prov_pelanggan');
        $this->db->join('regencies', 'id_regencies=kota_pelanggan');
        $this->db->join('districts', 'id_districts=kec_pelanggan');
        $this->db->join('villages', 'id_villages=kel_pelanggan');
        $this->db->join('ket_spl', 'ket_spl.id = pelanggan.ket_spl');
        $this->db->join('jenis', 'jenis.id = pelanggan.jenis_id');

        return $this->db->get()->row_array();
    }

    public function get_data2_by_id($id)
    {
        $this->db->select('pelanggan. *, districts.name_districts as kecamatan, villages.name_villages as kelurahan');
        $this->db->from('pelanggan');
        $this->db->where('pelanggan.id', $id);
        $this->db->join('districts', 'id_districts=kec_pelanggan');
        $this->db->join('villages', 'id_villages=kel_pelanggan');

        return $this->db->get()->row_array();
    }

    public function get_wilayah_where($where)
    {
        return $this->db->get_where('wilayah', $where)->row_array();
    }

    public function get_pelayanan()
    {
        return $this->db->get('pelayanan');
    }

    function get_wilayah()
    {
        $query = $this->db->get('wilayah');
        return $query;
    }

    function get_jalan($id)
    {
        $query = $this->db->get_where('jalan', array('kode_wilayah' => $id));
        return $query;
    }

    public function get_jenis()
    {
        return $this->db->get('jenis');
    }

    public function get_ket_spl()
    {
        return $this->db->get('ket_spl');
    }

    public function cek_no_pelanggan($where)
    {
        return $this->db->get_where('pelanggan', $where)->row_array();
    }
}
