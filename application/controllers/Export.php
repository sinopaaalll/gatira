<?php defined('BASEPATH') or die('No direct script access allowed');

require_once APPPATH . "/third_party/PHPExcel-1.8/Classes/PHPExcel.php";
require_once APPPATH . "/third_party/PHPExcel-1.8/Classes/PHPExcel/IOFactory.php";

class Export extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function export()
  {

    $jenis = $this->db->get('jenis')->result();

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
    $objPHPExcel->getActiveSheet()->setCellValue('A1', "No");
    $objPHPExcel->getActiveSheet()->setCellValue('B1', "Nama");

    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);

    // Add data
    $kolom = 2;
    $nomor = 1;
    foreach ($jenis as $j) {
      $objPHPExcel->getActiveSheet()->setCellValue('A' . $kolom, $nomor)
        ->setCellValue('B' . $kolom, $j->nama_jenis);
      $kolom++;
      $nomor++;
    }

    // Set Font Color, Font Style and Font Alignment
    $stil = array(
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
    $objPHPExcel->getActiveSheet()->getStyle('A1:B1')->applyFromArray($stil);

    // Save Excel xls File
    $filename = "coba.xlsx";
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    ob_end_clean();
    header('Content-type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename=' . $filename);
    $objWriter->save('php://output');
  }

  public function index()
  {
    $data['jenis'] = $this->db->get('jenis')->result();
    $this->load->view('export', $data);
  }
}
