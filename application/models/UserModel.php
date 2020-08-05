<?php

class UserModel extends CI_Model {
    public function get_data_diri($id) {
        $this->db->select('*');
        $this->db->from('pegawai');
        // $this->db->join('jabatan', 'jabatan.id_jabatan = pegawai.id_jabatan_pegawai');
        $this->db->where('id_user', $id);
        return $this->db->get()->row_array();
    }
}