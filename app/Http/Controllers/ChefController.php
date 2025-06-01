<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chef;

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
        $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
        ]);

        
  Chef::create($request->only('name', 'specialty'));

        Chef::create($request->all());


        return redirect()->route('chef.index')->with('success', 'Chef berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        //

        $chef = Chef::findOrFail($id);
        return view('chef.edit', compact('chef'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('chef.edit', compact('chef'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chef $chef)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
        ]);

 
        $chef->update($request->only('name', 'specialty'));
        return redirect()->route('chefs.index')->with('success', 'Chef berhasil diupdate.');

        $chef = Chef::findOrFail($id);
        $chef->update($request->all());

        return redirect()->route('chef.index')->with('success', 'Chef berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chef $chef)
    {
        $chef->delete();
 
        return redirect()->route('chef.index')->with('success', 'Chef berhasil dihapus.');
    }
}
