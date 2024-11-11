<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratMasuk;

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
        SuratMasuk::create($request->all());
        return redirect()->route('surat_masuk.index');
    }

    public function edit($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);
        return view('surat_masuk.edit', compact('suratMasuk'));
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
}
