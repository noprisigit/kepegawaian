<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('JabatanModel');
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }
    
    public function index()
	{
        if ($this->session->userdata('status_access') != "admin") {
			redirect('home/user');
		}
		$header['title'] = 'Jabatan';
		$header['subtitle'] = 'List Jabatan';
        
        $content['title'] = 'Jabatan';
        $content['subtitle'] = 'List Jabatan';
        $content['list_jabatan'] = $this->JabatanModel->get_all_jabatan();
        $content['list_pegawai'] = $this->JabatanModel->get_pegawai_jabatan();
        $content['pegawais'] = $this->db->select('id_pegawai, nip_pegawai, nama_pegawai')->get('pegawai')->result_array();
        // dd($content['list_pegawai']);
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

    public function tambah_jabatan_pegawai() {
        $pegawai = $this->input->post('nama_pegawai');
        $jabatan = $this->input->post('jabatan_pegawai');
        $nomor_sk = $this->input->post('nomor_sk');
        $tgl_sk = $this->input->post('tanggal_sk');
        $file_sk = $_FILES['file_sk']['name'];

        $config['upload_path'] = "./assets/dist/files/sk_pegawai"; //path folder file upload
        $config['allowed_types'] = 'pdf|doc|zip'; //type file yang boleh di upload
        $config['encrypt_name'] = TRUE; //enkripsi file name upload
        $config['max_size'] = 5048;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_sk')) {
            $data = $this->upload->data(); //ambil file name yang diupload
        } else {
            $res['status'] = false;
            $res['msg'] = $this->upload->display_errors();
        }

        $res['status'] = true;
        $input = [
            'id_pegawai'    => $pegawai,
            'id_jabatan'    => $jabatan,
            'nomor_sk'      => $nomor_sk,
            'tanggal_sk'    => $tgl_sk,
            'file_sk'       => $data['file_name']
        ];

        $this->db->insert('master_jabatan', $input);
        echo json_encode($res);
    }

    public function store_jabatan_pegawai() {
        $pegawai = $this->input->post('id_pegawai');
        $jabatan = $this->input->post('jabatan_pegawai');
        $nomor_sk = $this->input->post('nomor_sk');
        $tgl_sk = $this->input->post('tanggal_sk');
        $file_sk = $_FILES['file_sk']['name'];

        $config['upload_path'] = "./assets/dist/files/sk_pegawai"; //path folder file upload
        $config['allowed_types'] = 'pdf|doc|zip'; //type file yang boleh di upload
        $config['encrypt_name'] = TRUE; //enkripsi file name upload
        $config['max_size'] = 5048;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_sk')) {
            $data = $this->upload->data(); //ambil file name yang diupload
        } else {
            $res['status'] = false;
            $res['msg'] = $this->upload->display_errors();
        }

        $res['status'] = true;
        $input = [
            'id_pegawai'    => $pegawai,
            'id_jabatan'    => $jabatan,
            'nomor_sk'      => $nomor_sk,
            'tanggal_sk'    => $tgl_sk,
            'file_sk'       => $data['file_name']
        ];

        $this->db->insert('master_jabatan', $input);
        echo json_encode($res);
    }

    public function get_list_jabatan() {
        $res['data_jabatan'] = $this->db->get_where('master_jabatan', ['id_pegawai' => $this->input->get('id_pegawai')])->row_array();
        $res['data'] = $this->db->get('jabatan')->result_array();
        echo json_encode($res);
    }
}