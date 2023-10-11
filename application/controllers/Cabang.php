<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cabang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // is login
        is_logged_in("Cabang Management");
    }

    public function index()
    {
        $data['title'] = "Cabang Management";
        $data['cabang'] = $this->db->get('pelayanan')->result();

        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar');
        $this->load->view('pages/cabang/index', $data);
        $this->load->view('component/footer');
    }

    public function create()
    {
        $this->form_validation->set_rules('kode', 'Kode Cabang', 'required|is_unique[pelayanan.kode_pelayanan]', [
            'is_unique' => 'Kode tersebut sudah dipakai'
        ]);

        $this->form_validation->set_rules('nama', 'Nama Cabang', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Cabang Management";

            $this->load->view('component/header', $data);
            $this->load->view('component/sidebar');
            $this->load->view('pages/cabang/add', $data);
            $this->load->view('component/footer');
        } else {

            $data = [
                'kode_pelayanan' => $this->input->post('kode'),
                'nama_pelayanan' => $this->input->post('nama'),
            ];
            $this->db->insert('pelayanan', $data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan!');
            redirect('cabang');
        }
    }

    public function generateKodeOtomatis()
    {

        // Mengambil data terakhir dari tabel pelayanan
        $this->db->select_max('kode_pelayanan');
        $query = $this->db->get('pelayanan');
        $row = $query->row();

        if ($row->kode_pelayanan !== null) {
            // Jika ada data dalam tabel, tambahkan 1 dan format sebagai "01"
            $next_kode = sprintf('%02d', intval($row->kode_pelayanan) + 1);
        } else {
            // Jika tabel kosong, gunakan kode awal "01"
            $next_kode = '01';
        }

        // Kirim kode otomatis sebagai respons JSON
        $response['kode_otomatis'] = $next_kode;
        echo json_encode($response);
    }

    public function edit($kode)
    {
        $data['title'] = "Cabang Management";
        $data['cabang'] = $this->db->get_where('pelayanan', ['kode_pelayanan' => $kode])->row_array();

        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar');
        $this->load->view('pages/cabang/edit', $data);
        $this->load->view('component/footer');
    }

    public function update($kode)
    {
        $data = [
            'nama_pelayanan' => $this->input->post('nama'),
        ];

        $this->db->update('pelayanan', $data, ['kode_pelayanan' => $kode]);
        $this->session->set_flashdata('success', 'Data berhasil diupdate!');
        redirect('cabang');
    }

    public function delete($kode)
    {
        $this->db->delete('pelayanan', ['kode_pelayanan' => $kode]);
        $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        redirect('cabang');
    }
}
