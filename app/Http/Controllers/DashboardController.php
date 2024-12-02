<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DashboardController extends Controller
{
    public function index()
    {
        $suratMasuk = SuratMasuk::paginate(5 ,['*'], 'page_surat_masuk');

        $suratKeluar=SuratKeluar::paginate(5,['*'],'page_surat_keluar');

        return view('layouts.dashboard',compact('suratMasuk','suratKeluar'));
    }

    
}

