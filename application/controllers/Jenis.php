<?php
defined('BASEPATH') or exit('No direct script access allowed');

class jenis extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // is login
        is_logged_in("Jenis Langganan");
    }

    public function index()
    {
        $data['title'] = "Jenis Langganan";
        $data['jenis'] = $this->db->get('jenis')->result();

        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar');
        $this->load->view('pages/jenis/index', $data);
        $this->load->view('component/footer');
    }

    public function create()
    {


        $this->form_validation->set_rules('nama', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Jenis Langganan";

            $this->load->view('component/header', $data);
            $this->load->view('component/sidebar');
            $this->load->view('pages/jenis/add', $data);
            $this->load->view('component/footer');
        } else {

            $data = [
                'nama_jenis' => $this->input->post('nama'),
            ];
            $this->db->insert('jenis', $data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan!');
            redirect('jenis');
        }
    }

    public function edit($id)
    {
        $data['title'] = "Jenis Langganan";
        $data['jenis'] = $this->db->get_where('jenis', ['id' => $id])->row_array();

        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar');
        $this->load->view('pages/jenis/edit', $data);
        $this->load->view('component/footer');
    }

    public function update($id)
    {
        $data = [
            'nama_jenis' => $this->input->post('nama'),
        ];

        $this->db->update('jenis', $data, ['id' => $id]);
        $this->session->set_flashdata('success', 'Data berhasil diupdate!');
        redirect('jenis');
    }

    public function delete($id)
    {
        $this->db->delete('jenis', ['id' => $id]);
        $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        redirect('jenis');
    }
}
