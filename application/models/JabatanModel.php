<?php

class JabatanModel extends CI_Model {
    public function get_all_jabatan() {
        return $this->db->get('jabatan')->result_array();
    }
}