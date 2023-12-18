<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthMahasiswa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->library('form_validation');
        $this->load->helper(array('url','download'));
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
        $mahasiswa_data = $this->AuthModel->get_mahasiswa_by_id($user_id);
        $data['mahasiswa'] = $mahasiswa_data;
        $data['start'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['result'] = $this->AuthModel->getJoinedData($config['per_page'], $data['start']);

        $this->pagination->initialize($config);
		$this->load->view('mahasiswa/template/dashboard',$data);
	}


    public function search() {
        $query = $this->input->get('query');
        $user_id = $this->session->userdata('id');
        $mahasiswa_data = $this->AuthModel->get_mahasiswa_by_id($user_id);
        $data['mahasiswa'] = $mahasiswa_data;
        $data['result'] = $this->AuthModel->searchData($query);
        $this->load->view('mahasiswa/search', $data);
    }
     
        
       
    


    public function profil_mahasiswa(){
        if (!$this->session->userdata('id')) {
            redirect('AuthMahasiswa/index');
        }
        $user_id = $this->session->userdata('id');
        $mahasiswa_data = $this->AuthModel->get_mahasiswa_by_id($user_id);
        $data['mahasiswa'] = $mahasiswa_data;
        $this->load->view('mahasiswa/profil',$data);
    }


    public function edit_profil_mahasiswa(){
        if (!$this->session->userdata('id')) {
            redirect('AuthMahasiswa/index');
        }
        $id = $this->session->userdata('id');
        $data['mahasiswa'] = $this->AuthModel->getMahasiswaById($id);
        $this->load->view('mahasiswa/editprofil',$data);
    }

    public function edit_profil_mhs() {
        // Lakukan validasi form jika diperlukan
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('asal_kampus', 'Asal Universitas', 'required');
        $this->form_validation->set_rules('nim', 'Nomor Induk Mahasiswa', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan kembali form dengan error
            $this->load->view('mahasiswa/edit_profil_mahasiswa');
        } else {
            // Ambil data dari form
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $asal_kampus = $this->input->post('asal_kampus');
            $nim = $this->input->post('nim');

            // Upload foto jika ada
            $config['upload_path'] = './Asset/foto_mahasiswa/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 10048; // 2MB max size

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data('file_name');
            } else {
                $foto = $this->input->post('foto_lama'); // Jika foto tidak diupload, gunakan foto lama
            }

            // Panggil model untuk menyimpan perubahan
            $this->AuthModel->edit_profil($username, $email, $asal_kampus, $nim, $foto);

            // Redirect atau tampilkan pesan sukses
            redirect('AuthMahasiswa/profil_mahasiswa');
        }
    }
    


    public function histori_donasi(){
        if (!$this->session->userdata('id')) {
            redirect('AuthMahasiswa/index');
        }
        $id_mahasiswa = $this->session->userdata('id');
        $result = $this->AuthModel->get_transaction_data_by_mahasiswa_id($id_mahasiswa);
        $data['result'] = $result;
        $this->load->view('mahasiswa/historidonasi',$data);
    }


    public function histori_penggalangan(){
        if (!$this->session->userdata('id')) {
            redirect('AuthMahasiswa/index');
        }
        $id_mahasiswa = $this->session->userdata('id');
        $data['pengajuan'] = $this->AuthModel->getPengajuanByIdMahasiswa($id_mahasiswa);
        $this->load->view('mahasiswa/historipenggalangan', $data);
    }


    public function detail_donasi($id_penggalangan){
        if (!$this->session->userdata('id')) {
            redirect('AuthMahasiswa/index');
        }
        $user_id = $this->session->userdata('id');
        $mahasiswa_data = $this->AuthModel->get_mahasiswa_by_id($user_id);
        $data['mahasiswa'] = $mahasiswa_data;
        $data['dana'] = $this->AuthModel->get_data_penggalangan($id_penggalangan);
        $this->load->view('mahasiswa/detaildonasi',$data);
    }
    


    public function galangdana($id_penggalangan){
        if (!$this->session->userdata('id')) {
            redirect('AuthMahasiswa/index');
        }
        $user_id = $this->session->userdata('id');
        
        $alluser_id = $this->AuthModel->get_alluser_id_by_mahasiswa_id($user_id);
        $data['alluser_id'] = $alluser_id;
        $data['danadonasi'] = $this->AuthModel->get_data_penggalangan($id_penggalangan);
        $this->load->view('mahasiswa/galangdana',$data);
    }


    public function pembayaran(){
        if (!$this->session->userdata('id')) {
            redirect('AuthMahasiswa/index');
        }
        $this->load->view('mahasiswa/pembayaran');
    }
    public function penggalangan(){
        if (!$this->session->userdata('id')) {
            redirect('AuthMahasiswa/index');
        }
        $this->load->view('mahasiswa/penggalangan');
    }
    public function ajukanpenggalangan(){
        if (!$this->session->userdata('id')) {
            redirect('AuthMahasiswa/index');
        }
        $this->load->view('mahasiswa/ajukanpenggalangan');
    }
    public function inputpengajuan() {
        $data['nama_kegiatan'] = $this->input->post('namakegiatan');
        $data['deskripsi'] = $this->input->post('deskripsi');
        $data['UKM'] = $this->input->post('ukm');
        $data['Donasi'] = $this->input->post('donasi');
        $data['tanggal'] = $this->input->post('tanggal');
    
        $config['upload_path'] = './dokumen_pengajuan/';
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['encrypt_name'] = TRUE; 
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
    
        if ($this->upload->do_upload('dokumen')) {
            $data['dokumen'] = $this->upload->data('file_name');
        } else {
        }
        $config['upload_path'] = './foto1_pengajuan/';
        $config['allowed_types'] = 'jpg|png';
        $config['encrypt_name'] = TRUE; 
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('foto1')) {
            $data['foto1'] = $this->upload->data('file_name');
        } else {
        }
        $config['upload_path'] = './foto2_pengajuan/';
        $config['allowed_types'] = 'jpg|png';
        $config['encrypt_name'] = TRUE; 
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('foto2')) {
            $data['foto2'] = $this->upload->data('file_name');
        } else {
        }
        $config['upload_path'] = './foto3_pengajuan/';
        $config['allowed_types'] = 'jpg|png';
        $config['file_name'] = 'foto3';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('foto3')) {
            $data['foto3'] = $this->upload->data('file_name');
        } else {
            // Handle error
        }
    
        
        $data['status'] = 'Di periksa';
        $data['id_mahasiswa'] = $this->session->userdata('id'); 
    
        $this->AuthModel->inputPengajuan($data);
    
        redirect('AuthMahasiswa/histori_penggalangan'); 
    }
    public function downloadFile() {
        $this->load->helper('download');
        
        $data = file_get_contents('Template_surat/dokumen.pdf');
        force_download( $data);
    }
    

    
}