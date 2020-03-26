<?php

class ExportModel extends CI_Model {
    public function get_all_pegawai() {
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->join('jabatan', 'pegawai.id_jabatan_pegawai = jabatan.id_jabatan');
        return $this->db->get()->result();
    }
}