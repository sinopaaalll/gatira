<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Submenu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // is login
        is_logged_in("Submenu Management");
    }

    public function index()
    {
        $data['title'] = "Submenu Management";

        $query = $this->db->select('sm.*, m.menu as menu')->from('user_sub_menu as sm')->join('user_menu as m', 'm.id_menu = sm.menu_id')->get();
        $data['submenu'] = $query->result();

        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar');
        $this->load->view('pages/submenu/index', $data);
        $this->load->view('component/footer');
    }

    public function create()
    {
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required|is_unique[user_sub_menu.title]');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');
        $this->form_validation->set_rules('is_active', 'Status', 'required');

        if ($this->form_validation->run() == false) {

            $data['title'] = "Submenu Management";
            $data['menu'] = $this->db->get('user_menu')->result();

            $this->load->view('component/header', $data);
            $this->load->view('component/sidebar');
            $this->load->view('pages/submenu/add', $data);
            $this->load->view('component/footer');
        } else {

            $data = [
                'menu_id' => $this->input->post('menu'),
                'title' => $this->input->post('title'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active'),
            ];

            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan!');
            redirect('submenu');
        }
    }

    public function edit($id)
    {
        $data['title'] = "Submenu Management";
        $data['menu'] = $this->db->get('user_menu')->result();
        $data['submenu'] = $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();

        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar');
        $this->load->view('pages/submenu/edit', $data);
        $this->load->view('component/footer');
    }

    public function update($id)
    {
        $data = [
            'menu_id' => $this->input->post('menu'),
            'title' => $this->input->post('title'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'is_active' => $this->input->post('is_active'),
        ];

        $this->db->update('user_sub_menu', $data, ['id' => $id]);
        $this->session->set_flashdata('success', 'Data berhasil diupdate!');
        redirect('submenu');
    }

    public function delete($id)
    {
        $this->db->delete('user_sub_menu', ['id' => $id]);
        $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        redirect('submenu');
    }
}
