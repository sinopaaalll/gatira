<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . "/third_party/PHPExcel-1.8/Classes/PHPExcel.php";
require_once APPPATH . "/third_party/PHPExcel-1.8/Classes/PHPExcel/IOFactory.php";
class Hublang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        // is login
        is_logged_in("Entry Pelanggan");

        $this->session->unset_userdata('no_pelanggan');
        $this->form_validation->set_rules('no_pelanggan', 'Nomor Pelanggan', 'required|max_length[11]|min_length[10]');

        if ($this->form_validation->run() == false) {

            $data = [
                'title' => "Entry Pelanggan",
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
        // is login
        is_logged_in("Entry Pelanggan");
        if (empty($this->session->userdata('no_pelanggan'))) {
            $this->session->set_flashdata('warning', 'Silahkan cek terlebih dahulu sebelum updating data!');
            redirect('hublang');
        };

        $kecamatan = $this->db->query("SELECT * FROM districts WHERE regency_id='3214'")->result_array();

        $data = [
            'title' => "Entry Pelanggan",
            'provinces' => $this->Kota_m->get_provinces()->result(),
            'districts1' => $this->Kota_m->get_districts1()->result(),
            'jenis' => $this->Pelanggan_m->get_jenis()->result(),
            'districts2' => $kecamatan,
            'pelayanan' => $this->Pelanggan_m->get_pelayanan()->result(),
            'jenis' => $this->Pelanggan_m->get_jenis()->result(),
            'ket_spl' => $this->Pelanggan_m->get_ket_spl()->result(),
        ];

        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar');
        $this->load->view('pages/hublang/entry', $data);
        $this->load->view('component/footer');
    }

    public function proses()
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
            'tgl_bayar' => $this->input->post('tgl_bayar', true),
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
            'created_by' => $this->session->userdata('nama'),
            'created_at' => date('Y-m-d'),
            // 'created_by' => htmlspecialchars($this->input->post('created_by', true))
        ];

        if ($this->db->insert('pelanggan', $data)) {
            $this->session->set_flashdata('success', 'Data berhasil di entry.');
            redirect('hublang');
        } else {
            $this->session->set_flashdata('error', 'Data gagal di entry.');
            redirect('hublang');
        };
    }

    public function data()
    {
        // is login
        is_logged_in("Data Pelanggan");

        $data['title'] = "Data Pelanggan";
        $data['wilayah'] = $this->db->get_where('wilayah', ['kode_pelayanan', '01'])->result();

        // $wilayah = $this->input->post('wilayah');

        $data['pelanggan'] = $this->Pelanggan_m->get_data();

        // if (empty($wilayah)) {
        //     $data['pelanggan'] = $this->Pelanggan_m->get_data();
        // } else {
        //     $data['pelanggan'] = $this->Pelanggan_m->get_data_by_wilayah($wilayah);
        // }

        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar');
        $this->load->view('pages/hublang/data', $data);
        $this->load->view('component/footer');
    }

    public function detail($id)
    {
        // is login
        is_logged_in("Data Pelanggan");

        $data['title'] = "Data Pelanggan";
        $data['pel'] = $this->Pelanggan_m->get_data_by_id($id);

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

    public function edit($id)
    {
        // is login
        is_logged_in("Data Pelanggan");

        $this->form_validation->set_rules('no_pelanggan', 'No. Pelanggan', 'required|max_length[11]');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat_pelanggan', 'Alamat', 'required');
        $this->form_validation->set_rules('kec_pelanggan', 'Kecamatan', 'required');
        $this->form_validation->set_rules('kel_pelanggan', 'Kelurahan / Desa', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('telp', 'Nomor telepon', 'required');

        if ($this->form_validation->run() == false) {

            $data['title'] = "Data Pelanggan";
            $data['pel'] = $this->Pelanggan_m->get_data_by_id($id);

            $kecamatan = $this->db->query("SELECT * FROM districts WHERE regency_id='3214'")->result();
            $data['districts'] = $kecamatan;

            $this->load->view('component/header', $data);
            $this->load->view('component/sidebar');
            $this->load->view('pages/hublang/edit', $data);
            $this->load->view('component/footer');
        } else {

            $phoneNumber = htmlspecialchars($this->input->post('telp', true));
            // Menghapus spasi dan tanda hubung dari string
            $cleanedPhoneNumber = str_replace(['+', ' ', '-'], '', $phoneNumber);

            $data = [
                'no_pelanggan' => htmlspecialchars($this->input->post('no_pelanggan', true)),
                'kode_pelayanan' => htmlspecialchars($this->input->post('kode_pelayanan', true)),
                'kode_wilayah' => htmlspecialchars($this->input->post('kode_wilayah', true)),
                'kode_jalan' => htmlspecialchars($this->input->post('kode_jalan', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'alamat_pelanggan' => htmlspecialchars($this->input->post('alamat_pelanggan', true)),
                'prov_pelanggan' => "32",
                'kota_pelanggan' => "3214",
                'kel_pelanggan' => htmlspecialchars($this->input->post('kel_pelanggan', true)),
                'kec_pelanggan' => htmlspecialchars($this->input->post('kec_pelanggan', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'telp' => $cleanedPhoneNumber,
                'updated_by' => $this->session->userdata('nik'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $this->db->update('pelanggan', $data, ['id' => $id]);

            $this->session->set_flashdata('success', 'Data berhasil di update!');
            redirect('hublang/data');
        }
    }

    public function destroy($id)
    {
        if ($this->db->delete('pelanggan', ['id' => $id])) {
            $this->session->set_flashdata('success', 'Data berhasil di hapus.');
            redirect('hublang/data');
        } else {
            $this->session->set_flashdata('error', 'Data gagal di hapus.');
            redirect('hublang/data');
        };
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

    public function getDataPelangganByWilayah()
    {
        // Ambil data wilayah dari request
        $id = $this->input->post('id');

        // Mendapatkan data pelanggan berdasarkan wilayah
        $data = $this->Pelanggan_m->get_data_by_wilayah($id);

        // Mengirim data dalam bentuk JSON
        echo json_encode($data);
    }

    public function get_jalan()
    {
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id = $this->input->post('id', TRUE);
        $data = $this->Pelanggan_m->get_jalan($id)->result();
        echo json_encode($data);
    }

    public function export()
    {
        $kd_wly = $this->input->post('wilayah');

        $this->db->select('pelanggan.no_pelanggan, pelanggan.kode_pelayanan, pelanggan.kode_wilayah, pelanggan.nama, pelanggan.email, pelanggan.alamat_pelanggan, pelanggan.telp, districts_pelanggan.name_districts as kec_pel, villages_pelanggan.name_villages as kel_pel');
        $this->db->from('pelanggan');
        $this->db->join('districts as districts_pelanggan', 'districts_pelanggan.id_districts = pelanggan.kec_pelanggan');
        $this->db->join('villages as villages_pelanggan', 'villages_pelanggan.id_villages = pelanggan.kel_pelanggan');

        if (!empty($kd_wly)) {
            $this->db->where('pelanggan.kode_wilayah', $kd_wly);
            $result = $this->db->get()->result();
        } else {
            $result = $this->db->get()->result();
        }

        $pelanggan = $result;


        // var_dump($pelanggan);
        // die();

        $objPHPExcel = new PHPExcel();

        // Set document properties
        $objPHPExcel->getProperties()->setCreator("PDAM Purwakarta")
            ->setLastModifiedBy("PDAM Purwakarta")
            ->setTitle("Office 2007 XLS Test Document")
            ->setSubject("Office 2007 XLS Test Document")
            ->setDescription("Description for Test Document")
            ->setKeywords("phpexcel office codeigniter php")
            ->setCategory("Test result file");

        // Create a first sheet
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setTitle('Data Pelanggan');

        $objPHPExcel->getActiveSheet()->setCellValue('B1', "DAFTAR PELANGGAN");
        $objPHPExcel->getActiveSheet()->mergeCells('B1:J1');

        $objPHPExcel->getActiveSheet()->setCellValue('A3', "No");
        $objPHPExcel->getActiveSheet()->mergeCells('A3:A4');

        $objPHPExcel->getActiveSheet()->setCellValue('B3', "Pelanggan");
        $objPHPExcel->getActiveSheet()->mergeCells('B3:J3');

        $objPHPExcel->getActiveSheet()->setCellValue('B4', "Cabang");
        $objPHPExcel->getActiveSheet()->setCellValue('C4', "Wilayah");
        $objPHPExcel->getActiveSheet()->setCellValue('D4', "No Pelanggan");
        $objPHPExcel->getActiveSheet()->setCellValue('E4', "Nama");
        $objPHPExcel->getActiveSheet()->setCellValue('F4', "Alamat");
        $objPHPExcel->getActiveSheet()->setCellValue('G4', "Kelurahan");
        $objPHPExcel->getActiveSheet()->setCellValue('H4', "Kecamatan");
        $objPHPExcel->getActiveSheet()->setCellValue('I4', "Telepon");
        $objPHPExcel->getActiveSheet()->setCellValue('J4', "Email");

        for ($col = 'B'; $col !== 'Z'; $col++) {
            // Mengatur dimensi otomatis untuk setiap kolom
            $objPHPExcel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
        }


        // Add data
        $kolom = 5;
        $nomor = 1;
        foreach ($pelanggan as $pel) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $pel->kode_pelayanan)
                ->setCellValue('C' . $kolom, $pel->kode_wilayah)
                ->setCellValue('D' . $kolom, $pel->no_pelanggan)
                ->setCellValue('E' . $kolom, $pel->nama)
                ->setCellValue('F' . $kolom, $pel->alamat_pelanggan)
                ->setCellValue('G' . $kolom, $pel->kel_pel)
                ->setCellValue('H' . $kolom, $pel->kec_pel)
                ->setCellValue('I' . $kolom, $pel->telp)
                ->setCellValue('J' . $kolom, $pel->email);
            $kolom++;
            $nomor++;
        }

        // Set Font Color, Font Style and Font Alignment
        $judul =  array(
            'font' => array(
                'bold' => true,
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            )
        );

        $stil = array(
            'font' => array(
                'bold' => true,
            ),
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '000000')
                )
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            )
        );
        $objPHPExcel->getActiveSheet()->getStyle('B1')->applyFromArray($judul);
        $objPHPExcel->getActiveSheet()->getStyle('A3:J4')->applyFromArray($stil);
        // $objPHPExcel->getActiveSheet()->setAutoFilter('B4:J4');

        // Calculate total data
        $totalRows = count($pelanggan);

        // Create a new sheet for the report
        $objPHPExcel->createSheet();
        $objPHPExcel->setActiveSheetIndex(1);
        $objPHPExcel->getActiveSheet()->setTitle('Report');
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Report Data Pelanggan');
        $objPHPExcel->getActiveSheet()->setCellValue('A3', 'Total Keseluruhan:');
        $objPHPExcel->getActiveSheet()->setCellValue('B3', $totalRows);

        for ($col = 'A'; $col !== 'Z'; $col++) {
            // Mengatur dimensi otomatis untuk setiap kolom
            $objPHPExcel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
        }

        // Calculate total per kode wilayah
        $kodeWilayahCounts = array();
        foreach ($pelanggan as $pel) {
            if (array_key_exists($pel->kode_wilayah, $kodeWilayahCounts)) {
                $kodeWilayahCounts[$pel->kode_wilayah]++;
            } else {
                $kodeWilayahCounts[$pel->kode_wilayah] = 1;
            }
        }

        $kodeWilayahRow = 5;
        $objPHPExcel->getActiveSheet()->setCellValue('A' . $kodeWilayahRow, 'Kode Wilayah');
        $objPHPExcel->getActiveSheet()->setCellValue('B' . $kodeWilayahRow, 'Total');
        $kodeWilayahRow++;
        foreach ($kodeWilayahCounts as $kode_wilayah => $count) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $kodeWilayahRow, $kode_wilayah);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $kodeWilayahRow, $count);
            $kodeWilayahRow++;
        }

        // Save Excel xls File
        $filename = "Update-data-pelanggan.xlsx";
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        ob_end_clean();
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename=' . $filename);
        $objWriter->save('php://output');
    }
}
