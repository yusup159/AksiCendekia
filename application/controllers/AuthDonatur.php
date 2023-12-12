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
        $this->load->view('donatur/login');
    }
    public function halaman_register()
    {
        $this->load->view('donatur/register');
    }

    public function register()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[alluser.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('donatur/register');
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            );

            $this->AuthModel->register_donatur($data);
            redirect('AuthDonatur'); 
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Admin/login');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
    
            $user = $this->AuthModel->login_donatur($email, $password);
    
            if ($user) {
                $userdata = array(
                    'id' => $user->id,
                    'email' => $user->email,
                );
    
                $this->session->set_userdata($userdata);
    
                redirect('AuthDonatur/dashboard');
            } else {
                $this->session->set_flashdata('error', 'Invalid email or password');
                redirect('AuthDonatur');
            }
        }
    }
    
	public function dashboard(){
        if (!$this->session->userdata('id')) {
            redirect('AuthDonatur/index');
        }
		$this->load->view('donatur/template/dashboard');
	}
    public function profil_donatur(){
        if (!$this->session->userdata('id')) {
            redirect('AuthDonatur/index');
        }
        $this->load->view('donatur/profil');
    }
    public function edit_profil_donatur(){
        if (!$this->session->userdata('id')) {
            redirect('AuthDonatur/index');
        }
        $this->load->view('donatur/editprofil');
    }
    public function histori_donasi(){
        if (!$this->session->userdata('id')) {
            redirect('AuthDonatur/index');
        }
        $this->load->view('donatur/historidonasi');
    }
}
