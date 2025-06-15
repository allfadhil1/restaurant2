<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chefs = Chef::all();
        return view('chef.index', compact('chefs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('chef.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
            'gambar' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('gambar', 'public');
        }

        Chef::create($validated);
        return redirect()->route('chef.index')->with('success', 'Chef berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Chef $chef)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chef $chef)
    {
        return view('chef.edit', compact('chef'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chef $chef)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
            'gambar' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('gambar', 'public');
        }

        $chef->update($validated);
        return redirect()->route('chef.index')->with('success', 'Chef berhasil diupdate!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chef $chef)
    {
        $chef->delete();
        return redirect()->route('chef.index')->with('success', 'Chef berhasil dihapus!');
    }
}
