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

    private function _login() {
        $input = [
            'email'     => htmlspecialchars($this->input->post('email')),
            'password'  => htmlspecialchars($this->input->post('password'))
        ];

        $user = $this->AuthModel->get_user($input['email']);
         
        if ($user) {
            if (password_verify($input['password'], $user['password'])) {
                $data = [
                    'nama'  => $user['nama'],
                    'email' => $user['email']
                ];
                $this->session->set_userdata($data);
                redirect('home');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Check your password!.
                </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
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