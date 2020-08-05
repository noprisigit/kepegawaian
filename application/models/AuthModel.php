<?php

class AuthModel extends CI_Model {
    public function get_user($data) {
        return $this->db->get_where('users', ['username' => $data['username']])->row_array();
    }
}