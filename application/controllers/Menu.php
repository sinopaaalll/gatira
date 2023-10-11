<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // is login
        is_logged_in("Menu Management");
    }

    public function index()
    {
        $data['title'] = "Menu Management";
        $data['menu'] = $this->db->get('user_menu')->result();

        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar');
        $this->load->view('pages/menu/index', $data);
        $this->load->view('component/footer');
    }

    public function create()
    {
        $this->form_validation->set_rules('menu', 'Menu', 'required|is_unique[user_menu.menu]');

        if ($this->form_validation->run() == false) {

            $data['title'] = "Menu Management";

            $this->load->view('component/header', $data);
            $this->load->view('component/sidebar');
            $this->load->view('pages/menu/add', $data);
            $this->load->view('component/footer');
        } else {

            $data = [
                'menu' => $this->input->post('menu'),
            ];
            $this->db->insert('user_menu', $data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan!');
            redirect('menu');
        }
    }

    public function edit($id)
    {
        $data['title'] = "Menu Management";
        $data['menu'] = $this->db->get_where('user_menu', ['id_menu' => $id])->row_array();

        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar');
        $this->load->view('pages/menu/edit', $data);
        $this->load->view('component/footer');
    }

    public function update($id)
    {
        $data = [
            'menu' => $this->input->post('menu'),
        ];

        $this->db->update('user_menu', $data, ['id_menu' => $id]);
        $this->session->set_flashdata('success', 'Data berhasil diupdate!');
        redirect('menu');
    }

    public function delete($id)
    {
        $this->db->delete('user_menu', ['id_menu' => $id]);
        $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        redirect('menu');
    }
}
