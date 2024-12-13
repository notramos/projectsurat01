<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\SuratKeluar;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{
    public function index()
    {
        {
            $suratKeluar = SuratKeluar::all(); // Memuat data relasi category
            return view('surat_keluar.index', compact('suratKeluar'));
        }
    }

    public function create()
    {
   
        return view('surat_keluar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required|numeric|unique:surat_keluar',
            'tanggal_surat' => 'required|date',
            'perihal' => 'required|string',
            'file' => 'required|file|mimes:jpg,png,pdf,docx|max:2048'
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('uploads', 'public'); // Simpan file
        }

        SuratKeluar::create([
        'nomor_surat' => $request->nomor_surat,
        'tanggal_surat' => $request->tanggal_surat,
        'perihal'=> $request->perihal,
        'file_path' => $filePath, // Simpan path file
    ]);
        return redirect()->route('surat_keluar.index')->with('success', 'Surat keluar berhasil disimpan.');
    }

    public function edit($id)
    {

        $suratKeluar = SuratKeluar::findOrFail($id);
        return view('surat_keluar.edit', compact('suratKeluar'));
    }

    public function update(Request $request, $id)
    {
        $suratKeluar = SuratKeluar::findOrFail($id);
        $request->validate([
            'nomor_surat' => 'required|numeric',
            'tanggal_surat' => 'required|date',
            'perihal' => 'required|string',
            'file' => 'nullable|file|mimes:jpg,png,pdf,docx|max:2048'
        ]);

        $suratKeluar->fill($request->except(['file']));

        // Jika ada file baru, simpan dan hapus file lama
        if ($request->hasFile('file')) {
            if ($suratKeluar->file_path && Storage::exists($suratKeluar->file_path)) {
                Storage::delete($suratKeluar->file_path);
            }
            $suratKeluar->file_path = $request->file('file')->store('uploads','public');
        }
    
        $suratKeluar->save();
    
        return redirect()->route('surat_keluar.index')->with('update', 'Surat keluar berhasil diperbarui.');
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
            'isi' => $surat->perihal,
        ]);
    }
}
