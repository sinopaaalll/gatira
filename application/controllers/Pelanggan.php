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
        $this->session->unset_userdata('no_pelanggan');
        $this->form_validation->set_rules('no_pelanggan', 'Nomor Pelanggan', 'trim|required|max_length[11]|min_length[10]', [
            'min_length' => 'No pelanggan tidak valid. min (10 karakter)',
            'max_length' => 'No pelanggan tidak valid. max (11 karakter)',
        ]);

        if ($this->form_validation->run() == false) {


            $data = [
                'title' => 'PDAM Purwakarta',
            ];

            $this->load->view('component/auth_header', $data);
            $this->load->view('pages/pelanggan/index');
            $this->load->view('component/auth_footer');
        } else {
            $this->_cek();
        }
    }

    public function _cek()
    {
        // input recaptcha
        $recaptcha = $this->input->post('g-recaptcha-response');

        // cek recaptcha
        if (!empty($recaptcha)) {
            $response = $this->recaptcha->verifyResponse($recaptcha);

            // jika sukses
            if (isset($response['success']) and $response['success'] === true) {

                // proses jika sukses
                $no_pel = htmlspecialchars($this->input->post('no_pelanggan'));
                $query = $this->db->get_where('pelanggan', ['no_pelanggan' => $no_pel]);
                $row = $query->row_array();
                if ($row) {
                    // $data['pel'] = $row;
                    $this->session->set_flashdata('warning', 'Nomor Pelanggan sudah diperbarui');
                    redirect('pelanggan');
                } else {
                    $data = [
                        'no_pelanggan' => $no_pel,
                        'pelayanan' => htmlspecialchars($this->input->post('pelayanan', true)),
                        'wilayah' => htmlspecialchars($this->input->post('wilayah', true)),
                        'jalan' => htmlspecialchars($this->input->post('jalan', true)),
                    ];
                    $this->session->set_userdata($data);
                    redirect('pelanggan/formulir');
                }
            }
        } else {
            $this->session->set_flashdata('warning', 'reCaptcha required');
            redirect('pelanggan');
        }
    }

    public function formulir()
    {
        if (empty($this->session->userdata('no_pelanggan'))) {
            $this->session->set_flashdata('warning', 'Silahkan cek terlebih dahulu sebelum updating data!');
            redirect('pelanggan');
        };

        $kecamatan = $this->db->query("SELECT * FROM districts WHERE regency_id='3214'")->result_array();
        $data['districts2'] = $kecamatan;

        $this->form_validation->set_rules('email', 'Email Pelanggan', 'required|trim|valid_email|is_unique[pelanggan.email]', [
            'is_unique' => 'Email sudah terdafpar. Silahkan masukan email lain.'
        ]);
        $this->form_validation->set_rules('no_pelanggan', 'Nomor Pelanggan', 'required|matches[no_pel]', [
            'matches' => 'Nomor Pelanggan tidak sama'
        ]);
        $this->form_validation->set_rules('no_pel', 'no_pel', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat_pel', 'Alamat', 'required');
        $this->form_validation->set_rules('kec_pel', 'Kecamatan', 'required');
        $this->form_validation->set_rules('kel_pel', 'Kelurahan / Desa', 'required');
        $this->form_validation->set_rules('telp', 'Nomor telepon', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Formulir Pembaruan Data Pelanggan';
            $this->load->view('component/auth_header', $data);
            $this->load->view('pages/pelanggan/formulir', $data);
            $this->load->view('component/auth_footer');
        } else {
            $phoneNumber = htmlspecialchars($this->input->post('telp', true));
            // Menghapus spasi dan tanda hubung dari string
            $cleanedPhoneNumber = str_replace(['+', ' ', '-'], '', $phoneNumber);

            $data = [
                'no_pelanggan' => htmlspecialchars($this->input->post('no_pelanggan', true)),
                'kode_pelayanan' => htmlspecialchars($this->input->post('pelayanan', true)),
                'kode_wilayah' => htmlspecialchars($this->input->post('wilayah', true)),
                'kode_jalan' => htmlspecialchars($this->input->post('jalan', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'alamat_pelanggan' => htmlspecialchars($this->input->post('alamat_pel', true)),
                'prov_pelanggan' => "32",
                'kota_pelanggan' => "3214",
                'kel_pelanggan' => htmlspecialchars($this->input->post('kel_pel', true)),
                'kec_pelanggan' => htmlspecialchars($this->input->post('kec_pel', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'telp' => $cleanedPhoneNumber,
                'created_by' => $this->input->ip_address()
            ];

            $this->db->insert('pelanggan', $data);

            $this->session->set_flashdata('success', 'Data berhasil di input!');
            redirect('pelanggan');
        }
    }

    public function get_villages1()
    {

        $id = $this->input->post('id', TRUE);
        $data = $this->Kota_m->get_villages($id)->result();
        echo json_encode($data);
    }
}
