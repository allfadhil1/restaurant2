<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Chef;
use App\Models\Table;
use App\Models\Category;

class HomeController extends Controller
{
    // Menampilkan data menu & chef di halaman home
    public function index(Request $request)
    {
        $categories = Category::all();
        $chefs = Chef::all();
        $tables = Table::all();
        $query = Menu::with('category');

        // Jika ada kategori dipilih
        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }

        $menus = $query->get();

        return view('home', compact('menus', 'chefs', 'tables', 'categories'));
    }

    // Menampilkan data chef saja di halaman chefs.blade.php
    public function chefs()
    {
        $chefs = Chef::all();
        return view('chefs', compact('chefs'));
    }
}
