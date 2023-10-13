<?php defined('BASEPATH') or die('No direct script access allowed');

require_once APPPATH . "/third_party/PHPExcel-1.8/Classes/PHPExcel.php";
require_once APPPATH . "/third_party/PHPExcel-1.8/Classes/PHPExcel/IOFactory.php";

class Report extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Report';
        $data['cabang'] = $this->db->get('pelayanan')->result();
        $data['jenis'] = $this->db->get('jenis')->result();


        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar');
        $this->load->view('pages/report/index', $data);
        $this->load->view('component/footer');
    }

    public function get_wilayah()
    {
        $id = $this->input->post('id', TRUE);
        $data = $this->Pelanggan_m->get_wilayah($id)->result();
        echo json_encode($data);
    }

    public function get_jalan()
    {
        $id = $this->input->post('id', TRUE);
        $data = $this->Pelanggan_m->get_jalan($id)->result();
        echo json_encode($data);
    }

    public function export()
    {
        $kd_cbg = $this->input->post('cabang');
        $kd_wly = $this->input->post('wilayah');
        $kd_jln = $this->input->post('jalan');
        $jenis = $this->input->post('jenis');

        $this->db->select('pelanggan.*, pelayanan.nama_pelayanan as cabang, wilayah.nama_wilayah as wilayah, jalan.nama_jalan as jalan, districts_pelanggan.name_districts as kec_pel, villages_pelanggan.name_villages as kel_pel, jenis.nama_jenis as jenis');
        $this->db->from('pelanggan');
        $this->db->join('pelayanan', 'pelanggan.kode_pelayanan = pelayanan.kode_pelayanan');
        $this->db->join('wilayah', 'pelanggan.kode_wilayah = wilayah.kode_wilayah');
        $this->db->join('jalan', 'pelanggan.kode_jalan = jalan.kode_jalan');
        $this->db->join('districts as districts_pelanggan', 'districts_pelanggan.id_districts = pelanggan.kec_pelanggan');
        $this->db->join('villages as villages_pelanggan', 'villages_pelanggan.id_villages = pelanggan.kel_pelanggan');
        $this->db->join('jenis', 'jenis.id = pelanggan.jenis_id');

        $this->db->group_start();
        if (!empty($kd_cbg)) {
            $this->db->where('pelanggan.kode_pelayanan', $kd_cbg);
        }
        if (!empty($kd_wly)) {
            $this->db->where('pelanggan.kode_wilayah', $kd_wly);
        }
        if (!empty($kd_jln)) {
            $this->db->where('pelanggan.kode_jalan', $kd_jln);
        }
        if (!empty($jenis)) {
            $this->db->where('pelanggan.jenis_id', $jenis);
        }
        $this->db->group_end();


        $pelanggan = $this->db->get()->result();

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

        $objPHPExcel->getActiveSheet()->setCellValue('B1', "DAFTAR PELANGGAN");
        $objPHPExcel->getActiveSheet()->mergeCells('B1:K1');

        $objPHPExcel->getActiveSheet()->setCellValue('A3', "No");
        $objPHPExcel->getActiveSheet()->mergeCells('A3:A4');

        $objPHPExcel->getActiveSheet()->setCellValue('B3', "Pelanggan");
        $objPHPExcel->getActiveSheet()->mergeCells('B3:K3');

        $objPHPExcel->getActiveSheet()->setCellValue('B4', "Cabang");
        $objPHPExcel->getActiveSheet()->setCellValue('C4', "Wilayah");
        $objPHPExcel->getActiveSheet()->setCellValue('D4', "Jalan");
        $objPHPExcel->getActiveSheet()->setCellValue('E4', "No Pelanggan");
        $objPHPExcel->getActiveSheet()->setCellValue('F4', "Nama");
        $objPHPExcel->getActiveSheet()->setCellValue('G4', "Alamat");
        $objPHPExcel->getActiveSheet()->setCellValue('H4', "Kelurahan");
        $objPHPExcel->getActiveSheet()->setCellValue('I4', "Kecamatan");
        $objPHPExcel->getActiveSheet()->setCellValue('J4', "Status");
        $objPHPExcel->getActiveSheet()->setCellValue('K4', "Jenis Pelanggan");

        for ($col = 'B'; $col !== 'Z'; $col++) {
            // Mengatur dimensi otomatis untuk setiap kolom
            $objPHPExcel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
        }


        // Add data
        $kolom = 5;
        $nomor = 1;
        foreach ($pelanggan as $pel) {
            if ($pel->status == 1) {
                $status = "Aktif";
            } elseif ($pel->status == 2) {
                $status = "Segel";
            } elseif ($pel->status == 3) {
                $status = "Bongkar";
            } else {
                $status = "Tidak Aktif";
            }
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $pel->cabang)
                ->setCellValue('C' . $kolom, $pel->wilayah)
                ->setCellValue('D' . $kolom, $pel->jalan)
                ->setCellValue('E' . $kolom, $pel->no_pelanggan)
                ->setCellValue('F' . $kolom, $pel->nama)
                ->setCellValue('G' . $kolom, $pel->alamat_pelanggan)
                ->setCellValue('H' . $kolom, $pel->kel_pel)
                ->setCellValue('I' . $kolom, $pel->kec_pel)
                ->setCellValue('J' . $kolom, $status)
                ->setCellValue('K' . $kolom, $pel->jenis);
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
        $objPHPExcel->getActiveSheet()->getStyle('A3:K4')->applyFromArray($stil);
        $objPHPExcel->getActiveSheet()->setAutoFilter('B4:K4');

        // Save Excel xls File
        $filename = "Rekap-data-pelanggan.xlsx";
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        ob_end_clean();
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename=' . $filename);
        $objWriter->save('php://output');
    }
}
