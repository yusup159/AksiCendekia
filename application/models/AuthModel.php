

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
        $this->db->where('pengajuan.status', 'Di terima');
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
        $this->db->where('id_penggalangan', $id);
        $query = $this->db->get('penggalangan_dana');
        return $query->row(); 
    }
    public function deletePenggalangan($id) {
        $this->db->where('id_penggalangan', $id);
        $this->db->delete('penggalangan_dana');
    }
    
    public function tambahDataPenggalangan($data) {
        $this->db->insert('penggalangan_dana', $data);
    }
    public function get_data_penggalangan($id_penggalangan) {
        $this->db->select('penggalangan_dana.*, pengajuan.*');
        $this->db->from('penggalangan_dana');
        $this->db->join('pengajuan', 'penggalangan_dana.id_pengajuan = pengajuan.id');
        $this->db->where('penggalangan_dana.id_penggalangan', $id_penggalangan);
        
        $query = $this->db->get();
        return $query->result();
    }
    public function getJoinedData() {
        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->join('penggalangan_dana', 'pengajuan.id = penggalangan_dana.id_pengajuan');
        $query = $this->db->get();
        return $query->result();
    }


    //TRANSAKSI
    public function get_data_by_mahasiswa_id($mahasiswa_id) {
        $this->db->select('penggalangan_dana.*, transaksi.*');
        $this->db->from('penggalangan_dana');
        $this->db->join('transaksi', 'penggalangan_dana.id_penggalangan = transaksi.id_penggalangan');
        $this->db->where('transaksi.id_mahasiswa', $mahasiswa_id);

        $query = $this->db->get();
        return $query->result();
    }
    public function get_alluser_id_by_mahasiswa_id($mahasiswa_id) {
        $this->db->select('email');
        $this->db->from('mahasiswa');
        $this->db->where('id', $mahasiswa_id);
        $query_mahasiswa = $this->db->get();

        if ($query_mahasiswa->num_rows() > 0) {
            $mahasiswa_data = $query_mahasiswa->row();
            $email_mahasiswa = $mahasiswa_data->email;

            $this->db->select('id_alluser');
            $this->db->from('alluser');
            $this->db->where('email', $email_mahasiswa);
            $query_alluser = $this->db->get();

            if ($query_alluser->num_rows() > 0) {
                $alluser_data = $query_alluser->row();
                $alluser_id = $alluser_data->id_alluser;

                return $alluser_id;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
    public function get_transaction_data_by_mahasiswa_id($mahasiswa_id) {
        // Langkah 1: Dapatkan email dari tabel mahasiswa berdasarkan ID mahasiswa
        $this->db->select('email');
        $this->db->from('mahasiswa');
        $this->db->where('id', $mahasiswa_id);
        $query_mahasiswa = $this->db->get();

        // Periksa apakah query berhasil dan hasilnya tidak kosong
        if ($query_mahasiswa->num_rows() > 0) {
            $mahasiswa_data = $query_mahasiswa->row();
            $email_mahasiswa = $mahasiswa_data->email;

            // Langkah 2: Gunakan email untuk mencari ID alluser dari tabel alluser
            $this->db->select('id_alluser');
            $this->db->from('alluser');
            $this->db->where('email', $email_mahasiswa);
            $query_alluser = $this->db->get();

            // Periksa apakah query berhasil dan hasilnya tidak kosong
            if ($query_alluser->num_rows() > 0) {
                $alluser_data = $query_alluser->row();
                $alluser_id = $alluser_data->id_alluser;

                // Langkah 3: Gunakan ID alluser untuk mencari data transaksi yang di-join dengan data penggalangan dana
                $this->db->select('*');
                $this->db->from('transaksi');
                $this->db->join('penggalangan_dana', 'transaksi.id_penggalangan = penggalangan_dana.id_penggalangan');
                $this->db->where('transaksi.id_alluser', $alluser_id);
                $query_transaksi = $this->db->get();

                // Periksa apakah query berhasil
                if ($query_transaksi->num_rows() > 0) {
                    return $query_transaksi->result();
                } else {
                    // Jika tidak ada hasil dari query transaksi
                    return null;
                }
            } else {
                // Jika tidak ada hasil dari query alluser
                return null;
            }
        } else {
            // Jika tidak ada hasil dari query mahasiswa
            return null;
        }
    }
}
