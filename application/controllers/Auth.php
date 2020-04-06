<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('AuthModel');
    }
    public function index() {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/index');
        } else {
            $this->_login();
        }
    }

    public function registration() {
        $this->form_validation->set_rules('nama', 'name', 'trim|required', [
            'required'  => 'Please fill your %s'
        ]);
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[users.email]', [
            'required'  => 'Please fill your %s',
            'is_unique' => 'This %s already registered'
        ]);
        $this->form_validation->set_rules('password', 'password', 'trim|required|matches[confirm_password]', [
            'required'  => 'Please fill your %s'
        ]);
        $this->form_validation->set_rules('confirm_password', 'confirmation password', 'trim|required|matches[password]', [
            'required'  => 'Please fill your %s'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/registration');
        } else {
            date_default_timezone_set('asia/jakarta');

            $user = [
                'nama'              => htmlspecialchars($this->input->post('nama'), true),
                'email'             => htmlspecialchars($this->input->post('email'), true),
                'password'          => password_hash(htmlspecialchars($this->input->post('password'), true), PASSWORD_DEFAULT),
                'status_access'     => 'pegawai',
                'status_account'    => 0,
                'date_created'      => date('Y-m-d H:i:s')
            ];

            $this->db->insert('users', $user);

            // $data = $this->db->get_where('users', ['email' => $this->input->post('email')])->row_array();

            // $pegawai = [
            //     'id_user'   => $data['id'],
            // ];
            // $this->db->insert('pegawai', $pegawai);

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
                Your account has been created. <br> Please wait for verification
            </div>');
            redirect('auth');
        }
    }

    private function _login() {
        $input = [
            'email'     => htmlspecialchars($this->input->post('email')),
            'password'  => htmlspecialchars($this->input->post('password'))
        ];

        $user = $this->AuthModel->get_user($input['email']);
         
        if ($user) {
            if (password_verify($input['password'], $user['password'])) {
                if ($user['status_account'] == 1) {
                    $pegawai = $this->db->select('foto_pegawai')->from('pegawai')->where('id_user', $user['id'])->get()->row_array();
                    
                    $data = [
                        'id_user'       => $user['id'],
                        'nama'          => $user['nama'],
                        'email'         => $user['email'],
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
        redirect('auth');
    }
}