<?php

namespace App\Http\Controllers;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExportController extends Controller
{
    public function exportSuratMasuk()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set Header
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Tanggal');
        $sheet->setCellValue('C1', 'Kode Arsip');

        // Isi Data Surat Masuk
        $data = SuratMasuk::all();
        $row = 2; // Mulai dari baris kedua
        foreach ($data as $key => $surat) {
            $sheet->setCellValue('A' . $row, $key + 1);
            $sheet->setCellValue('B' . $row, $surat->tanggal_surat);
            $sheet->setCellValue('C' . $row, $surat->category->name ?? 'Tidak Ada Kode Arsip');
            $row++;
        }

        // Unduh File
        $filename = 'Surat_Masuk.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    public function exportSuratKeluar()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set Header
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Tanggal');
        $sheet->setCellValue('C1', 'Kode Arsip');

        // Isi Data Surat Keluar
        $data = SuratKeluar::all();
        $row = 2; // Mulai dari baris kedua
        foreach ($data as $key => $surat) {
            $sheet->setCellValue('A' . $row, $key + 1);
            $sheet->setCellValue('B' . $row, $surat->tanggal_surat);
            $sheet->setCellValue('C' . $row, $surat->category->name ?? 'Tidak Ada Kode Arsip');
            $row++;
        }

        // Unduh File
        $filename = 'Surat_Keluar.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
}


