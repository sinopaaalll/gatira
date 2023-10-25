<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		// is login
		is_logged_in("Dashboard");
	}

	public function index()
	{
		$todayDate = date('Y-m-d');
		$sevenDaysAgo = date('Y-m-d', strtotime('-7 days'));
		$oneMonth = date('Y-m-d', strtotime('-30 days'));

		// $today = $this->db->query("SELECT COUNT(id) AS jumlah FROM pelanggan WHERE created_at = " . $todayDate);

		// Query untuk mengambil jumlah id pada tanggal hari ini
		$this->db->select('COUNT(id) as jumlah');
		$this->db->from('pelanggan');
		$this->db->where('DATE(created_at)', $todayDate);
		$today = $this->db->get()->row();

		$this->db->select('DATE(created_at) as tanggal, COUNT(id) as jumlah');
		$this->db->from('pelanggan');
		$this->db->where('DATE(created_at) >=', $sevenDaysAgo);
		$this->db->where('DATE(created_at) <=', $todayDate);
		$weeks = $this->db->get()->row();

		$this->db->select('DATE(created_at) as tanggal, COUNT(id) as jumlah');
		$this->db->from('pelanggan');
		$this->db->where('DATE(created_at) >=', $oneMonth);
		$this->db->where('DATE(created_at) <=', $todayDate);
		$month = $this->db->get()->row();

		// Query untuk mengambil jumlah id berdasarkan wilayah
		$this->db->select('COUNT(pelanggan.id) as jumlah, wilayah.nama_wilayah as wilayah');
		$this->db->from('pelanggan');
		$this->db->where('pelanggan.kode_pelayanan', '01');
		$this->db->join('wilayah', 'wilayah.kode_wilayah = pelanggan.kode_wilayah');
		$this->db->group_by('pelanggan.kode_wilayah');
		$wilayah = $this->db->get()->result_array();

		// Query untuk mengambil jumlah id berdasarkan jenis
		$this->db->select('COUNT(pelanggan.id) as jumlah, jenis.nama_jenis as jenis');
		$this->db->from('pelanggan');
		$this->db->join('jenis', 'jenis.id = pelanggan.jenis_id');
		$this->db->group_by('pelanggan.jenis_id');
		$jenis = $this->db->get()->result_array();

		// Query untuk mengambil jumlah id berdasarkan kel
		$this->db->select('COUNT(pel.id) as jumlah, villages.name_villages as kel');
		$this->db->from('pelanggan as pel');
		$this->db->where('pel.kode_pelayanan', '01');
		$this->db->join('villages', 'villages.id_villages = pel.kel_pelanggan');
		$this->db->group_by('pel.kel_pelanggan');
		$kel = $this->db->get()->result_array();

		// Query untuk mengambil jumlah id berdasarkan Cabang
		$this->db->select('COUNT(pel.id) as jumlah, pelayanan.nama_pelayanan as cabang');
		$this->db->from('pelanggan as pel');
		$this->db->join('pelayanan', 'pelayanan.kode_pelayanan = pel.kode_pelayanan');
		$this->db->group_by('pel.kode_pelayanan');
		$cbg = $this->db->get()->result_array();

		$cabang = $this->db->get('pelayanan')->result();

		$data = [
			'title' => "Dashboard",
			'data_wilayah' => $wilayah,
			'data_jenis' => $jenis,
			'data_kel' => $kel,
			'data_cabang' => $cbg,
			'cabang' => $cabang,
			'today' => $today,
			'weeks' => $weeks,
			'month' => $month,
		];

		$this->load->view('component/header', $data);
		$this->load->view('component/sidebar', $data);
		$this->load->view('pages/dashboard/app', $data);
		$this->load->view('component/footer');
	}

	public function get_cabang()
	{
		$id = $this->input->post('id', TRUE);

		// Query untuk mengambil data berdasarkan cabang (Anda dapat menyesuaikan query ini sesuai kebutuhan)
		$this->db->select('COUNT(pel.id) as jumlah, wilayah.nama_wilayah as wilayah');
		$this->db->from('pelanggan as pel');
		$this->db->where('pel.kode_pelayanan', $id);
		$this->db->join('wilayah', 'wilayah.kode_wilayah = pel.kode_wilayah');
		$this->db->group_by('pel.kode_wilayah');
		$wilayah = $this->db->get()->result_array();

		// Siapkan data untuk dikirimkan sebagai respons AJAX
		$response_data = [
			'labels_data' => array_column($wilayah, 'wilayah'),
			'datasets_data' => array_column($wilayah, 'jumlah')
		];

		// Mengirim data sebagai respons JSON
		header('Content-Type: application/json');
		echo json_encode($response_data);
	}
}
