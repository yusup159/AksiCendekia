<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('mainpage');
    }
    public function profil()
    {
        $this->load->view('profil');
    }
    public function portal_berita()
    {
        $this->load->view('portal');
    }
    public function FAQ()
    {
        $this->load->view('faq');
    }
    public function option()
    {
        $this->load->view('option');
    }
}