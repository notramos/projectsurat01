<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

    return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {

       $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);
    
        Category::create([
            'name' => $validated['name'],
        ]);
    
        return redirect()->route('category.index')->with('success', 'Kode arsip berhasil ditambahkan!');
        
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfully');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255', // Validasi nama kategori
        ]);
    
        // Cari kategori berdasarkan ID
        $category = Category::findOrFail($id);
    
        // Update nama kategori
        $category->name = $validatedData['name'];
        $category->save(); // Simpan perubahan
    
        return redirect()->route('category.index')->with('success', 'Kategori berhasil diperbarui');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
       return view('categories.index', compact('category'));
    }


}
