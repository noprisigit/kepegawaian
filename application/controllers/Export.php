<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('ExportModel');
    }

    public function export_pdf() {
        $pdf = new FPDF('l', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(275,9,'Ibnu Rusydi Islamic Education Foundation',0,1,'C');
        $pdf->SetFont('Arial','B',12);    
        $pdf->Cell(275,9,'Yayasan Pendidikan Islam Ibnu Rusydi',0,1,'C');
        $pdf->SetFont('Arial','B',12);    
        $pdf->Cell(275,9,'Data Pegawai',0,1,'C');
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',11);
        $pdf->Cell(40,8,'NIP',1,0,'C');
        $pdf->Cell(50,8,'NAMA',1,0,'C');
        $pdf->Cell(50,8,'TTL',1,0,'C');
        $pdf->Cell(35,8,'JENIS KELAMIN',1,0,'C');
        $pdf->Cell(35,8,'AGAMA',1,0,'C');
        $pdf->Cell(65,8,'ALAMAT',1,1,'C');

        $pdf->SetFont('Arial','',11);
        
        $pegawai = $this->ExportModel->get_all_pegawai();

        foreach ($pegawai as $row){
            if ($row->jns_kelamin_pegawai == "L") {
                $jenis_kelamin = "Laki-Laki";
            } else {
                $jenis_kelamin = "Perempun";
            }
            $pdf->Cell(40,6,$row->nip_pegawai,1,0);
            $pdf->Cell(50,6,$row->nama_pegawai,1,0);
            $pdf->Cell(50,6,$row->tmpt_lahir_pegawai . ", " . $row->tgl_lahir_pegawai,1,0);
            $pdf->Cell(35,6,$jenis_kelamin,1,0); 
            $pdf->Cell(35,6,$row->agama_pegawai,1,0,'C'); 
            $pdf->Cell(65,6,$row->alamat_pegawai,1,1); 
        }

        $pdf->Output();
    }

    public function export_excel () {
        $spreadsheet = new Spreadsheet;

         $styleArray = array(
            'font'  => array(
                'name'  => 'Arial'
            )
        );      

        $spreadsheet->getDefaultStyle()->applyFromArray($styleArray);

        foreach(range('A', 'M') as $value) {
            $spreadsheet->setActiveSheetIndex(0)
                        ->getColumnDimension($value)
                        ->setAutoSize(true);
        }

        $spreadsheet->setActiveSheetIndex(0)
                    ->getStyle('A1:A3')
                    ->getAlignment()
                    ->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        $spreadsheet->setActiveSheetIndex(0)
                    ->getStyle('A1:A3')
                    ->getFont()
                    ->setSize(16);

        $spreadsheet->setActiveSheetIndex(0)
                    ->getStyle('A1:A3')
                    ->getFont()
                    ->setBold(true);

        $spreadsheet->setActiveSheetIndex(0)
                    ->getStyle("A5:M5")
                    ->getBorders()
                    ->getAllBorders()
                    ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        $spreadsheet->setActiveSheetIndex(0)
                    ->getStyle("A5:M5")
                    ->getFont()
                    ->setSize(14);
        $spreadsheet->setActiveSheetIndex(0)
                    ->getStyle("A5:M5")
                    ->getFont()
                    ->setBold(true);
        $spreadsheet->setActiveSheetIndex(0)
                    ->getStyle("A5:M5")
                    ->getAlignment()
                    ->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        $spreadsheet->setActiveSheetIndex(0)
                    ->mergeCells('A1:M1')
                    ->mergeCells('A2:M2')
                    ->mergeCells('A3:M3')
                    ->setCellValue('A1', 'Ibnu Rusydi Islamic Education Foundation')
                    ->setCellValue('A2', 'Yayasan Pendidikan Islam Ibnu Rusydi')
                    ->setCellValue('A3', 'Data Pegawai');

        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A5', 'No')
                    ->setCellValue('B5', 'Nama')
                    ->setCellValue('C5', 'TTL')
                    ->setCellValue('D5', 'Jenis Kelamin')
                    ->setCellValue('E5', 'Status Pernikahan')
                    ->setCellValue('F5', 'Agama')
                    ->setCellValue('G5', 'Alamat')
                    ->setCellValue('H5', 'Jabatan')
                    ->setCellValue('I5', 'Email')
                    ->setCellValue('J5', 'No Handphone')
                    ->setCellValue('K5', 'Tanggal Masuk')
                    ->setCellValue('L5', 'Status')
                    ->setCellValue('M5', 'Pendidikan Terakhir');
    
        $column = 6;
        $no = 1;

        $pegawai = $this->ExportModel->get_all_pegawai();

        foreach ($pegawai as $row) {
            if ($row->jns_kelamin_pegawai == "L") {
                $jenis_kelamin = "Laki-Laki";
            } else {
                $jenis_kelamin = "Perempun";
            }

            $spreadsheet->setActiveSheetIndex(0)
                        ->getRowDimension($column)
                        ->setRowHeight(20);
            $spreadsheet->setActiveSheetIndex(0)
                        ->getStyle("A".$column.":M".$column)
                        ->getAlignment()
                        ->setVertical(PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

            $spreadsheet->setActiveSheetIndex(0)
                        ->getStyle("A".$column)
                        ->getAlignment()
                        ->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $spreadsheet->setActiveSheetIndex(0)
                        ->getStyle("D".$column.":F".$column)
                        ->getAlignment()
                        ->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $spreadsheet->setActiveSheetIndex(0)
                        ->getStyle("H".$column)
                        ->getAlignment()
                        ->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $spreadsheet->setActiveSheetIndex(0)
                        ->getStyle("J".$column.":M".$column)
                        ->getAlignment()
                        ->setHorizontal(PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

            $spreadsheet->setActiveSheetIndex(0)
                        ->getStyle("A".$column.":"."M".$column)
                        ->getBorders()
                        ->getAllBorders()
                        ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->setActiveSheetIndex(0)
                        ->getStyle("A".$column.":"."M".$column)
                        ->getFont()
                        ->setSize(12);

            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $column, $no)
                        ->setCellValue('B' . $column, $row->nama_pegawai)
                        ->setCellValue('C' . $column, $row->tmpt_lahir_pegawai . ", " . $row->tgl_lahir_pegawai)
                        ->setCellValue('D' . $column, $jenis_kelamin)
                        ->setCellValue('E' . $column, $row->status_pernikahan_pegawai)
                        ->setCellValue('F' . $column, $row->agama_pegawai)
                        ->setCellValue('G' . $column, $row->alamat_pegawai)
                        ->setCellValue('H' . $column, $row->nama_jabatan)
                        ->setCellValue('I' . $column, $row->email_pegawai)
                        ->setCellValue('J' . $column, $row->no_hp_pegawai)
                        ->setCellValue('K' . $column, $row->tgl_masuk_pegawai)
                        ->setCellValue('L' . $column, $row->status_pegawai)
                        ->setCellValue('M' . $column, $row->pend_terakhir_pegawai);
                
            $column++;
            $no++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Data Pegawai.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}