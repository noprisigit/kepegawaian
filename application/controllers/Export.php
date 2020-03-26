<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('ExportModel');
    }

    public function export_pdf() {
        $pdf = new FPDF('l');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(190,7,'SEKOLAH MENENGAH KEJURUSAN NEGERI 2 LANGSA',0,1,'C');
        $pdf->SetFont('Arial','B',12);    
        $pdf->Cell(190,7,'DATA PEGAWAI',0,1,'C');
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(30,6,'NIP',1,0);
        $pdf->Cell(50,6,'NAMA',1,0);
        $pdf->Cell(35,6,'TTL',1,0);
        $pdf->Cell(35,6,'JENIS KELAMIN',1,0);
        $pdf->Cell(35,6,'STATUS PERNIKAHAN',1,0);
        $pdf->Cell(35,6,'AGAMA',1,0);
        $pdf->Cell(35,6,'ALAMAT',1,0);
        $pdf->Cell(35,6,'JABATAN',1,0);
        $pdf->Cell(35,6,'EMAIL',1,0);
        $pdf->Cell(35,6,'NO. HANDPHONE',1,0);
        $pdf->Cell(35,6,'TANGGAL MASUK',1,0);
        $pdf->Cell(35,6,'STATUS PEGAWAI',1,0);
        $pdf->Cell(35,6,'PENDIDIKAN TERAKHIR',1,1);

        $pdf->SetFont('Arial','',10);
        
        $pegawai = $this->ExportModel->get_all_pegawai();

        foreach ($pegawai as $row){
            // if ($row->)
            $pdf->Cell(30,6,$row->nip_pegawai,1,0);
            $pdf->Cell(50,6,$row->nama_pegawai,1,0);
            $pdf->Cell(35,6,$row->tmpt_lahir_pegawai . ", " . $row->tgl_lahir_pegawai,1,0);
            $pdf->Cell(35,6,$row->jns_kelamin_pegawai,1,0); 
            $pdf->Cell(35,6,$row->status_pernikahan_pegawai,1,0); 
            $pdf->Cell(35,6,$row->agama_pegawai,1,0); 
            $pdf->Cell(35,6,$row->alamat_pegawai,1,0); 
            $pdf->Cell(35,6,$row->nama_jabatan,1,0); 
            $pdf->Cell(35,6,$row->email_pegawai,1,0); 
            $pdf->Cell(35,6,$row->no_hp_pegawai,1,0); 
            $pdf->Cell(35,6,$row->tgl_masuk_pegawai,1,0); 
            $pdf->Cell(35,6,$row->status_pegawai,1,0); 
            $pdf->Cell(35,6,$row->pend_terakhir_pegawai,1,0); 
        }

        $pdf->Output();
    }
}