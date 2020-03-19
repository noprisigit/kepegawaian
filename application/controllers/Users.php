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

    public function update_data_diri() {
        $this->form_validation->set_rules('nip_pegawai', 'NIP Pegawai', 'trim|required', ['required' => 'NIP Pegawai Harus Diisi']);
		$this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'trim|required', ['required' => 'Nama Pegawai Harus Diisi']);
		$this->form_validation->set_rules('tmpt_lahir_pegawai', 'Tempat Lahir Pegawai', 'trim|required', ['required' => 'Tempat Lahir Pegawai Harus Diisi']);
		$this->form_validation->set_rules('tgl_lahir_pegawai', 'Tanggal Lahir Pegawai', 'trim|required', ['required' => 'Tanggal Lahir Pegawai Harus Dipilih']);
		$this->form_validation->set_rules('jns_kelamin_pegawai', 'Jenis Kelamin Pegawai', 'trim|required', ['required' => 'Jenis Kelamin Pegawai Harus Dipilih']);
		$this->form_validation->set_rules('status_pernikahan_pegawai', 'Status Pernikahan Pegawai', 'trim|required', ['required' => 'Status Pernikahan Pegawai Harus Dipilih']);
		$this->form_validation->set_rules('no_hp_pegawai', 'No Handphone Pegawai', 'trim|required', ['required' => 'No Handphone Pegawai Harus Diisi']);
		$this->form_validation->set_rules('jabatan_pegawai', 'Jabatan Pegawai', 'trim|required', ['required' => 'Jabatan Pegawai Tidak Harus Dipilih']);
		$this->form_validation->set_rules('email_pegawai', 'Email Pegawai', 'trim|required', ['required' => 'Email Pegawai Harus Diisi']);
		$this->form_validation->set_rules('tgl_masuk_pegawai', 'Tanggal Masuk Pegawai', 'trim|required', ['required' => 'Tanggal Masuk Pegawai Harus Dipilih']);
		$this->form_validation->set_rules('status_pegawai', 'Status Pegawai', 'trim|required', ['required' => 'Status Pegawai Harus Dipilih']);
		$this->form_validation->set_rules('agama_pegawai', 'Agama Pegawai', 'trim|required', ['required' => 'Agama Pegawai Harus Dipilih']);
		$this->form_validation->set_rules('pend_terakhir_pegawai', 'Pendidikan Terakhir Pegawai', 'trim|required', ['required' => 'Pendidikan Terakhir Harus Dipilih']);
		$this->form_validation->set_rules('alamat_pegawai', 'Alamat Pegawai', 'trim|required', ['required' => 'Alamat Pegawai Harus Diisi']);

        if ($this->form_validation->run() == false) {
            $header['title'] = 'Users';
            $header['subtitle'] = 'Data Diri';
    
            $content['pegawai'] = $this->UserModel->get_data_diri($this->session->userdata('id_user'));
            $content['jabatan'] = $this->db->get('jabatan')->result_array();
            // dd($content['pegawai']);
    
            $this->load->view('_template/header', $header);
            $this->load->view('users/update-data-diri', $content);
            $this->load->view('_template/footer');
        } else {
            $image = $_FILES['foto_pegawai']['name'];

            $tgl_lahir_pegawai = date_create($this->input->post('tgl_lahir_pegawai'));
			$tgl_lahir_pegawai = date_format($tgl_lahir_pegawai, 'Y-m-d');

			$tgl_masuk_pegawai = date_create($this->input->post('tgl_masuk_pegawai'));
			$tgl_masuk_pegawai = date_format($tgl_masuk_pegawai, 'Y-m-d');

            if ($image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 2048;
                $config['upload_path'] = './assets/dist/img/profile/';

                $this->load->library('upload', $config);

                $data = $this->db->get_where('pegawai', ['id_user' => $this->session->userdata('id_user')])->row_array();
                // dd($data);
                if($this->upload->do_upload('foto_pegawai')){
                    $old_image = $data['foto_pegawai'];
                    if($old_image != "default.png"){
                        unlink(FCPATH . 'assets/dist/img/profile/' . $old_image);
                    }
                    $image = $this->upload->data('file_name');
                    $this->db->set('foto_pegawai', $image);
                }else{
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('nip_pegawai', htmlspecialchars($this->input->post('nip_pegawai'), true));
			$this->db->set('nama_pegawai', htmlspecialchars($this->input->post('nama_pegawai'), true));
			$this->db->set('tmpt_lahir_pegawai', htmlspecialchars($this->input->post('tmpt_lahir_pegawai'), true));
			$this->db->set('tgl_lahir_pegawai', $tgl_lahir_pegawai);
			$this->db->set('jns_kelamin_pegawai', htmlspecialchars($this->input->post('jns_kelamin_pegawai'), true));
			$this->db->set('status_pernikahan_pegawai', htmlspecialchars($this->input->post('status_pernikahan_pegawai'), true));
			$this->db->set('agama_pegawai', htmlspecialchars($this->input->post('agama_pegawai'), true));
			$this->db->set('alamat_pegawai', htmlspecialchars($this->input->post('alamat_pegawai'), true));
			$this->db->set('id_jabatan_pegawai', htmlspecialchars($this->input->post('jabatan_pegawai'), true));
			$this->db->set('email_pegawai', htmlspecialchars($this->input->post('email_pegawai'), true));
			$this->db->set('no_hp_pegawai', htmlspecialchars($this->input->post('no_hp_pegawai'), true));
			$this->db->set('tgl_masuk_pegawai', $tgl_masuk_pegawai);
			$this->db->set('status_pegawai', htmlspecialchars($this->input->post('status_pegawai'), true));
			$this->db->set('pend_terakhir_pegawai', htmlspecialchars($this->input->post('pend_terakhir_pegawai'), true));
            $this->db->where('id_pegawai', $this->input->post('id_pegawai'));
            $this->db->update('pegawai');

            $this->session->set_flashdata('message', 'Diperbaharui');
			redirect('users/data-diri');
        }
    }

    public function absensi() {
        $this->form_validation->set_rules('status_absensi', 'Status absensi', 'trim|required', [
            'required'  =>  '%s harus diisi'
        ]);
        $this->form_validation->set_rules('keterangan_absensi', 'Keterangan absensi', 'trim|required', [
            'required'  =>  '%s harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $header['title'] = 'Absensi';
            $header['subtitle'] = 'Absensi Diri';

            $pegawai = $this->db->get_where('pegawai', ['id_user' => $this->session->userdata('id_user')])->row_array();
            $content['absensi'] = $this->db->query('SELECT COUNT(*) as total FROM absensi WHERE id_pegawai = '. $pegawai['id_pegawai'] .' and date(tgl_absensi) = CURDATE()')->row_array();
            // dd($absensi);
            $this->load->view('_template/header', $header);
            $this->load->view('users/absensi', $content);
            $this->load->view('_template/footer');
        } else {
            $pegawai = $this->db->get_where('pegawai', ['id_user' => $this->session->userdata('id_user')])->row_array();
            
            date_default_timezone_set('Asia/Jakarta');

            $absensi = [
                'id_pegawai'            => $pegawai['id_pegawai'],
                'status_absensi'        => $this->input->post('status_absensi'),
                'keterangan_absensi'    => $this->input->post('keterangan_absensi'),
                'tgl_absensi'           => date('Y-m-d H:i:s')
            ];

            $this->db->insert('absensi', $absensi);
            $this->session->set_flashdata('message', 'Ditambahkan');
			redirect('users/absensi');
        }
    }

    public function upload_dokumen() {
        
    }
}