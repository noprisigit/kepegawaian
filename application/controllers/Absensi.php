<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('username'))
            redirect('auth');
    }

    public function index() {
        if ($this->session->userdata('status_access') != "admin") {
			redirect('home/user');
		}
        $header['title'] = 'Absensi';
		$header['subtitle'] = 'Rekapitulasi Absensi';
        
        $content['pegawai'] = $this->db->get('pegawai')->result_array();
        
		$this->load->view('_template/header', $header);
		$this->load->view('absensi/index', $content);
		$this->load->view('_template/footer');
    }

    public function get_by_date() {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $date = $tahun."-".$bulan."-".$tanggal;
        // dd($date);
        // dd($date);
        $data = $this->db->query('
            SELECT nama_pegawai, status_absensi, keterangan_absensi, tgl_absensi
            from absensi inner join pegawai on absensi.id_pegawai = pegawai.id_pegawai 
            where date(tgl_absensi) = "'. $date .'"
        ')->result_array();
        // dd($data);
        echo json_encode($data);
    }

    public function get_by_name() {
        $nama = $this->input->post('id_pegawai');
        // dd($nama);

        $data = $this->db->query('
            SELECT nama_pegawai, status_absensi, keterangan_absensi, tgl_absensi
            from absensi inner join pegawai on absensi.id_pegawai = pegawai.id_pegawai 
            where absensi.id_pegawai = '. $nama .'
        ')->result_array();
        // dd($data);
        echo json_encode($data);
    }
}