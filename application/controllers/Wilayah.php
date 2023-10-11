<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wilayah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // is login
        is_logged_in("Wilayah Management");
    }

    public function index()
    {
        $data['title'] = "Wilayah Management";

        $this->db->select('wilayah.*, pelayanan.nama_pelayanan as cabang');
        $this->db->from('wilayah');
        $this->db->join('pelayanan', 'pelayanan.kode_pelayanan = wilayah.kode_pelayanan');
        $query = $this->db->get()->result();
        $data['wilayah'] = $query;

        $data['cabang'] = $this->db->get('pelayanan')->result();

        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar');
        $this->load->view('pages/wilayah/index', $data);
        $this->load->view('component/footer');
    }

    public function create()
    {
        $this->form_validation->set_rules('kode', 'Kode Wilayah', 'required', [
            'is_unique' => 'Kode Wilayah sudah dipakai'
        ]);
        $this->form_validation->set_rules('nama', 'Nama Wilayah', 'required');
        if ($this->form_validation->run() == false) {
            $data['title'] = "Wilayah Management";
            $data['cabang'] = $this->db->get('pelayanan')->result();

            $this->load->view('component/header', $data);
            $this->load->view('component/sidebar');
            $this->load->view('pages/wilayah/add', $data);
            $this->load->view('component/footer');
        } else {

            $data = [
                'kode_pelayanan' => $this->input->post('cabang'),
                'kode_wilayah' => $this->input->post('kode'),
                'nama_wilayah' => $this->input->post('nama'),
            ];

            $this->db->insert('wilayah', $data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan!');
            redirect('wilayah');
        }
    }

    public function generateKodeOtomatis()
    {
        $kode = $this->input->post('kode', TRUE);

        // Mengambil data terakhir dari tabel wilayah
        $this->db->select_max('wilayah.kode_wilayah');
        $this->db->from('wilayah');
        $this->db->where('wilayah.kode_pelayanan', $kode);
        $query = $this->db->get();
        $row = $query->row();

        if ($row->kode_wilayah !== null) {
            // Jika ada data dalam tabel, tambahkan 1 dan format sebagai "01"
            $next_kode = $kode . sprintf('%02d', intval(substr($row->kode_wilayah, -2)) + 1);
        } else {
            // Jika tabel kosong, gunakan kode awal "01"
            $next_kode = $kode . '01';
        }

        // Kirim kode otomatis sebagai respons JSON
        $response['kode_otomatis'] = $next_kode;
        echo json_encode($response);
    }

    public function edit($kode)
    {
        $data['title'] = "Wilayah Management";
        $data['cabang'] = $this->db->get('pelayanan')->result();
        $data['wilayah'] = $this->db->get_where('wilayah', ['kode_wilayah' => $kode])->row_array();

        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar');
        $this->load->view('pages/wilayah/edit', $data);
        $this->load->view('component/footer');
    }

    public function update($kode)
    {
        $data = [
            'nama_wilayah' => $this->input->post('nama'),
        ];

        $this->db->update('wilayah', $data, ['kode_wilayah' => $kode]);
        $this->session->set_flashdata('success', 'Data berhasil diupdate!');
        redirect('wilayah');
    }

    public function delete($kode)
    {
        $this->db->delete('wilayah', ['kode_wilayah' => $kode]);
        $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        redirect('wilayah');
    }
}
