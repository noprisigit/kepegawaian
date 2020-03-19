<?php

class PegawaiModel extends CI_Model {
    public function get_all_pegawai() {
        return $this->db->get('pegawai')->result_array();
    }

    public function get_pegawai($id) {
        return $this->db->get_where('pegawai', ['id_pegawai' => $id])->row_array();
    }
    
    public function get_list_jabatan() {
        return $this->db->get('jabatan')->result_array();
    }

    public function get_all_pegawai_gaji() {
        $this->db->select('nama_pegawai, id_gaji, gaji_pokok, tunjangan, lain_lain');
        $this->db->from('pegawai');
        $this->db->join('gaji', 'pegawai.id_pegawai = gaji.id_pegawai');
        return $this->db->get()->result_array();
    }

    public function get_pegawai_gaji($id) {
        $this->db->select('nama_pegawai, id_gaji, gaji_pokok, tunjangan, lain_lain');
        $this->db->from('pegawai');
        $this->db->join('gaji', 'pegawai.id_pegawai = gaji.id_pegawai');
        $this->db->where('id_gaji', $id);
        return $this->db->get()->row_array();
    }

    public function get_nama_pegawai($id) {
        $this->db->select('id_pegawai, nama_pegawai');
        return $this->db->get_where('pegawai', ['id_pegawai' => $id])->row_array();
    }

    public function get_all_penilaian_pegawai() {
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->join('administrasi_pengajaran', 'pegawai.id_pegawai = administrasi_pengajaran.id_pegawai');
        $this->db->join('kedisiplinan', 'pegawai.id_pegawai = kedisiplinan.id_pegawai');
        $this->db->join('personality', 'pegawai.id_pegawai = personality.id_pegawai');
        $this->db->join('karakter', 'pegawai.id_pegawai = karakter.id_pegawai');
        // $this->db->where('pegawai.id_pegawai', $id);
        return $this->db->get()->result_array();
    }
}