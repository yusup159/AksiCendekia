<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthMahasiswa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('mahasiswa/login');
    }

    public function register()
    {
        $this->load->view('mahasiswa/register');
    }

    public function proses_login()
{
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() == FALSE) {
        // Jika validasi gagal, kembali ke halaman login
        $this->load->view('mahasiswa/login');
    } else {
        // Ambil data dari formulir login
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // Lakukan login
        $user = $this->AuthModel->login_mahasiswa($email, $password);

        if ($user) {
            // Simpan data user ke session
            $user_data = array(
                'id' => $user->id, // adjust this based on your user data structure
                'email' => $user->email, // adjust this based on your user data structure
                // add more data as needed
            );

            $this->session->set_userdata($user_data);

            redirect('AuthMahasiswa/dashboard');
        } else {
            $this->session->set_flashdata('error', 'Email atau password salah.');
            redirect('AuthMahasiswa/index');
        }
    }
}


    public function proses_register()
    {
        $this->form_validation->set_rules('asal_kampus', 'Asal Kampus', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembali ke halaman register
            $this->load->view('Mahasiswa/register');
        } else {
            // Ambil data dari formulir register
            $data = array(
                'asal_kampus' => $this->input->post('asal_kampus'),
                'nim' => $this->input->post('nim'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            );

            // Lakukan register
            $this->AuthModel->register_mahasiswa($data);

            // Redirect ke halaman login setelah register berhasil
            redirect('AuthMahasiswa/index');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();

        redirect('AuthMahasiswa/index');
    }
    public function dashboard(){
        if (!$this->session->userdata('id')) {
            redirect('AuthMahasiswa/index');
        }
		$this->load->view('mahasiswa/template/dashboard');
	}
    public function profil_mahasiswa(){
        if (!$this->session->userdata('id')) {
            redirect('AuthMahasiswa/index');
        }
        $this->load->view('mahasiswa/profil');
    }
    public function edit_profil_mahasiswa(){
        if (!$this->session->userdata('id')) {
            redirect('AuthMahasiswa/index');
        }
        $this->load->view('mahasiswa/editprofil');
    }
    public function histori_donasi(){
        if (!$this->session->userdata('id')) {
            redirect('AuthMahasiswa/index');
        }
        $this->load->view('mahasiswa/historidonasi');
    }
    public function histori_penggalangan(){
        if (!$this->session->userdata('id')) {
            redirect('AuthMahasiswa/index');
        }
        $this->load->view('mahasiswa/historipenggalangan');
    }
    public function detail_donasi(){
        if (!$this->session->userdata('id')) {
            redirect('AuthMahasiswa/index');
        }
        $this->load->view('mahasiswa/detaildonasi');
    }
    public function galangdana(){
        if (!$this->session->userdata('id')) {
            redirect('AuthMahasiswa/index');
        }
        $this->load->view('mahasiswa/galangdana');
    }
    public function pembayaran(){
        if (!$this->session->userdata('id')) {
            redirect('AuthMahasiswa/index');
        }
        $this->load->view('mahasiswa/pembayaran');
    }
}
