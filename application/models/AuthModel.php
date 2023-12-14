

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {


    //ADMIN

    public function register_user($data)
    {
        $this->db->insert('alluser', $data);
    }

    public function login_user($email, $password)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('alluser');

        if ($query->num_rows() > 0) {
            $user = $query->row();
            if (password_verify($password, $user->password)) {
                return $user;
            }
        }

        return false;
    }
    public function delete($tabel, $id, $val){
        $this->db->delete($tabel, array($id => $val));
    }


    //MAHASISWA


    public function register_mahasiswa($data)
    {
        $this->db->insert('mahasiswa', $data);
    }

    public function login_mahasiswa($email, $password)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('mahasiswa');

        if ($query->num_rows() > 0) {
            $user = $query->row();
            if (password_verify($password, $user->password)) {
                return $user;
            }
        }

        return false;
    }
    public function get_mahasiswa_by_id($user_id) {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->where('id', $user_id);
        $query = $this->db->get();

        return $query->row(); 
    }
    public function update_mahasiswa($user_id, $data) {
        $this->db->where('id', $user_id);
        $this->db->update('mahasiswa', $data);
    }
    public function getMahasiswaData() {
        $query = $this->db->get('mahasiswa');
        return $query->result();
    }
   
    
    




    //DONATUR
    public function register_donatur($data)
    {
        $this->db->insert('donatur', $data);
    }
    public function login_donatur($email, $password)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('donatur');

        if ($query->num_rows() > 0) {
            $user = $query->row();
            if (password_verify($password, $user->password)) {
                return $user;
            }
        }

        return false;
    }
    public function getDonaturData() {
        $query = $this->db->get('donatur');
        return $query->result();
    }
    public function get_donatur_by_id($user_id) {
        $this->db->select('*');
        $this->db->from('donatur');
        $this->db->where('id', $user_id);
        $query = $this->db->get();

        return $query->row(); 
    }
    public function update_donatur($user_id, $data) {
        $this->db->where('id', $user_id);
        $this->db->update('mahasiswa', $data);
    }
  

    //PENGAJUAN

    public function inputPengajuan($data) {
        $this->db->insert('pengajuan', $data); 
    }
    public function getPengajuanByIdMahasiswa($id_mahasiswa) {
        $this->db->where('id_mahasiswa', $id_mahasiswa);
        $query = $this->db->get('pengajuan');
        return $query->result();
    }
    public function getPengajuanData() {
        $query = $this->db->get('pengajuan');
        return $query->result();
    }
    public function getPengajuanById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('pengajuan');
        return $query->row(); 
    }
    public function deletePengajuan($id) {
        $this->db->where('id', $id);
        $this->db->delete('pengajuan');
    }

    public function getPengajuanBelumTerdaftar() {
        $this->db->select('pengajuan.*');
        $this->db->from('pengajuan');
        $this->db->join('penggalangan_dana', 'pengajuan.id = penggalangan_dana.id_pengajuan', 'left');
        $this->db->where('penggalangan_dana.id_pengajuan IS NULL', null, false);
        $query = $this->db->get();
        return $query->result();
    }
    
    


    //Penggalangan
    public function inputPenggalangan($data) {
        $this->db->insert('penggalangan_dana', $data); 
    }
    public function getPengajuanByIdPengajuan($id_mahasiswa) {
        $this->db->where('id_mahasiswa', $id_mahasiswa);
        $query = $this->db->get('penggalangan_dana');
        return $query->result();
    }
    public function getPenggalanganData() {
        $query = $this->db->get('penggalangan_dana');
        return $query->result();
    }
    public function getPenggalanganById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('penggalangan_dana');
        return $query->row(); 
    }
    public function deletePenggalangan($id) {
        $this->db->where('id', $id);
        $this->db->delete('penggalangan_dana');
    }
    
    public function tambahDataPenggalangan($data) {
        $this->db->insert('penggalangan_dana', $data);
    }
}
