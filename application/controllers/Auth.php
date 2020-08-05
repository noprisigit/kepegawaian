<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
   public function __construct() {
      parent::__construct();
      $this->load->model('AuthModel');
   }

   public function index() {
      $this->form_validation->set_rules('username', 'Username', 'trim|required', [
         'required'  => 'Username harus diisi'
      ]);
      $this->form_validation->set_rules('password', 'Password', 'trim|required', [
         'required'  => 'Password harus diisi'
      ]);

      if ($this->form_validation->run() == false) {
         $this->load->view('auth/index');
      } else {
         $this->_login();
      }
   }

   public function registration() {
      $this->form_validation->set_rules('nama', 'name', 'trim|required', [
         'required'  => 'Nama lengkap harus diisi'
      ]);
      $this->form_validation->set_rules('username', 'username', 'trim|required', [
         'required'  => 'Username harus diisi',
      ]);
      $this->form_validation->set_rules('password', 'password', 'trim|required|matches[confirm_password]', [
         'required'  => 'Password harus diisi',
         'matches'   => 'Password tidak sama dengan konfirmasi password'
      ]);
      $this->form_validation->set_rules('confirm_password', 'confirmation password', 'trim|required|matches[password]', [
         'required'  => 'Konfirmasi password harus diisi',
         'matches'   => 'Konfirmasi password tidak sama dengan password'
      ]);
      if ($this->form_validation->run() == false) {
         $this->load->view('auth/registration');
      } else {
         date_default_timezone_set('asia/jakarta');

         $name = htmlspecialchars($this->input->post('nama'), true);
         $nip = htmlspecialchars($this->input->post('username'));
         $pass = htmlspecialchars($this->input->post('password'), true);

         // dd($this->input->post());

         $user = [
            'nama'              => $name,
            'username'          => $nip,
            'password'          => password_hash($pass, PASSWORD_DEFAULT),
            'status_access'     => 'pegawai',
            'status_account'    => 0,
            'date_created'      => date('Y-m-d H:i:s')
         ];
         // dd($user);

         $this->db->insert('users', $user);

         $data = $this->db->get_where('users', ['username' => $nip])->row_array();

         $pegawai = [
            'id_user'      => $data['id'],
            'nip_pegawai'  => $nip,
            'nama_pegawai' => $name,
            'foto_pegawai' => 'avatar.png'
         ];
         $this->db->insert('pegawai', $pegawai);

         $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
               Your account has been created. <br> Please wait for verification
         </div>');
         redirect('auth');
      }
   }

   private function _login() {
      $input = [
         'username'  => htmlspecialchars($this->input->post('username'), true),
         'password'  => htmlspecialchars($this->input->post('password'), true)
      ];

      $user = $this->AuthModel->get_user($input);
      if ($user) {
         if (password_verify($input['password'], $user['password'])) {
               if ($user['status_account'] == 1) {
                  $pegawai = $this->db->select('foto_pegawai')->from('pegawai')->where('id_user', $user['id'])->get()->row_array();
                  
                  $data = [
                     'id_user'       => $user['id'],
                     'nama'          => $user['nama'],
                     'username'      => $user['username'],
                     'status_access' => $user['status_access'],
                     'image'         => $pegawai['foto_pegawai']
                  ];
                  $this->session->set_userdata($data);

                  if ($user['status_access'] == 'admin')
                     redirect('home');
                  else 
                     redirect('home/user');
               } else {
                  $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                     Your account is not active!.
                  </div>');
                  redirect('auth');
               }
         } else {
               $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                  Check your password!.
               </div>');
               redirect('auth');
         }
      } else {
         $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
               Check your username or password!.
         </div>');
         redirect('auth');   
      }
   }

   public function logout() {
      $data = ['nama', 'email'];
      $this->session->unset_userdata($data);
      $this->session->set_flashdata('message', '<div class="alert alert-info text-center" role="alert">
            Anda telah keluar dari aplikasi!.
      </div>');
      redirect('auth');
   }

   public function change_password() {
      $this->form_validation->set_rules('password', 'password', 'trim|required|matches[confirm_password]', [
         'required'  => 'Password harus diisi',
         'matches'   => 'Password tidak sama dengan konfirmasi password'
      ]);
      $this->form_validation->set_rules('confirm_password', 'confirmation password', 'trim|required|matches[password]', [
         'required'  => 'Konfirmasi password harus diisi',
         'matches'   => 'Konfirmasi password tidak sama dengan password'
      ]);

      if ($this->form_validation->run() == false) {
         $header['title'] = 'Home';
         $header['subtitle'] = 'Ubah Password';
         
         $this->load->view('_template/header', $header);
         $this->load->view('auth/change_password');
         $this->load->view('_template/footer');
      } else {
         $this->db->set('password', password_hash($this->input->post('password'), PASSWORD_DEFAULT));
         $this->db->where('username', $this->input->post('username'));
         $this->db->update('users');
         
         $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible mt-3">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> <span class="text-bold">Pemberitahuan!</span></h5>
            Password berhasil diubah.
         </div>');
         redirect('auth/change-password');   
      }
   }

   public function reset_password() {
      $id = $this->uri->segment(3);

      $this->db->set('password', password_hash("123", PASSWORD_DEFAULT));
      $this->db->where('id', $id);
      $this->db->update('users');

      $this->session->set_flashdata('message', 'Reset password berhasil dilakukan');
      redirect('users/users-pegawai');
   }
}