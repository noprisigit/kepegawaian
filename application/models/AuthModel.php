<?php

class AuthModel extends CI_Model {
    public function get_user($email) {
        return $this->db->get_where('users', ['email' => $email])->row_array();
    }
}