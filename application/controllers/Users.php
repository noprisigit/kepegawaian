<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');

        if (!$this->session->userdata('username'))
            redirect('auth');

        $this->load->model('UserModel');
    }

    public function index() {
        if ($this->session->userdata('status_access') != "admin") {
			redirect('home/user');
		}
        $header['title'] = 'Users';
        $header['subtitle'] = 'List Users';

        $content['users'] = $this->db->get_where('users', ['status_access' => 'admin'])->result_array();
        
        $this->load->view('_template/header', $header);
		$this->load->view('users/index', $content);
		$this->load->view('_template/footer');
    }

    public function users_pegawai() {
        if ($this->session->userdata('status_access') != "admin") {
			redirect('home/user');
        }
        
        $header['title'] = 'Users';
        $header['subtitle'] = 'List Users Pegawai';

        $content['users_pegawai'] = $this->db->get_where('users', ['status_access' => 'pegawai'])->result_array();
        $this->load->view('_template/header', $header);
		$this->load->view('users/users_pegawai', $content);
		$this->load->view('_template/footer');
    }

    public function verify($id) {
        $user = $this->db->select('username, status_access')->get_where('users', ['id' => $id])->row_array();
        $this->db->set('status_account', 1);
        $this->db->set('date_updated', date('Y-m-d H:i:s'));
        $this->db->where('id', $id);
        $this->db->update('users');

        $this->session->set_flashdata('message', 'Username <strong><u>' . $user['username'] . '</u></strong> telah <strong><u>diaktifkan</u></strong>');
        if ($user['status_access'] == "admin") {
            redirect('users');
        } else {
            redirect('users/users-pegawai');
        }
    }

    public function store_user() {
        $username = $this->input->post('username');
        $nama = $this->input->post('nama');
        $pass = $this->input->post('pass');

        $input = [
            'nama'              => $nama,
            'username'          => $username,
            'password'          => password_hash($pass, PASSWORD_DEFAULT),
            'status_access'     => "admin",
            'status_account'    => 1,
            'date_created'      => date('Y-m-d H:i:s'),
            'date_updated'      => date('Y-m-d H:i:s')
        ];

        $this->db->insert('users', $input);
        $res['status'] = true;
        echo json_encode($res);
    }

    public function edit_user () {
        date_default_timezone_set('asia/jakarta');

        $this->db->set('nama', $this->input->post('nama'));
        $this->db->set('password', password_hash($this->input->post('pass'), PASSWORD_DEFAULT));
        $this->db->set('date_updated', date('Y-m-d H:i:s'));
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('users');

        $res['status'] = true;
        echo json_encode($res);
        // $this->session->set_flashdata('message', 'Diperbaharui');
        // redirect('users');
    }

    public function delete_user() {
        $id_user = $this->uri->segment(3);
        
        $this->db->delete('users', ['id' => $id_user]);
        $this->session->set_flashdata('message', 'Dihapus');
        redirect('users');
    }

    public function block_user($id) {
        
        $user = $this->db->select('username, status_access')->get_where('users', ['id' => $id])->row_array();
        $this->db->set('status_account', 0);
        $this->db->set('date_updated', date('Y-m-d H:i:s'));
        $this->db->where('id', $id);
        $this->db->update('users');

        $this->session->set_flashdata('message', 'Username <strong><u>' . $user['username'] . '</u></strong> telah <strong><u>dinonaktifkan</u></strong>');
        if ($user['status_access'] == "admin") {
            redirect('users');
        } else {
            redirect('users/users-pegawai');
        }
    }

    public function data_diri() {
        $header['title'] = 'Users';
        $header['subtitle'] = 'Profile';

        // dd($this->session->userdata('id_user'));
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
		$this->form_validation->set_rules('email_pegawai', 'Email Pegawai', 'trim|required', ['required' => 'Email Pegawai Harus Diisi']);
		$this->form_validation->set_rules('tgl_masuk_pegawai', 'Tanggal Masuk Pegawai', 'trim|required', ['required' => 'Tanggal Masuk Pegawai Harus Dipilih']);
		// $this->form_validation->set_rules('status_pegawai', 'Status Pegawai', 'trim|required', ['required' => 'Status Pegawai Harus Dipilih']);
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

    public function edit_biodata() {
        $id_pegawai = htmlspecialchars($this->input->post('id_pegawai'), true);
        $image = $_FILES['foto_pegawai']['name'];
        $nip = htmlspecialchars($this->input->post('nip_pegawai'), true);
        $nama = htmlspecialchars($this->input->post('nama_pegawai'), true);
        $tmpt_lahir = htmlspecialchars($this->input->post('tmpt_lahir_pegawai'), true);
        $tgl_lahir = htmlspecialchars($this->input->post('tgl_lahir_pegawai'), true);
        $jns_kelamin = htmlspecialchars($this->input->post('jns_kelamin_pegawai'), true);
        $status_nikah = htmlspecialchars($this->input->post('status_pernikahan_pegawai'), true);
        $no_hp = htmlspecialchars($this->input->post('no_hp_pegawai'), true);
        $email = htmlspecialchars($this->input->post('email_pegawai'), true);
        $agama = htmlspecialchars($this->input->post('agama_pegawai'), true);
        $pend_terakhir = htmlspecialchars($this->input->post('pend_terakhir_pegawai'), true);
        $alamat = htmlspecialchars($this->input->post('alamat_pegawai'), true);
        
        $pegawai = $this->db->select('foto_pegawai')->get_where('pegawai', ['id_pegawai' => $id_pegawai, 'nip_pegawai' => $nip])->row_array();
        if ($image != "") {
            $config['upload_path'] = "./assets/dist/img/profile"; //path folder file upload
            $config['allowed_types'] = 'gif|jpg|jpeg|png'; //type file yang boleh di upload
            $config['encrypt_name'] = TRUE; //enkripsi file name upload
            $config['max_size'] = 5048;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_pegawai')) {
                $data = $this->upload->data(); //ambil file name yang diupload
                $old_image = $pegawai['foto_pegawai'];
                if ($old_image != "avatar.png") {
                    unlink(FCPATH . 'assets/dist/img/profile/' . $old_image);
                }
                $new_image = $data['file_name'];
                $this->db->set('foto_pegawai', $new_image);
            } else {
                $res['status'] = false;
                $res['msg'] = $this->upload->display_errors();
            }
        }
        $res['status'] = true;

        $this->db->set('tmpt_lahir_pegawai', $tmpt_lahir);
        $this->db->set('tgl_lahir_pegawai', $tgl_lahir);
        $this->db->set('jns_kelamin_pegawai', $jns_kelamin);
        $this->db->set('status_pernikahan_pegawai', $status_nikah);
        $this->db->set('agama_pegawai', $agama);
        $this->db->set('alamat_pegawai', $alamat);
        $this->db->set('email_pegawai', $email);
        $this->db->set('no_hp_pegawai', $no_hp);
        $this->db->set('pend_terakhir_pegawai', $pend_terakhir);
        $this->db->where('nip_pegawai', $nip);
        $this->db->update('pegawai');

        echo json_encode($res);
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
            $content['data_absensi'] = $this->db->get_where('absensi', ['id_pegawai' => $pegawai['id_pegawai']])->result_array();
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
        $header['title'] = 'Upload';
        $header['subtitle'] = 'Upload Dokumen';

        $pegawai = $this->db->get_where('pegawai', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $content['dokumen'] = $this->db->get_where('master_dokumen', ['id_pegawai' => $pegawai['id_pegawai']])->result_array();

        $this->load->view('_template/header', $header);
        $this->load->view('users/upload-dokumen', $content);
        $this->load->view('_template/footer');
    }

    public function upload() {
       
        $this->form_validation->set_rules('keterangan_file', 'Keterangan file', 'trim|required', [
            'required'  =>  '%s harus diisi'
        ]);
        if(empty($_FILES['file']['name'])) {
            $this->form_validation->set_rules('file', 'Keterangan file', 'trim|required', [
                'required'  =>  'Pilih dokumen yang akan diupload'
            ]);
        }

        if ($this->form_validation->run() == false) {
            $header['title'] = 'Upload';
            $header['subtitle'] = 'Panel Upload Dokumen';
    
            $this->load->view('_template/header', $header);
            $this->load->view('users/panel-upload-dokumen');
            $this->load->view('_template/footer');
        } else {
            $nama_file = $_FILES['file']['name'];

            if ($nama_file) {
                $config['allowed_types'] = 'doc|docx|pdf';
                $config['max_size'] = 5048;
                $config['upload_path'] = './assets/dist/file/';

                $this->load->library('upload', $config);

                // dd($data);
                if($this->upload->do_upload('file')){
                    $file = $this->upload->data('file_name');
                }else{
                    echo $this->upload->display_errors();
                }
            }

            $data = $this->db->get_where('pegawai', ['id_user' => $this->session->userdata('id_user')])->row_array();

            $upload = [
                'id_pegawai'    => $data['id_pegawai'],
                'nama_file'     => $file,
                'keterangan'    => $this->input->post('keterangan_file')
            ];

            $this->db->insert('master_dokumen', $upload);

            $this->session->set_flashdata('message', 'Diupload');
			redirect('users/upload-dokumen');
        }
    }

    public function download() {
        $file = $this->input->get('file');

        $this->load->helper('download');

        force_download('./assets/dist/file/'.$file, NULL);
    }

    public function update_dokumen() {
        $id = $this->uri->segment(3);

        $this->form_validation->set_rules('keterangan_file', 'Keterangan file', 'trim|required', [
            'required'  =>  '%s harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $header['title'] = 'Upload';
            $header['subtitle'] = 'Panel Update Dokumen';
    
            $content['dokumen'] = $this->db->get_where('master_dokumen', ['id_dokumen' => $id])->row_array();
    
            $this->load->view('_template/header', $header);
            $this->load->view('users/panel-update-dokumen', $content);
            $this->load->view('_template/footer');
        } else {
            $nama_file = $_FILES['file']['name'];

            if ($nama_file) {
                $config['allowed_types'] = 'doc|docx|pdf';
                $config['max_size'] = 2048;
                $config['upload_path'] = './assets/dist/file/';

                $this->load->library('upload', $config);
                $dokumen = $this->db->get_where('master_dokumen', ['id_dokumen' => $this->input->post('id_dokumen')])->row_array();
                // dd($data);
                if($this->upload->do_upload('file')){
                    $old_file = $dokumen['nama_file'];
                    if ($nama_file != $old_file) {
                        unlink(FCPATH . 'assets/dist/file/' . $old_file);
                    }
                    $file = $this->upload->data('file_name');
                    $this->db->set('nama_file', $file);
                }else{
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('keterangan', $this->input->post('keterangan_file'));
            $this->db->where('id_dokumen', $this->input->post('id_dokumen'));
            $this->db->update('master_dokumen');

            $this->session->set_flashdata('message', 'Diperbaharui');
			redirect('users/upload-dokumen');
        }
    }

    public function delete_dokumen($id) {
        $dokumen = $this->db->get_where('master_dokumen', ['id_dokumen' => $id])->row_array();
        unlink(FCPATH . 'assets/dist/file/' . $dokumen['nama_file']);
        $this->db->delete('master_dokumen', ['id_dokumen' => $id]);

        $this->session->set_flashdata('message', 'Dihapus');
        redirect('users/upload-dokumen');
    }
}