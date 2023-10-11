<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserRole extends CI_Controller
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
        $data['title'] = "Role Management";
        $data['user_role'] = $this->db->get('user_role')->result();

        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar');
        $this->load->view('pages/user_role/index', $data);
        $this->load->view('component/footer');
    }

    public function create()
    {


        $this->form_validation->set_rules('nama', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Role Management";

            $this->load->view('component/header', $data);
            $this->load->view('component/sidebar');
            $this->load->view('pages/user_role/add', $data);
            $this->load->view('component/footer');
        } else {

            $data = [
                'nama' => $this->input->post('nama'),
            ];
            $this->db->insert('user_role', $data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan!');
            redirect('UserRole');
        }
    }

    public function edit($id)
    {
        $data['title'] = "Role Management";
        $data['user_role'] = $this->db->get_where('user_role', ['id' => $id])->row_array();

        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar');
        $this->load->view('pages/user_role/edit', $data);
        $this->load->view('component/footer');
    }

    public function update($id)
    {
        $data = [
            'nama' => $this->input->post('nama'),
        ];

        $this->db->update('user_role', $data, ['id' => $id]);
        $this->session->set_flashdata('success', 'Data berhasil diupdate!');
        redirect('UserRole');
    }

    public function delete($id)
    {
        $this->db->delete('user_role', ['id' => $id]);
        $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        redirect('UserRole');
    }

    public function roleAccess($role_id)
    {
        $data['title'] = "Role Management";
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        // $this->db->where('id_menu !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result();

        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar');
        $this->load->view('pages/user_role/role_access', $data);
        $this->load->view('component/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('success', 'Akses berhasil di ubah!');
    }
}
