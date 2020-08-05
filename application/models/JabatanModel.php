<?php

class JabatanModel extends CI_Model {
    public function get_all_jabatan() {
        return $this->db->get('jabatan')->result_array();
    }

    public function get_pegawai_jabatan() {
        $query = $this->db->query("SELECT pegawai.nip_pegawai, pegawai.nama_pegawai, pegawai.foto_pegawai, jabatan.nama_jabatan, master_jabatan.id_pegawai, master_jabatan.id_jabatan, master_jabatan.nomor_sk, master_jabatan.tanggal_sk
        FROM master_jabatan
        RIGHT JOIN pegawai ON pegawai.id_pegawai = master_jabatan.id_pegawai
        INNER JOIN jabatan ON jabatan.id_jabatan = master_jabatan.id_jabatan
        WHERE master_jabatan.id_master_jabatan IN (
            SELECT MAX(master_jabatan.id_master_jabatan)
            FROM master_jabatan
            GROUP BY master_jabatan.id_pegawai
        )");
        return $query->result_array();
        // $this->db->select('pegawai.id_pegawai, pegawai.nip_pegawai, pegawai.nama_pegawai, pegawai.foto_pegawai, jabatan.nama_jabatan, master_jabatan.nomor_sk, master_jabatan.tanggal_sk');
        // $this->db->from('pegawai');
        // $this->db->join('master_jabatan', 'pegawai.id_pegawai = master_jabatan.id_pegawai', 'left');
        // $this->db->join('jabatan', 'jabatan.id_jabatan = master_jabatan.id_jabatan', 'left');
        // $this->db->group_by('master_jabatan.id_pegawai');
        // $this->db->order_by('master_jabatan.id_master_jabatan', 'DESC');
        // return $this->db->get()->result_array();
    }
}