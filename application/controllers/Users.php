<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('email'))
            redirect('auth');
    }

    public function index() {
        $header['title'] = 'Users';
        $header['subtitle'] = 'List Users';

        $content['users'] = $this->db->get('users')->result_array();
        
        $this->load->view('_template/header', $header);
		$this->load->view('users/index', $content);
		$this->load->view('_template/footer');
    }
}