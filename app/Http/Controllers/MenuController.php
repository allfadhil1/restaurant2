<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        return view('menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable',
            'gambar' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);


        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('gambar', 'public');
        }

        Menu::create($validated);
        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        return view('menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable',
            'gambar' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('gambar', 'public');
        }

        $menu->update($validated);
        return redirect()->route('menu.index')->with('success', 'Menu berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus!');
    }
}
