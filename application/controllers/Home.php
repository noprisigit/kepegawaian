<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		if (!$this->session->userdata('email')) {
			redirect('auth');
		}
		if ($this->session->userdata('status_access') != "admin") {
			redirect('home/user');
		}
		
		$header['title'] = 'Home';
		$header['subtitle'] = 'Dashboard';

		$content['jumlah_pegawai'] = $this->db->count_all_results('pegawai');
		$content['jumlah_jabatan'] = $this->db->count_all_results('jabatan');

		$this->load->view('_template/header', $header);
		$this->load->view('home/index', $content);
		$this->load->view('_template/footer');
	}

	public function user() {
		if (!$this->session->userdata('email')) {
			redirect('auth');
		}

		$header['title'] = 'Home';
		$header['subtitle'] = 'Dashboard';

		$content['jumlah_pegawai'] = $this->db->count_all_results('pegawai');
		$content['jumlah_jabatan'] = $this->db->count_all_results('jabatan');

		$this->load->view('_template/header', $header);
		$this->load->view('home/index', $content);
		$this->load->view('_template/footer');
	}
}