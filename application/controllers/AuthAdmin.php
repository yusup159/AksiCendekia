<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthAdmin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('Admin/login');
    }

    public function register()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[alluser.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Admin/login');
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 1 
            );

            $this->AuthModel->register_user($data);
            redirect('authadmin'); 
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
    
            $user = $this->AuthModel->login_user($email, $password);
    
            if ($user) {
                $userdata = array(
                    'id' => $user->id,
                    'username' => $user->username,
                    'email' => $user->email,
                );
    
                $this->session->set_userdata($userdata);
    
                redirect('authadmin/dashboard');
            } else {
                $this->session->set_flashdata('error', 'Invalid email or password');
                redirect('authadmin');
            }
        }
    }
    public function logout()
{
    $this->session->sess_destroy();
    redirect('authadmin');
}

    
	public function dashboard(){
		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/template/dashboard');
		$this->load->view('admin/template/footer');

	}
    public function data_donatur() {
        $data['donatur'] = $this->AuthModel->getDonaturData();
        $this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
        $this->load->view('admin/datadonatur', $data);
        $this->load->view('admin/template/footer');
    }
    public function data_mahasiswa() {
        $data['mahasiswa'] = $this->AuthModel->getMahasiswaData();
        $this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
        $this->load->view('admin/datamahasiswa', $data);
        $this->load->view('admin/template/footer');
    }
}
