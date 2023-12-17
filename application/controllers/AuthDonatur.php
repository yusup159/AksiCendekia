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
        $user_id = $this->session->userdata('id');
        $donatur = $this->AuthModel->get_donatur_by_id($user_id);
        $data['donatur'] = $donatur;
        $data['result'] = $this->AuthModel->getJoinedData();

		$this->load->view('donatur/template/dashboard',$data);
	}
    public function logout()
    {
        $this->session->sess_destroy();

        redirect('AuthDonatur/index');
    }

    public function profil_donatur(){
        if (!$this->session->userdata('id')) {
            redirect('AuthDonatur/index');
        }
        $user_id = $this->session->userdata('id');
        $donatur_data = $this->AuthModel->get_donatur_by_id($user_id);
        $data['donatur'] = $donatur_data;
        $this->load->view('donatur/profil', $data);
    }
    public function edit_profil_donatur(){
        if (!$this->session->userdata('id')) {
            redirect('AuthDonatur/index');
        }
        $id = $this->session->userdata('id');
        $user_id = $this->session->userdata('id');
        $donatur_data = $this->AuthModel->get_donatur_by_id($user_id);
        $data['donatur'] = $donatur_data;
       
        $this->load->view('donatur/editprofil',$data);
    }
    public function edit_profil_dntr() {
        // Lakukan validasi form jika diperlukan
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan kembali form dengan error
            $this->load->view('donatur/editprofil');
        } else {
            // Ambil data dari form
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');

            // Upload foto jika ada
            $config['upload_path'] = './Asset/foto_donatur/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 10048; // 2MB max size

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data('file_name');
            } else {
                $foto = $this->input->post('foto_lama'); // Jika foto tidak diupload, gunakan foto lama
            }

            // Panggil model untuk menyimpan perubahan
            $this->AuthModel->edit_profil_donatur($username, $email, $nama, $alamat, $foto);

            // Redirect atau tampilkan pesan sukses
            redirect('AuthDonatur/profil_donatur');
        }
    }
    
    public function histori_donasi(){
        if (!$this->session->userdata('id')) {
            redirect('AuthDonatur/index');
        }
        $id_donatur = $this->session->userdata('id');
        $result = $this->AuthModel->get_transaction_data_by_donatur_id($id_donatur);
        $data['result'] = $result;
        $this->load->view('donatur/historidonasi',$data);
    }
    public function detail_donasi($id_penggalangan){
        if (!$this->session->userdata('id')) {
            redirect('AuthDonatur/index');
        }
        $user_id = $this->session->userdata('id');
        $donatur_data = $this->AuthModel->get_donatur_by_id($user_id);
        $data['donatur'] = $donatur_data;
        $data['dana'] = $this->AuthModel->get_data_penggalangan($id_penggalangan);
        $this->load->view('donatur/detaildonasi',$data);
    }


    public function galangdana($id_penggalangan){
        if (!$this->session->userdata('id')) {
            redirect('AuthDonatur/index');
        }
        $user_id = $this->session->userdata('id');
        
        $alluser_id = $this->AuthModel->get_alluser_id_by_donatur_id($user_id);
        $data['alluser_id'] = $alluser_id;
        $data['danadonasi'] = $this->AuthModel->get_data_penggalangan($id_penggalangan);
        $this->load->view('donatur/galangdana',$data);
    }
    public function pembayaran(){
        if (!$this->session->userdata('id')) {
            redirect('AuthDonatur/index');
        }
        $this->load->view('donatur/pembayaran');
    }
    public function search() {
        $query = $this->input->get('query');
        $user_id = $this->session->userdata('id');
        $donatur_data = $this->AuthModel->get_donatur_by_id($user_id);
        $data['donatur'] = $donatur_data;
        $data['result'] = $this->AuthModel->searchData($query);
        $this->load->view('donatur/search', $data);
    }
}
