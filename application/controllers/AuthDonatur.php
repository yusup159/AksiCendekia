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
            redirect('AuthMahasiswa/index');
        }
        $this->load->library('pagination');

        
        $config['base_url'] = 'http://localhost/AksiCendikia/index.php/AuthMahasiswa/dashboard/';
        $config['total_rows'] = $this->AuthModel->countPenggalangan();
        $config['per_page'] = 9;

        $config['full_tag_open']='<nav><ul class="pagination">' ; 
        $config['full_tag_close']=' </ul></nav>' ; 

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&raquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');
        
        $user_id = $this->session->userdata('id');
        $donatur = $this->AuthModel->get_donatur_by_id($user_id);
        $data['donatur'] = $donatur;
        $data['start'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['result'] = $this->AuthModel->getJoinedData($config['per_page'], $data['start']);

        $this->pagination->initialize($config);
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
        
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
           
            $this->load->view('donatur/editprofil');
        } else {
           
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');

            
            $config['upload_path'] = './Asset/foto_donatur/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 10048; 

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data('file_name');
            } else {
                $foto = $this->input->post('foto_lama'); 
            }

          
            $this->AuthModel->edit_profil_donatur($username, $email, $nama, $alamat, $foto);

           
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
