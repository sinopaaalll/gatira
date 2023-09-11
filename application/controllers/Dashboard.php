<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
    {
        parent::__construct();

        // is login
        if (!$this->session->userdata('nik')) {
            redirect('auth/login');
        }
    }

	public function index()
	{

		$data = [
			'title' => "Dashboard",
		];

		$this->load->view('component/header', $data);
		$this->load->view('component/sidebar', $data);
		$this->load->view('pages/dashboard/app');
		$this->load->view('component/footer');
	}
}
