<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hublang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        // is login
        if (!$this->session->userdata('nik')) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $this->session->unset_userdata('no_pelanggan');
        $this->form_validation->set_rules('no_pelanggan', 'Nomor Pelanggan', 'required|max_length[11]|min_length[10]');

        if ($this->form_validation->run() == false) {

            $data = [
                'title' => "Entry",
            ];

            $this->load->view('component/header', $data);
            $this->load->view('component/sidebar', $data);
            $this->load->view('pages/hublang/check', $data);
            $this->load->view('component/footer');
        } else {
            $this->cek_nomor_pelanggan();
        }
    }


    public function cek_nomor_pelanggan()
    {
        $no_pelanggan = $this->input->post('no_pelanggan', true);

        $cek = $this->Pelanggan_m->cek_no_pelanggan(['no_pelanggan' => $no_pelanggan]);

        if ($cek) {
            $this->session->set_flashdata('warning', 'Data sudah di update');
            redirect('hublang');
        } else {
            $data = [
                'no_pelanggan' => $no_pelanggan,
                'pelayanan' => $this->input->post('pelayanan', true),
                'wilayah' => $this->input->post('wilayah', true),
                'jalan' => $this->input->post('jalan', true),
            ];
            $this->session->set_userdata($data);
            redirect('hublang/entry');
        }
    }

    public function entry()
    {
        // Periksa apakah sesi nomor pelanggan telah diatur
        if (!$this->session->userdata('no_pelanggan')) {
            $this->session->set_flashdata('warning', 'Silahkan cek terlebih dahulu nomor pelanggannya');
            redirect('hublang');
        }

        $rules = array(
            [
                'field' => 'no_pelanggan',
                'label' => 'Nomor pelanggan',
                'rules' => 'required|max_length[11]|min_length[10]|is_unique[pelanggan.no_pelanggan]',
            ],
            [
                'field' => 'no_plat',
                'label' => 'Nomor plat',
                'rules' => 'required|is_unique[pelanggan.no_plat]',
            ],
            [
                'field' => 'nama_pelanggan',
                'label' => 'Nama pelanggan',
                'rules' => 'required',
            ],
            [
                'field' => 'email_pelanggan',
                'label' => 'Email pelanggan',
                'rules' => 'valid_email',
            ],
            [
                'field' => 'telp_pelanggan',
                'label' => 'Nomor hp pelanggan',
                'rules' => '',
            ],
            [
                'field' => 'alamat_pelanggan',
                'label' => 'Alamat pelanggan',
                'rules' => 'required',
            ],
            [
                'field' => 'prov_pelanggan',
                'label' => 'Provinsi',
                'rules' => 'required',
            ],
            [
                'field' => 'kota_pelanggan',
                'label' => 'Kabupaten / Kota',
                'rules' => 'required',
            ],
            [
                'field' => 'kec_pelanggan',
                'label' => 'Kecamatan',
                'rules' => 'required',
            ],
            [
                'field' => 'kel_pelanggan',
                'label' => 'Kelurahan / Desa',
                'rules' => 'required',
            ],
            [
                'field' => 'tgl_pasang',
                'label' => 'Tanggal pasang',
                'rules' => 'required',
            ],
            [
                'field' => 'no_meter',
                'label' => 'Nomor meter',
                'rules' => 'required|is_unique[pelanggan.no_meter]',
            ],
            [
                'field' => 'no_spl',
                'label' => 'Nomor spl',
                'rules' => 'required|is_unique[pelanggan.no_spl]',
            ],
            [
                'field' => 'jenis_langganan',
                'label' => 'Jenis Langganan',
                'rules' => 'required',
            ],
            [
                'field' => 'ket_spl',
                'label' => 'Keterangan SPL',
                'rules' => 'required',
            ],
            [
                'field' => 'status',
                'label' => 'Status',
                'rules' => '',
            ],
            [
                'field' => 'no_rek',
                'label' => 'Nomor rekening',
                'rules' => 'numeric',
            ],
        );

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == false) {

            $kecamatan = $this->db->query("SELECT * FROM districts WHERE regency_id='3214'")->result_array();

            $data = [
                'title' => "Entry",
                'provinces' => $this->Kota_m->get_provinces()->result(),
                'districts1' => $this->Kota_m->get_districts1()->result(),
                'districts2' => $kecamatan,
                'pelayanan' => $this->Pelanggan_m->get_pelayanan()->result(),
                'jenis' => $this->Pelanggan_m->get_jenis()->result(),
                'ket_spl' => $this->Pelanggan_m->get_ket_spl()->result(),
            ];

            $this->load->view('component/header', $data);
            $this->load->view('component/sidebar', $data);
            $this->load->view('pages/hublang/entry', $data);
            $this->load->view('component/footer');
        } else {
            $this->_simpan_data();
        }
    }

    private function _simpan_data()
    {

        $input_alamat_pasang = htmlspecialchars($this->input->post('alamat_pasang', true));
        $input_alamat_pasang2 = htmlspecialchars($this->input->post('alamat_pasang2', true));
        $input_kec_pasang = htmlspecialchars($this->input->post('kec_pasang', true));
        $input_kec_pasang2 = htmlspecialchars($this->input->post('kec_pasang2', true));
        $input_kel_pasang = htmlspecialchars($this->input->post('kel_pasang', true));
        $input_kel_pasang2 = htmlspecialchars($this->input->post('kel_pasang2', true));

        $checkbox_checked = $this->input->post('show');

        if ($checkbox_checked) {
            $alamat_pasang = $input_alamat_pasang2;
            $kec_pasang = $input_kec_pasang2;
            $kel_pasang = $input_kel_pasang2;
        } else {
            $alamat_pasang = $input_alamat_pasang;
            $kec_pasang = $input_kec_pasang;
            $kel_pasang = $input_kel_pasang;
        }

        $data = [
            'no_pelanggan' => htmlspecialchars($this->input->post('no_pelanggan', true)),
            'kode_pelayanan' => htmlspecialchars($this->input->post('pelayanan', true)),
            'kode_wilayah' => htmlspecialchars($this->input->post('wilayah', true)),
            'kode_jalan' => htmlspecialchars($this->input->post('jalan', true)),
            'tgl_daftar' => $this->input->post('tgl_daftar', true),
            'no_plat' => htmlspecialchars($this->input->post('no_plat', true)),
            'nama' => htmlspecialchars($this->input->post('nama_pelanggan', true)),
            'email' => htmlspecialchars($this->input->post('email_pelanggan', true)),
            'telp' => htmlspecialchars($this->input->post('telp_pelanggan', true)),
            'alamat_pelanggan' => htmlspecialchars($this->input->post('alamat_pelanggan', true)),
            'prov_pelanggan' => htmlspecialchars($this->input->post('prov_pelanggan', true)),
            'kota_pelanggan' => htmlspecialchars($this->input->post('kota_pelanggan', true)),
            'kec_pelanggan' => htmlspecialchars($this->input->post('kec_pelanggan', true)),
            'kel_pelanggan' => htmlspecialchars($this->input->post('kel_pelanggan', true)),
            'tgl_pasang' => $this->input->post('tgl_pasang', true),
            'no_meter' => htmlspecialchars($this->input->post('no_meter', true)),
            'biaya_pasang' => htmlspecialchars($this->input->post('biaya_pasang', true)),
            'alamat_pasang' => $alamat_pasang,
            'kec_pasang' => $kec_pasang,
            'kel_pasang' => $kel_pasang,
            'no_spl' => htmlspecialchars($this->input->post('no_spl', true)),
            'ket_spl' => htmlspecialchars($this->input->post('ket_spl', true)),
            'jenis_id' => htmlspecialchars($this->input->post('jenis_langganan')),
            'jml_jiwa' => htmlspecialchars($this->input->post('jml_jiwa', true)),
            'status' => htmlspecialchars($this->input->post('status', true)),
            'luas_tanah' => htmlspecialchars($this->input->post('luas_tanah', true)),
            'daya_listrik' => htmlspecialchars($this->input->post('daya_listrik', true)),
            'no_rek' => htmlspecialchars($this->input->post('no_rek', true)),
            'created_at' => date("Y-m-d"),
            'created_at_int' => time(),
            // 'created_by' => htmlspecialchars($this->input->post('created_by', true))
        ];


        if ($this->db->insert('pelanggan', $data)) {
            $this->session->set_flashdata('success', 'Data berhasil di entry.');
            redirect('hublang');
        };
    }

    public function data()
    {
        $data['title'] = "Data";
        $data['wilayah'] = $this->Pelanggan_m->get_wilayah()->result();


        // $wilayah = $this->input->post('wilayah');
        $wilayah = $this->input->post('wilayah');


        if (empty($wilayah)) {
            $data['pelanggan'] = $this->Pelanggan_m->get_data();
        } else {
            $data['pelanggan'] = $this->Pelanggan_m->get_data_by_wilayah($wilayah);
        }

        // $data['pelanggan'] = $pel;
        // var_dump($data['pelanggan']);
        // die();


        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar');
        $this->load->view('pages/hublang/data', $data);
        $this->load->view('component/footer');
    }

    public function detail($id)
    {
        $data['title'] = "Detail Data Pelanggan";
        $data['pel'] = $this->Pelanggan_m->get_data_by_id($id);
        $data['pel2'] = $this->Pelanggan_m->get_data2_by_id($id);

        $where = [
            'kode_pelayanan' => $data['pel']['kode_pelayanan'],
            'kode_wilayah' => $data['pel']['kode_wilayah']
        ];
        $data['wilayah'] = $this->Pelanggan_m->get_wilayah_where($where);



        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar');
        $this->load->view('pages/hublang/show', $data);
        $this->load->view('component/footer');
    }

    public function get_regencies()
    {
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id = $this->input->post('id', TRUE);
        $data = $this->Kota_m->get_regencies($id)->result();
        echo json_encode($data);
    }

    public function get_districts()
    {
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id = $this->input->post('id', TRUE);
        $data = $this->Kota_m->get_districts($id)->result();
        echo json_encode($data);
    }

    public function get_villages()
    {
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id = $this->input->post('id', TRUE);
        $data = $this->Kota_m->get_villages($id)->result();
        echo json_encode($data);
    }

    public function get_villages1()
    {
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id = $this->input->post('id', TRUE);
        $data = $this->Kota_m->get_villages($id)->result();
        echo json_encode($data);
    }

    public function get_wilayah()
    {
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id = $this->input->post('id', TRUE);
        $data = $this->Pelanggan_m->get_wilayah($id)->result();
        echo json_encode($data);
    }

    public function get_jalan()
    {
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id = $this->input->post('id', TRUE);
        $data = $this->Pelanggan_m->get_jalan($id)->result();
        echo json_encode($data);
    }


    public function multiform()
    {
        $rules = array(
            [
                'field' => 'no_pelanggan',
                'label' => 'Nomor pelanggan',
                'rules' => 'required|max_length[11]|min_length[10]|is_unique[pelanggan.no_pelanggan]',
            ],
            [
                'field' => 'no_plat',
                'label' => 'Nomor plat',
                'rules' => 'required|is_unique[pelanggan.no_plat]',
            ],
            [
                'field' => 'nama_pelanggan',
                'label' => 'Nama pelanggan',
                'rules' => 'required',
            ],
        );

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == false) {

            $data = [
                'title' => "Entry",
                'provinces' => $this->Kota_m->get_provinces()->result(),
                'districts1' => $this->Kota_m->get_districts1()->result(),
            ];

            $this->load->view('component/header', $data);
            $this->load->view('component/sidebar');
            $this->load->view('pages/hublang/multiform', $data);
            $this->load->view('component/footer');
        } else {
            $no_pelanggan = $this->input->post('no_pelanggan');
            $no_plat = $this->input->post('no_plat');

            $data =  [
                'no_pelanggan' => $no_pelanggan,
                'no_plat' => $no_plat
            ];

            var_dump($data);
            die();
        }
    }
}
