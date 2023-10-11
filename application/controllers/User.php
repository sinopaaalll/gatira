<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // is login
        is_logged_in("User Management");
    }

    public function index()
    {

        $data['title'] = "User Management";
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

    // Simpan data
    public function create()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required|min_length[16]|is_unique[user.nik]', [
            'is_unique' => 'This NIK has already registered!',
            'min_length' => 'NIK too short!'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|matches[pass_conf]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('pass_conf', 'Password Confirm', 'required|trim|matches[password]');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "User Management";
            $data['role'] = $this->User_m->get_role();

            $this->load->view('component/header', $data);
            $this->load->view('component/sidebar');
            $this->load->view('pages/user/add', $data);
            $this->load->view('component/footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role', true),
                'is_active' => 0,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan!');
            redirect('user');
        }
    }

    public function detail($id)
    {
        $data['title'] = "User Management";
        $data['user'] = $this->User_m->getUserID($id)->row_array();

        $this->load->view('component/header', $data);
        $this->load->view('component/sidebar');
        $this->load->view('pages/user/detail', $data);
        $this->load->view('component/footer');
    }


    // Simpan data
    public function update($id)
    {
        // Aturan validasi untuk NIK
        $this->form_validation->set_rules('nik', 'NIK', 'required|min_length[16]|callback_check_nik[' . $id . ']', [
            'min_length' => 'NIK terlalu pendek!'
        ]);

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|min_length[5]|matches[pass_conf]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('pass_conf', 'Password Confirm', 'trim|matches[password]');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "User Management";
            $data['user'] = $this->User_m->getUserID($id)->row_array();
            $data['role'] = $this->User_m->get_role();

            $this->load->view('component/header', $data);
            $this->load->view('component/sidebar');
            $this->load->view('pages/user/edit', $data);
            $this->load->view('component/footer');
        } else {
            $data['user'] = $this->User_m->getUserID($id)->row_array();
            $email = $this->input->post('email', true);
            if ($this->input->post('password')) {
                $pass = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            } else {
                $pass = $data['user']['password'];
            }

            $data = [
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($email),
                // 'image' => 'default.jpg',
                'password' => $pass,
                'role_id' => $this->input->post('role', true),
            ];

            $this->db->update('user', $data, array('id' => $id));
            $this->session->set_flashdata('success', 'Data berhasil diupdate!');
            redirect('user');
        }
    }

    // fungsi untuk mengecek nik jika update data
    public function check_nik($nik, $id)
    {
        $existing_nik = $this->db->get_where('user', ['nik' => $nik])->row();
        if ($existing_nik) {
            // Jika NIK sudah ada dalam basis data
            // Periksa apakah ID yang ditemukan sama dengan ID yang sedang diperbarui
            // Jika sama, NIK diperbolehkan karena itu NIK yang sedang diperbarui
            if ($existing_nik->id == $id) {
                return true;
            } else {
                // Jika ID tidak sama, berarti NIK ini telah digunakan oleh pengguna lain
                $this->form_validation->set_message('check_nik', 'NIK ini telah terdaftar oleh pengguna lain.');
                return false;
            }
        } else {
            // Jika NIK belum ada dalam basis data, maka NIK ini valid
            return true;
        }
    }

    public function delete($id)
    {

        // Ambil informasi pengguna sebelum dihapus
        $user = $this->db->get_where('user', ['id' => $id])->row();

        // Hapus foto dari repositori jika foto bukan "default.jpg"
        if ($user && $user->image != 'default.jpg') {
            // Anda perlu menentukan path lengkap ke direktori penyimpanan foto
            // Misalnya, jika foto disimpan dalam direktori 'uploads/'
            $photo_path = 'assets/images/user' . $user->image;

            // Hapus foto jika file ada di direktori
            if (file_exists($photo_path)) {
                unlink($photo_path);
            }
        }
        $this->db->delete('user', ['id' => $id]);
        $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        redirect('user');
    }
}
