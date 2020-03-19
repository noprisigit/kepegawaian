<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('JabatanModel');
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }
    
    public function index()
	{
		$header['title'] = 'Jabatan';
		$header['subtitle'] = 'List Jabatan';
        
        $content['title'] = 'Jabatan';
        $content['subtitle'] = 'List Jabatan';
        $content['list_jabatan'] = $this->JabatanModel->get_all_jabatan();
		
		$this->load->view('_template/header', $header);
		$this->load->view('jabatan/index', $content);
		$this->load->view('_template/footer');
    }

    public function add() {
        $this->db->insert('jabatan', ['nama_jabatan' => htmlspecialchars($this->input->post('nama_jabatan'))]);
        $this->session->set_flashdata('message', 'Ditambahkan');
        redirect('jabatan');
    }

    public function edit() {
        $this->db->set('nama_jabatan', $this->input->post('nama_jabatan'));
        $this->db->where('id_jabatan', $this->input->post('id_jabatan'));
        $this->db->update('jabatan');
        $this->session->set_flashdata('message', 'Diubah');
        redirect('jabatan');
    }
    
    public function delete($id) {
        $this->db->delete('jabatan', ['id_jabatan' => $id]);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('jabatan');
    }
}