<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\SuratKeluar;

class SuratKeluarController extends Controller
{
    public function index()
    {
        {
            $suratKeluar = SuratKeluar::with('category')->get(); // Memuat data relasi category
            return view('surat_keluar.index', compact('suratKeluar'));
        }
    }

    public function create()
    {
   
        return view('surat_keluar.create',[
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required|numeric|unique:surat_keluar',
            'tanggal_surat' => 'required|date',
            'alamat' => 'required|string|max:255',
            'penerima' => 'required|string|max:255',
            'categories_id' => 'required|exists:categories,id',
            'perihal' => 'required|string',
        ]);

        SuratKeluar::create($request->all());
        return redirect()->route('surat_keluar.index')->with('success', 'Surat keluar berhasil disimpan.');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $suratKeluar = SuratKeluar::findOrFail($id);
        return view('surat_keluar.edit', compact('suratKeluar','categories'));
    }

    public function update(Request $request, $id)
    {
        $suratKeluar = SuratKeluar::findOrFail($id);
        $suratKeluar->update($request->all());
        return redirect()->route('surat_keluar.index');
    }

    public function destroy($id)
    {
        $suratKeluar = SuratKeluar::findOrFail($id);
        $suratKeluar->delete();
        return redirect()->route('surat_keluar.index');
    }

    public function show($id)
    {
        $surat = SuratKeluar::with('category')->findOrFail($id);
        return response()->json([
            'tanggal' => $surat->tanggal_surat,
            'kode_arsip' => $surat->category->name,
            'isi' => $surat->perihal,
        ]);
    }
}
