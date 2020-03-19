<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('email'))
            redirect('auth');
    }

    public function index() {
        $header['title'] = 'Absensi';
		$header['subtitle'] = 'List Data Pegawai';
		
		$this->load->view('_template/header', $header);
		$this->load->view('absensi/index');
		$this->load->view('_template/footer');
    }
}