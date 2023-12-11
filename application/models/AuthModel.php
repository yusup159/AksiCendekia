

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {

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
    public function getMahasiswaData() {
        $query = $this->db->get('mahasiswa');
        return $query->result();
    }
}
