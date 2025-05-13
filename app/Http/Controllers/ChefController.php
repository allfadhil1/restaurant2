<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chef;

class ChefController extends Controller
{
    public function index()
    {
        $chefs = Chef::all();
        return view('menu.chef', [
            'chefs' => $chefs,
            'mode' => 'index'
        ]);
    }

    public function create()
    {
        return view('menu.chef', [
            'mode' => 'create',
            'chef' => null
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
        ]);

        Chef::create($request->all());

        return redirect()->route('menu.chef.index')->with('success', 'Chef berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $chef = Chef::findOrFail($id);
        return view('menu.chef', [
            'mode' => 'edit',
            'chef' => $chef
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
        ]);

        $chef = Chef::findOrFail($id);
        $chef->update($request->all());

        return redirect()->route('menu.chef.index')->with('success', 'Chef berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $chef = Chef::findOrFail($id);
        $chef->delete();

        return redirect()->route('menu.chef.index')->with('success', 'Chef berhasil dihapus.');
    }
}

?>