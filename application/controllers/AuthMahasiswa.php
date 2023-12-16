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
        $user_id = $this->session->userdata('id');
        $mahasiswa_data = $this->AuthModel->get_mahasiswa_by_id($user_id);
        $data['mahasiswa'] = $mahasiswa_data;
        $data['result'] = $this->AuthModel->getJoinedData();

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
        if (!$this->session->userdata('id')) {
            redirect('AuthMahasiswa/index');
        }
    
        $this->load->model('AuthModel');
        $user_id = $this->session->userdata('id');
        $mahasiswa_data = $this->AuthModel->get_mahasiswa_by_id($user_id);
    
        // Validasi Form
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('asal_kampus', 'Asal Kampus', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required');
    
        // Jika ingin mengubah password, tambahkan validasi untuk password baru
        if ($this->input->post('password_baru') || $this->input->post('konfirmasi_password_baru')) {
            $this->form_validation->set_rules('password', 'Password Saat Ini', 'required');
            $this->form_validation->set_rules('password_baru', 'Password Baru', 'required');
            $this->form_validation->set_rules('konfirmasi_password_baru', 'Konfirmasi Password Baru', 'required|matches[password_baru]');
        }
    
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('mahasiswa/editprofil', $mahasiswa_data);
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'asal_kampus' => $this->input->post('asal_kampus'),
                'nim' => $this->input->post('nim'),
            );
    
            if ($this->input->post('password_baru')) {
                $data['password'] = password_hash($this->input->post('password_baru'), PASSWORD_DEFAULT);
            }
    
            if ($_FILES['foto']['name'] != '') {
                $config['upload_path'] = './Asset/foto_mahasiswa/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = 10048; // 2MB
    
                $this->load->library('upload', $config);
    
                if ($this->upload->do_upload('foto')) {
                    $upload_data = $this->upload->data();
                    $data['foto'] = $upload_data['file_name'];
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('AuthMahasiswa/edit_profil_mahasiswa');
                }
            }
    
            $this->AuthModel->update_mahasiswa($user_id, $data);
    
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