<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chef;

class ChefController extends Controller
{
    public function index()
    {
        $chefs = Chef::all();
        return view('chef.index', compact('chefs'));
    }

    public function create()
    {
        return view('chef.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
        ]);

        Chef::create($request->all());

        return redirect()->route('chef.index')->with('success', 'Chef berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $chef = Chef::findOrFail($id);
        return view('chef.edit', compact('chef'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
        ]);

        $chef = Chef::findOrFail($id);
        $chef->update($request->all());

        return redirect()->route('chef.index')->with('success', 'Chef berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $chef = Chef::findOrFail($id);
        $chef->delete();

        return redirect()->route('chef.index')->with('success', 'Chef berhasil dihapus.');
    }
}

?>