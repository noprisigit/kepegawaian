<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('email'))
            redirect('auth');

        $this->load->model('UserModel');
    }

    public function index() {
        $header['title'] = 'Users';
        $header['subtitle'] = 'List Users';

        $content['users'] = $this->db->get('users')->result_array();
        
        $this->load->view('_template/header', $header);
		$this->load->view('users/index', $content);
		$this->load->view('_template/footer');
    }

    public function verify($id) {
        $this->db->set('status_account', 1);
        $this->db->where('id', $id);
        $this->db->update('users');

        $this->session->set_flashdata('message', 'Diverifikasi');
        redirect('users');
    }

    public function edit_user () {
        date_default_timezone_set('asia/jakarta');

        $this->db->set('nama', $this->input->post('nama'));
        $this->db->set('email', $this->input->post('email'));
        $this->db->set('status_access', $this->input->post('status_akses'));
        $this->db->set('status_account', $this->input->post('status_akun'));
        $this->db->set('date_updated', date('Y-m-d H:i:s'));
        $this->db->where('id', $this->input->post('id_user'));
        $this->db->update('users');

        $this->session->set_flashdata('message', 'Diperbaharui');
        redirect('users');
    }

    public function block_user($id) {
        $this->db->set('status_account', 0);
        $this->db->where('id', $id);
        $this->db->update('users');

        $this->session->set_flashdata('message', 'Diblock');
        redirect('users');
    }

    public function data_diri() {
        $header['title'] = 'Users';
        $header['subtitle'] = 'Data Diri';

        $content['pegawai'] = $this->UserModel->get_data_diri($this->session->userdata('id_user'));
        // dd($content['pegawai']);

        $this->load->view('_template/header', $header);
		$this->load->view('users/data-diri', $content);
		$this->load->view('_template/footer');
    }
}