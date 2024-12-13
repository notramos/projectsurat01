<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\SuratMasuk;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class SuratMasukController extends Controller
{
    public function index()
    {
        $suratMasuk = SuratMasuk::all();
        return view('surat_masuk.index', compact('suratMasuk'));
    }

    public function create()
    {
        return view('surat_masuk.create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'nomor_surat' => 'required|numeric|unique:surat_masuk',
            'tanggal_surat' => 'required|date',
            'perihal' => 'required|string',
        ]);
    
        SuratMasuk::create([
            'nomor_surat' => $request->nomor_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'perihal'=> $request->perihal, // Simpan path file
        ]);
         return redirect()->route('surat_masuk.index')->with('success', 'Surat masuk berhasil disimpan.');
     
    }

    public function edit($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);
        return view('surat_masuk.edit', compact('suratMasuk','categories'));
    }

    public function update(Request $request, $id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);
        $suratMasuk->update($request->all());
        return redirect()->route('surat_masuk.index');
    }

    public function destroy($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);
        $suratMasuk->delete();
        return redirect()->route('surat_masuk.index');
    }

    public function show($id)
    {
        $surat = SuratMasuk::with('category')->findOrFail($id);
        return response()->json([
            'tanggal' => $surat->tanggal_surat,
            'isi' => $surat->perihal,
        ]);
    }
   
}
