<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthDonatur extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('Donatur/login');
    }
    public function halaman_register()
    {
        $this->load->view('Donatur/register');
    }

    public function register()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[alluser.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan kembali form registrasi
            $this->load->view('Donatur/register');
        } else {
            // Jika validasi berhasil, lakukan registrasi
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            );

            $this->AuthModel->register_donatur($data);
            redirect('authdonatur'); // Redirect ke halaman login setelah registrasi
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan kembali form login
            $this->load->view('Admin/login');
        } else {
            // Jika validasi berhasil, lakukan login
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->AuthModel->login_donatur($email, $password);

            if ($user) {

                redirect('authdonatur/dashboard');
            } else {
                // Tampilkan pesan error jika login gagal
                $this->session->set_flashdata('error', 'Invalid email or password');
                redirect('authdonatur');
            }
        }
    }
	public function dashboard(){
		$this->load->view('donatur/template/dashboard');
	}
    public function profil_donatur(){
        $this->load->view('donatur/profil');
    }
    public function edit_profil_donatur(){
        $this->load->view('donatur/editprofil');
    }
    public function histori_donasi(){
        $this->load->view('donatur/historidonasi');
    }
}
