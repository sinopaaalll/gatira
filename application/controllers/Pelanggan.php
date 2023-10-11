<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->session->unset_userdata('no_pel');
        $this->form_validation->set_rules('no_pel', 'Nomor Pelanggan', 'trim|required|valid_number');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'PDAM Purwakarta';
            $this->load->view('component/auth_header', $data);
            $this->load->view('pages/pelanggan/index');
            $this->load->view('component/auth_footer');
        } else {
            // validasinya success
            $this->_cek();
        }
    }

    public function cek()
    {
        $no_pel = $this->input->post('no_pelanggan');
        $query = $this->db->get_where('pelanggan', ['no_pelanggan' => $no_pel]);
        $row = $query->row_array();
        if ($row) {
            // $data['pel'] = $row;
            $this->session->set_flashdata('warning', 'Nomor Pelanggan sudah diperbarui');
            redirect('pelanggan');
        } else {
            $data = [
                'no_pel' => $no_pel,
                'pelayanan' => $this->input->post('pelayanan', true),
                'wilayah' => $this->input->post('wilayah', true),
                'jalan' => $this->input->post('jalan', true),
            ];
            $this->session->set_userdata($data);
            redirect('pelanggan/formulir');
        }
    }

    public function formulir()
    {
        if (empty($this->session->userdata('no_pel'))) {
            $this->session->set_flashdata('warning', 'Silahkan cek terlebih dahulu sebelum updating data!');
            redirect('pelanggan');
        };

        $kecamatan = $this->db->query("SELECT * FROM districts WHERE regency_id='3214'")->result_array();
        $data['districts2'] = $kecamatan;

        $this->form_validation->set_rules('email_pel', 'Email Pelanggan', 'required|trim|valid_email|is_unique[pelanggan.email]', [
            'is_unique' => 'Email sudah terdafpar. Silahkan masukan email lain.'
        ]);
        $this->form_validation->set_rules('no_pelanggan', 'Nomor Pelanggan', 'required|trim|match[no_pel]', [
            'match' => 'Nomor Pelanggan tidak sama'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Formulir Pembaruan Data Pelanggan';
            $this->load->view('component/auth_header', $data);
            $this->load->view('pages/pelanggan/formulir', $data);
            $this->load->view('component/auth_footer');
        } else {
            $data = [
                'no_pel' => htmlspecialchars($this->input->post('no_pel', true)),
                'nama_pel' => htmlspecialchars($this->input->post('nama_pel', true)),
                'alamat_pel' => htmlspecialchars($this->input->post('alamat_pel', true)),
                'kel_pel' => htmlspecialchars($this->input->post('kel_pel', true)),
                'kec_pel' => htmlspecialchars($this->input->post('kec_pel', true)),
                'email_pel' => htmlspecialchars($this->input->post('email_pel', true)),
                'nohp_pel' => htmlspecialchars($this->input->post('nohp_pel', true)),
                'latlong_pel' => htmlspecialchars($this->input->post('latlong_pel', true)),
                'date_created_pel' => time()
            ];

            $this->db->insert('pel', $data);

            $this->session->set_flashdata('message', '<div class="card-panel green lighten-4 z-depth-0">Terima kasih sudah membarui data pelanggan Anda.</div><br>');
            redirect('pelanggan/sukses');
        }
    }

    public function get_villages1()
    {

        $id = $this->input->post('id', TRUE);
        $data = $this->Kota_m->get_villages($id)->result();
        echo json_encode($data);
    }
}
