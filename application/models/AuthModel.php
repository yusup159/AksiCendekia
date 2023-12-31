

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
    public function getMahasiswaById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('mahasiswa');
        return $query->row(); 
    }
    public function getMahasiswaData() {
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get('mahasiswa');
        return $query->result();
    }
    
    public function edit_profil($username, $email, $asal_kampus, $nim, $foto) {
        $data = array(
            'username' => $username,
            'email' => $email,
            'asal_kampus' => $asal_kampus,
            'nim' => $nim,
            'foto' => $foto
        );

        
        $this->db->where('id', $this->session->userdata('id'));
        $this->db->update('mahasiswa', $data);
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
    public function edit_profil_donatur($username, $email, $nama, $alamat, $foto) {
        $data = array(
            'username' => $username,
            'email' => $email,
            'nama' => $nama,
            'alamat' => $alamat,
            'foto' => $foto
        );

        
        $this->db->where('id', $this->session->userdata('id'));
        $this->db->update('donatur', $data);
    }
    
    public function getDonaturData() {
        $this->db->order_by('created_at', 'DESC');
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
        $this->db->order_by('created_at', 'DESC');
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
        $this->db->order_by('created_at', 'DESC');
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
    public function getJoinedData($limit, $start) {
        $this->db->select('pengajuan.*, penggalangan_dana.*'); 
        $this->db->from('pengajuan');
        $this->db->join('penggalangan_dana', 'pengajuan.id = penggalangan_dana.id_pengajuan');
        $this->db->order_by('penggalangan_dana.created_at', 'DESC'); 
        $this->db->limit($limit, $start);
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    
    public function countPenggalangan(){
        return $this->db->get('penggalangan_dana')->num_rows();
    }
    public function searchData($query) {
        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->join('penggalangan_dana', 'pengajuan.id = penggalangan_dana.id_pengajuan');
        $this->db->like('judul', $query); 
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
    public function getFullData() {
        $this->db->select('pd.*, t.*, m.*');
        $this->db->from('alluser AS au');
        $this->db->join('penggalangan_dana AS pd', 'au.id_alluser = pd.id_pengajuan');
        $this->db->join('transaksi AS t', 'au.id_alluser = t.id_alluser');
        $this->db->join('mahasiswa AS m', 'au.id_mahasiswa = m.id');
        $this->db->order_by('t.created_at', 'DESC'); 
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getFullDataDonatur() {
        $this->db->select('pd.*, t.*, d.*');
        $this->db->from('alluser AS au');
        $this->db->join('penggalangan_dana AS pd', 'au.id_alluser = pd.id_pengajuan');
        $this->db->join('transaksi AS t', 'au.id_alluser = t.id_alluser');
        $this->db->join('donatur AS d', 'au.id_donatur = d.id');
        $this->db->order_by('t.created_at', 'DESC'); 
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_alluser_id_by_donatur_id($donatur_id) {
        $this->db->select('email');
        $this->db->from('donatur');
        $this->db->where('id', $donatur_id);
        $query_donatur = $this->db->get();

        if ($query_donatur->num_rows() > 0) {
            $donatur_data = $query_donatur->row();
            $email_donatur = $donatur_data->email;

            $this->db->select('id_alluser');
            $this->db->from('alluser');
            $this->db->where('email', $email_donatur);
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

                
                $this->db->select('*');
                $this->db->from('transaksi');
                $this->db->join('penggalangan_dana', 'transaksi.id_penggalangan = penggalangan_dana.id_penggalangan');
                $this->db->where('transaksi.id_alluser', $alluser_id);
                $this->db->order_by('transaksi.created_at', 'DESC'); 
                $query_transaksi = $this->db->get();

                
                if ($query_transaksi->num_rows() > 0) {
                    return $query_transaksi->result();
                } else {
                   
                    return null;
                }
            } else {
                
                return null;
            }
        } else {
           
            return null;
        }
    }
    
    public function get_transaction_data_by_donatur_id($donatur_id) {
        $this->db->select('email');
        $this->db->from('donatur');
        $this->db->where('id', $donatur_id);
        $query_donatur = $this->db->get();

        if ($query_donatur->num_rows() > 0) {
            $donatur_data = $query_donatur->row();
            $email_donatur = $donatur_data->email;

            $this->db->select('id_alluser');
            $this->db->from('alluser');
            $this->db->where('email', $email_donatur);
            $query_alluser = $this->db->get();

            if ($query_alluser->num_rows() > 0) {
                $alluser_data = $query_alluser->row();
                $alluser_id = $alluser_data->id_alluser;

                $this->db->select('*');
                $this->db->from('transaksi');
                $this->db->join('penggalangan_dana', 'transaksi.id_penggalangan = penggalangan_dana.id_penggalangan');
                $this->db->where('transaksi.id_alluser', $alluser_id);
                $this->db->order_by('transaksi.created_at', 'DESC'); 
                $query_transaksi = $this->db->get();

                if ($query_transaksi->num_rows() > 0) {
                    return $query_transaksi->result();
                } else {
                    return null;
                }
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
}
