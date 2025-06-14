<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Chef;

class HomeController extends Controller
{
    // Menampilkan data menu & chef di halaman home
    public function index()
    {
        $menus = Menu::all();
        $chefs = Chef::all();

        return view('home', compact('menus', 'chefs'));
    }

    // Menampilkan data chef saja di halaman chefs.blade.php
    public function chefs()
    {
        $chefs = Chef::all();
        return view('chefs', compact('chefs'));
    }
}
