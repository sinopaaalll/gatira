<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // is login
        if (!$this->session->userdata('nik')) {
            redirect('auth/login');
        } else if ($this->session->userdata('role_id') != 1) {
            redirect('404_override');
        }
    }

    public function index()
    {
        $data['title'] = "User";
        $data['user'] = $this->User_m->get_all()->result();

        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar');
        $this->load->view('pages/user/index', $data);
        $this->load->view('component/footer');
    }

    public function aktivasi($id)
    {
        $data = [
            'is_active' => 1
        ];

        $update = $this->db->update('user', $data, array('id' => $id));
        if ($update) {
            $this->session->set_flashdata('success', 'Akun Berhasil Di Aktivasi.');
            redirect('user');
        }
    }
}
