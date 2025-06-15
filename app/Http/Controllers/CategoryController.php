<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('menus')->latest()->get();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255|unique:categories,nama',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean'
        ]);

        $validated['slug'] = Str::slug($validated['nama']);
        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('kategori', 'public');
        }

        Category::create($validated);

        return redirect()->route('category.index')
                        ->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function show(Category $category)
    {
        $category->load('menus');
        return view('category.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255|unique:categories,nama,' . $category->id,
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean'
        ]);

        $validated['slug'] = Str::slug($validated['nama']);
        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('gambar')) {
            if ($category->gambar) {
                Storage::disk('public')->delete($category->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('kategori', 'public');
        }

        $category->update($validated);

        return redirect()->route('category.index')
                        ->with('success', 'Kategori berhasil diupdate!');
    }

    public function destroy(Category $category)
    {
        if ($category->menus()->count() > 0) {
            return redirect()->route('category.index')
                           ->with('error', 'Kategori tidak dapat dihapus karena masih memiliki menu.');
        }

        if ($category->gambar) {
            Storage::disk('public')->delete($category->gambar);
        }
        
        $category->delete();

        return redirect()->route('category.index')
                        ->with('success', 'Kategori berhasil dihapus!');
    }
}