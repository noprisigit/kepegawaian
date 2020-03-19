<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('PegawaiModel');
		if (!$this->session->userdata('email')) {
			redirect('auth');
		}
	}

	public function index()
	{
		$header['title'] = 'Pegawai';
		$header['subtitle'] = 'List Data Pegawai';
        
        $content['title'] = 'Data Pegawai';
		$content['subtitle'] = 'List Data Pegawai';
		$content['list_pegawai'] = $this->PegawaiModel->get_all_pegawai();	
		
		$this->load->view('_template/header', $header);
		$this->load->view('pegawai/index', $content);
		$this->load->view('_template/footer');
	}

	public function add() {
		
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
		if(empty($_FILES['foto_pegawai']['name'])) {
            $this->form_validation->set_rules('foto_pegawai', 'Foto Pegawai', 'required', ['required' => 'Foto Pegawai Harus Dipilih']);
        }
		$this->form_validation->set_rules('alamat_pegawai', 'Alamat Pegawai', 'trim|required', ['required' => 'Alamat Pegawai Harus Diisi']);
		
		if ($this->form_validation->run() == false) {
			$header['title'] = 'Pegawai';
			$header['subtitle'] = 'Tambah Data Pegawai';
			
			$content['title'] = 'Data Pegawai';
			$content['subtitle'] = 'Tambah Data Pegawai';
			$content['jabatan'] = $this->PegawaiModel->get_list_jabatan();
	
			$this->load->view('_template/header', $header);
			$this->load->view('pegawai/add', $content);
			$this->load->view('_template/footer');
		} else {
			$image = $_FILES['foto_pegawai']['name'];
			// dd($image);
			if ($image) {
				$config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
				$config['upload_path'] = './assets/dist/img/profile';
				
				$this->load->library('upload', $config);

				if($this->upload->do_upload('foto_pegawai')) {
					$foto_pegawai = $this->upload->data('file_name');
                } else {
                    $this->upload->display_errors();
                }
			}

			$tgl_lahir_pegawai = date_create($this->input->post('tgl_lahir_pegawai'));
			$tgl_lahir_pegawai = date_format($tgl_lahir_pegawai, 'Y-m-d');

			$tgl_masuk_pegawai = date_create($this->input->post('tgl_masuk_pegawai'));
			$tgl_masuk_pegawai = date_format($tgl_masuk_pegawai, 'Y-m-d');

			$data = [
				'nip_pegawai'				=> htmlspecialchars($this->input->post('nip_pegawai')),
				'nama_pegawai'				=> htmlspecialchars($this->input->post('nama_pegawai')),
				'tmpt_lahir_pegawai'		=> htmlspecialchars($this->input->post('tmpt_lahir_pegawai')),
				'tgl_lahir_pegawai'			=> $tgl_lahir_pegawai,
				'jns_kelamin_pegawai'		=> htmlspecialchars($this->input->post('jns_kelamin_pegawai')),
				'status_pernikahan_pegawai'	=> htmlspecialchars($this->input->post('status_pernikahan_pegawai')),
				'agama_pegawai'				=> htmlspecialchars($this->input->post('agama_pegawai')),
				'alamat_pegawai'			=> htmlspecialchars($this->input->post('alamat_pegawai')),
				'id_jabatan_pegawai'		=> htmlspecialchars($this->input->post('jabatan_pegawai')),
				'email_pegawai'				=> htmlspecialchars($this->input->post('email_pegawai')),
				'no_hp_pegawai'				=> htmlspecialchars($this->input->post('no_hp_pegawai')),
				'tgl_masuk_pegawai'			=> $tgl_masuk_pegawai,
				'status_pegawai'			=> htmlspecialchars($this->input->post('status_pegawai')),
				'pend_terakhir_pegawai'		=> htmlspecialchars($this->input->post('pend_terakhir_pegawai')),
				'foto_pegawai'				=> $foto_pegawai
			];
			
			$this->db->insert('pegawai', $data);
			$this->session->set_flashdata('message', 'Ditambahkan');
			redirect('pegawai');
		}
	}

	public function edit() {
		$id_pegawai = $this->uri->segment('3');
		
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
			$header['title'] = 'Pegawai';
			$header['subtitle'] = 'Edit Data Pegawai';
			
			$content['title'] = 'Data Pegawai';
			$content['subtitle'] = 'Edit Data Pegawai';
			$content['pegawai'] = $this->PegawaiModel->get_pegawai($id_pegawai);
			$content['jabatan'] = $this->PegawaiModel->get_list_jabatan();	
	
			$this->load->view('_template/header', $header);
			$this->load->view('pegawai/edit', $content);
			$this->load->view('_template/footer');
		} else {
			$data = $this->PegawaiModel->get_pegawai($this->input->post('id_pegawai'));
			
			$tgl_lahir_pegawai = date_create($this->input->post('tgl_lahir_pegawai'));
			$tgl_lahir_pegawai = date_format($tgl_lahir_pegawai, 'Y-m-d');

			$tgl_masuk_pegawai = date_create($this->input->post('tgl_masuk_pegawai'));
			$tgl_masuk_pegawai = date_format($tgl_masuk_pegawai, 'Y-m-d');
			
			
			$upload_image = $_FILES['foto_pegawai']['name'];
			if($upload_image == null) {
				$image = $data['foto_pegawai'];
			} else {
				$config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/dist/img/profile';

                $this->load->library('upload', $config);

                if($this->upload->do_upload('foto_pegawai')){
                    $old_image = $data['foto_pegawai'];
                    if($upload_image != $old_image){
                        unlink(FCPATH . 'assets/dist/img/profile/' . $old_image);
                    }
                    $image = $this->upload->data('file_name');
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
			$this->db->set('foto_pegawai', $image);
			$this->db->where('id_pegawai', $data['id_pegawai']);
			$this->db->update('pegawai');

			$this->session->set_flashdata('message', 'Diubah');
			redirect('pegawai');
		}
	}

	public function delete($id) {
		$this->db->delete('pegawai', ['id_pegawai' => $id]);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('pegawai');
	}

	public function salary() {
		$header['title'] = 'Pegawai';
		$header['subtitle'] = 'Data Gaji Pegawai';
		
		$content['title'] = 'Data Pegawai';
		$content['subtitle'] = 'Data Gaji Pegawai';
		$content['list_gaji'] = $this->PegawaiModel->get_all_pegawai_gaji();

		$this->load->view('_template/header', $header);
		$this->load->view('pegawai/salary', $content);
		$this->load->view('_template/footer');
	}

	public function add_salary() {
		$this->form_validation->set_rules('pegawai', 'Nama Pegawai', 'trim|required', ['required' => 'Nama Pegawai Harus Dipilih']);
		$this->form_validation->set_rules('gaji_pokok', 'Gaji Pokok', 'trim|required', ['required' => 'Gaji Pokok Harus Diisi']);
		// $this->form_validation->set_rules('tunjangan', 'Tunjangan', 'trim|required', ['required' => 'Tunjangan Harus Diisi']);
		// $this->form_validation->set_rules('lain_lain', 'Lain-lain', 'trim|required', ['required' => 'Lain-lain Harus Diisi']);

		if ($this->form_validation->run() == false) {
			$header['title'] = 'Pegawai';
			$header['subtitle'] = 'Tambah Data Gaji';
			
			$content['title'] = 'Data Pegawai';
			$content['subtitle'] = 'Tambah Data Gaji';
			$content['pegawai'] = $this->PegawaiModel->get_all_pegawai();

			$this->load->view('_template/header', $header);
			$this->load->view('pegawai/add_salary', $content);
			$this->load->view('_template/footer');
		} else {
			$pegawai = htmlspecialchars($this->input->post('pegawai'));
			$gaji_pokok = $this->input->post('gaji_pokok');
			$tunjangan = $this->input->post('tunjangan');
			$lain_lain = $this->input->post('lain_lain');

			$data = [
				'gaji_pokok'	=> $gaji_pokok,
				'tunjangan'		=> $tunjangan,
				'lain_lain'		=> $lain_lain,
				'id_pegawai'	=> $pegawai
			];

			$this->db->insert('gaji', $data);
			$this->session->set_flashdata('message', 'Ditambah');
			redirect('pegawai/salary');
		}
	}

	public function edit_salary() {
		$id = $this->uri->segment('3');
		// $this->form_validation->set_rules('pegawai', 'Nama Pegawai', 'trim|required', ['required' => 'Nama Pegawai Harus Dipilih']);
		$this->form_validation->set_rules('gaji_pokok', 'Gaji Pokok', 'trim|required', ['required' => 'Gaji Pokok Harus Diisi']);
		if ($this->form_validation->run() == false) {
			$header['title'] = 'Pegawai';
			$header['subtitle'] = 'Tambah Data Gaji';
			
			$content['title'] = 'Data Pegawai';
			$content['subtitle'] = 'Tambah Data Gaji';
			$content['pegawai'] = $this->PegawaiModel->get_pegawai_gaji($id);
	
			$this->load->view('_template/header', $header);
			$this->load->view('pegawai/edit_salary', $content);
			$this->load->view('_template/footer');
		} else {
			$pegawai = htmlspecialchars($this->input->post('id_gaji'));
			$gaji_pokok = $this->input->post('gaji_pokok');
			$tunjangan = $this->input->post('tunjangan');
			$lain_lain = $this->input->post('lain_lain');
			$data = [
				'gaji_pokok'	=> $gaji_pokok,
				'tunjangan'		=> $tunjangan,
				'lain_lain'		=> $lain_lain
			];

			$this->db->set($data);
			$this->db->where('id_gaji', $pegawai);
			$this->db->update('gaji');
			$this->session->set_flashdata('message', 'Diubah');
			redirect('pegawai/salary');
		}
	}

	public function delete_salary($id) {
		$this->db->delete('gaji', ['id_gaji' => $id]);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('pegawai/salary');
	}

	public function penilaian() {
		$header['title'] = 'Pegawai';
		$header['subtitle'] = 'Penilaian Pegawai';
		
		$content['title'] = 'Data Pegawai';
		$content['subtitle'] = 'Data Penilaian';
		$content['pegawai'] = $this->PegawaiModel->get_all_pegawai();
		$content['penilaian'] = $this->PegawaiModel->get_all_penilaian_pegawai();
		// dd($content['penilaian']);

		$this->load->view('_template/header', $header);
		$this->load->view('pegawai/penilaian', $content);
		$this->load->view('_template/footer');	
	}

	public function add_penilaian() {
		$id = $this->uri->segment('3');
		$header['title'] = 'Pegawai';
		$header['subtitle'] = 'Penilaian Pegawai';
		
		$content['title'] = 'Data Pegawai';
		$content['subtitle'] = 'Tambah Penilaian';
		$content['pegawai'] = $this->PegawaiModel->get_nama_pegawai($id);
		// dd($content['pegawai']);

		$this->load->view('_template/header', $header);
		$this->load->view('pegawai/add_penilaian', $content);
		$this->load->view('_template/footer');
	}

	public function simpan_penilaian() {
		$administrasi = [
			'program_tahunan'				=>	$this->input->post('program_tahunan'),
			'program_semester'				=>	$this->input->post('program_semester'),
			'rpp'							=>	$this->input->post('rpp'),
			'program_ulangan'				=>	$this->input->post('program_ulangan'),
			'program_analisis_penilaian'	=>	$this->input->post('program_analisis_penilaian'),
			'program_remedial'				=>	$this->input->post('program_remedial'),
			'buku_penunjang_lain'			=>	$this->input->post('buku_penunjang_lain'),
			'id_pegawai'					=>	$this->input->post('id_pegawai')
		];

		$kedisiplinan = [
			'kehadiran'			=>	$this->input->post('kehadiran'),
			'rapat_mingguan'	=>	$this->input->post('rapat_mingguan'),
			'taklim_mingguan'	=>	$this->input->post('taklim_mingguan'),
			'rapat_yayasan'		=>	$this->input->post('rapat_yayasan'),
			'penyambutan_siswa'	=>	$this->input->post('penyambutan_siswa'),
			'id_pegawai'		=>	$this->input->post('id_pegawai'),
		];

		$personality = [
			'inisiatif'				=> $this->input->post('inisiatif'),
			'tanggung_jawab'		=> $this->input->post('tanggung_jawab'),
			'ketelitian_kerapihan'	=> $this->input->post('ketelitian_kerapihan'),
			'kerja_sama'			=> $this->input->post('kerja_sama'),
			'penyelesaian_tugas'	=> $this->input->post('penyelesaian_tugas'),
			'kemampuan_mengajar'	=> $this->input->post('kemampuan_mengajar'),
			'id_pegawai'			=> $this->input->post('id_pegawai')
		];

		$karakter = [
			'integritas'		=>	$this->input->post('integritas'),
			'client_personality'=>	$this->input->post('client_personality'),
			'id_pegawai'		=>	$this->input->post('id_pegawai')
		];

		$this->db->insert('administrasi_pengajaran', $administrasi);
		$this->db->insert('kedisiplinan', $kedisiplinan);
		$this->db->insert('personality', $personality);
		$this->db->insert('karakter', $karakter);

		$this->session->set_flashdata('message', 'Ditambah');
		redirect('pegawai/penilaian');
	}

}