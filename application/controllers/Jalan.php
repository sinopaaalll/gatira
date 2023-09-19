<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jalan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // is login
        if (!$this->session->userdata('nik')) {
            redirect('auth/login');
        } else if ($this->session->userdata('role_id') != 1) {
            redirect('404_override');
        }
    }

    public function index()
    {
        $data['title'] = "Jalan";

        $this->db->select('jalan.*, wilayah.nama_wilayah as wilayah, pelayanan.nama_pelayanan as cabang');
        $this->db->from('jalan');
        $this->db->join('wilayah', 'wilayah.kode_wilayah = jalan.kode_wilayah');
        $this->db->join('pelayanan', 'wilayah.kode_pelayanan = pelayanan.kode_pelayanan');
        $query = $this->db->get()->result();

        $data['jalan'] = $query;

        $data['cabang'] = $this->db->get('pelayanan')->result();

        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar');
        $this->load->view('pages/jalan/index', $data);
        $this->load->view('component/footer');
    }

    public function create()
    {
        $this->form_validation->set_rules('kode', 'Kode jalan', 'required', [
            'is_unique' => 'Kode jalan sudah dipakai'
        ]);
        $this->form_validation->set_rules('nama', 'Nama jalan', 'required');
        if ($this->form_validation->run() == false) {

            $data['title'] = "Jalan";
            $data['cabang'] = $this->db->get('pelayanan')->result();

            $this->load->view('component/header', $data);
            $this->load->view('component/sidebar');
            $this->load->view('pages/jalan/add', $data);
            $this->load->view('component/footer');
        } else {

            $data = [
                'kode_wilayah' => $this->input->post('wilayah'),
                'kode_jalan' => $this->input->post('kode'),
                'nama_jalan' => $this->input->post('nama'),
            ];

            $this->db->insert('jalan', $data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan!');
            redirect('jalan');
        }
    }

    public function get_wilayah()
    {
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $kode = $this->input->post('kode', TRUE);
        // $data = $this->Pelanggan_m->get_wilayah($kode)->result();
        $data = $this->db->query("SELECT * FROM wilayah WHERE kode_pelayanan = " . $kode)->result();
        echo json_encode($data);
    }

    public function generateKodeOtomatis()
    {

        $kode = $this->input->post('kode', TRUE);

        $this->db->select_max('jalan.kode_jalan');
        $this->db->from('jalan');
        $this->db->where('jalan.kode_wilayah', $kode);
        $this->db->join('wilayah', 'wilayah.kode_wilayah = jalan.kode_wilayah');
        $query = $this->db->get();
        $row = $query->row();

        if ($row->kode_jalan !== null) {
            // Jika ada data dalam tabel, tambahkan 1 dan format sebagai "01"
            $next_kode = $kode . sprintf('%03d', intval(substr($row->kode_jalan, -3)) + 1);
        } else {
            // Jika tabel kosong, gunakan kode awal "01"
            $next_kode = $kode . '001';
        }

        // Kirim kode otomatis sebagai respons JSON
        $response['kode_otomatis'] = $next_kode;
        echo json_encode($response);
    }

    public function edit($kode)
    {
        $data['title'] = "Jalan";
        $data['cabang'] = $this->db->get('pelayanan')->result();
        $data['jalan'] = $this->db->get_where('jalan', ['kode_jalan' => $kode])->row_array();

        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar');
        $this->load->view('pages/jalan/edit', $data);
        $this->load->view('component/footer');
    }

    public function update($kode_jalan)
    {
        $data = [
            'nama_jalan' => $this->input->post('nama'),
        ];

        $this->db->update('jalan', $data, ['kode_jalan' => $kode_jalan]);
        $this->session->set_flashdata('success', 'Data berhasil diupdate!');
        redirect('jalan');
    }

    public function delete($kode)
    {
        $this->db->delete('jalan', ['kode_jalan' => $kode]);
        $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        redirect('jalan');
    }
}
