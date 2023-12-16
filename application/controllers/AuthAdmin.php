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
        $this->load->view('admin/login');
    }

    public function register()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[alluser.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/login');
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 1 
            );

            $this->AuthModel->register_user($data);
            redirect('AuthAdmin'); 
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/login');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
    
            $user = $this->AuthModel->login_user($email, $password);
    
            if ($user) {
                $userdata = array(
                    'id_alluser' => $user->id,
                    'username' => $user->username,
                    'email' => $user->email,
                );
    
                $this->session->set_userdata($userdata);
    
                redirect('AuthAdmin/dashboard');
            } else {
                $this->session->set_flashdata('error', 'Invalid email or password');
                redirect('AuthAdmin');
            }
        }
    }
    public function logout()
{
    $this->session->sess_destroy();
    redirect('AuthAdmin');
}

    
	public function dashboard(){
        if (!$this->session->userdata('id_alluser')) {
            redirect('AuthAdmin/index');
        }
		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
		$this->load->view('admin/template/dashboard');
		$this->load->view('admin/template/footer');

	}
    public function data_donatur() {
        if (!$this->session->userdata('id_alluser')) {
            redirect('AuthAdmin/index');
        }
        $data['donatur'] = $this->AuthModel->getDonaturData();
        $this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
        $this->load->view('admin/datadonatur', $data);
        $this->load->view('admin/template/footer');
    }
    public function data_mahasiswa() {
        if (!$this->session->userdata('id_alluser')) {
            redirect('AuthAdmin/index');
        }
        $data['mahasiswa'] = $this->AuthModel->getMahasiswaData();
        $this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
        $this->load->view('admin/datamahasiswa', $data);
        $this->load->view('admin/template/footer');
    }
    public function delete_donatur($id){
        if (!$this->session->userdata('id_alluser')) {
            redirect('AuthAdmin/index');
        }
        $this->AuthModel->delete('donatur', 'id',$id);
        redirect('AuthAdmin/data_donatur');
        
    }
    public function delete_mahasiswa($id){
        if (!$this->session->userdata('id_alluser')) {
            redirect('AuthAdmin/index');
        }
        $this->AuthModel->delete('mahasiswa', 'id',$id);
        redirect('AuthAdmin/data_mahasiswa');
        
    }
    public function data_pengajuan() {
        if (!$this->session->userdata('id_alluser')) {
            redirect('AuthAdmin/index');
        }
        $data['pengajuan'] = $this->AuthModel->getPengajuanData();
        $this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar');
        $this->load->view('admin/datapengajuan', $data);
        $this->load->view('admin/template/footer');
    }
    public function tolak($id) {
        $data = array(
            'status' => 'Di tolak',
        );

        $this->db->where('id', $id);
        $this->db->update('pengajuan', $data);

       
        redirect('AuthAdmin/data_pengajuan'); 
    }
    public function terima($id) {
        $data = array(
            'status' => 'Di terima',
        );

        $this->db->where('id', $id);
        $this->db->update('pengajuan', $data);

       
        redirect('AuthAdmin/data_pengajuan'); 
    }

    public function delete_pengajuan($id) {

        $pengajuan = $this->AuthModel->getPengajuanById($id); 
      
        unlink('./dokumen_pengajuan/' . $pengajuan->dokumen);
        unlink('./foto1_pengajuan/' . $pengajuan->foto1);
        unlink('./foto2_pengajuan/' . $pengajuan->foto2);
        unlink('./foto3_pengajuan/' . $pengajuan->foto3);

 
        $this->AuthModel->deletePengajuan($id); 
        redirect('AuthAdmin/data_pengajuan'); 
    }
    public function data_penggalangan() {
        if (!$this->session->userdata('id_alluser')) {
            redirect('AuthAdmin/index');
        }
    
        $data['pengajuan'] = $this->AuthModel->getPengajuanBelumTerdaftar();
        $data['penggalangan'] = $this->AuthModel->getPenggalanganData();
    
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/datapenggalangan', $data);
        $this->load->view('admin/template/footer');
    }
    public function input_penggalangan() {
        // Ambil data dari form
        $data = array(
            'judul' => $this->input->post('judul'),
            'deskripsi' => $this->input->post('deskripsi'),
            'donasi' => $this->input->post('danadonasi'),
            'UKM' => $this->input->post('ukm'),
            'id_pengajuan' => $this->input->post('id_pengajuan')
  
        );

        // Panggil method model untuk menyimpan data
        $this->AuthModel->tambahDataPenggalangan($data);

        // Redirect ke halaman tertentu setelah input data berhasil
        redirect('AuthAdmin/data_penggalangan');
    }
    public function delete_penggalangan($id) {
        if (!$this->session->userdata('id_alluser')) {
            redirect('AuthAdmin/index');
        }
    
        $this->AuthModel->deletePenggalangan($id);
        redirect('AuthAdmin/data_penggalangan');
    }
    
}
