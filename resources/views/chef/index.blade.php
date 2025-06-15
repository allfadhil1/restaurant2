@extends('layouts.app')

<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #fef9f8;
    }

    .admin-navbar {
        background-color: #fb5849;
        padding: 15px 0;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        position: sticky;
        top: 0;
        z-index: 999;
    }

    .container-navbar {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
    }

    .nav-links {
        list-style: none;
        display: flex;
        gap: 20px;
        margin: 0;
        padding: 0;
    }

    .nav-links li a {
        color: white;
        font-weight: 500;
        text-decoration: none;
        padding: 8px 12px;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .nav-links li a:hover {
        background-color: #e04d40;
    }

    .nav-links li a.active-manual {
        background-color: #ffffff;
        color: #fb5849;
        font-weight: bold;
        border-radius: 8px;
        box-shadow: 0 0 0 2px #ffffff, 0 0 0 4px #fb5849;
        padding: 10px 15px;
    }

    .content-container {
        margin: 30px auto;
        max-width: 1100px;
        padding: 0 20px;
    }

    .section-heading {
        margin-bottom: 30px;
        text-align: center;
    }

    .section-heading h6 {
        font-size: 18px;
        color: #fb5849;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 600;
    }

    .chef-card {
        background-color: white;
        border: 1px solid #fbd4cf;
        border-radius: 16px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.05);
        overflow: hidden;
        transition: 0.3s ease-in-out;
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .chef-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
    }

    .chef-image {
        width: 100%;
        height: 220px;
        object-fit: cover;
    }

    .chef-content {
        padding: 20px;
        flex: 1;
    }

    .chef-name {
        font-size: 20px;
        font-weight: bold;
        color: #fb5849;
        margin-bottom: 8px;
    }

    .chef-specialty {
        font-size: 14px;
        color: #555;
        margin-bottom: 16px;
    }

    .action-buttons {
        display: flex;
        justify-content: space-between;
        gap: 10px;
    }

    .btn-add,
    .btn-edit,
    .btn-delete {
        padding: 8px 16px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        text-align: center;
        display: inline-block;
        transition: 0.3s;
        text-decoration: none;
    }

    .btn-add {
        background-color: #fb5849;
        color: white;
        margin-bottom: 20px;
    }

    .btn-add:hover {
        background-color: #e04d40;
    }

    .btn-edit {
        background-color: #fb5849;
        color: white;
    }

    .btn-edit:hover {
        background-color: #e04d40;
    }

    .btn-delete {
        background-color: #ef4444;
        color: white;
    }

    .btn-delete:hover {
        background-color: #dc2626;
    }

    .alert-success {
        background-color: #ffe8e5;
        color: #fb5849;
        border-left: 4px solid #fb5849;
        padding: 12px 16px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-weight: 500;
    }

</style>

<nav class="admin-navbar">
    <div class="container-navbar">
        <ul class="nav-links">
            <li><a href="{{ route('menu.index') }}">Menu</a></li>
            <li><a href="{{ route('chef.index') }}" class="active-manual">Chef</a></li>
            <li><a href="{{ route('bookings.index') }}">Booking</a></li>
        </ul>
    </div>
</nav>

@section('content')
<main class="content-container">

    @auth
        @if (Auth::user()->usertype == 1)
            <a href="{{ route('chef.create') }}" class="btn-add">+ Tambah Chef</a>
        @endif
    @endauth

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (!Auth::check() || Auth::user()->usertype != 1)
        <div class="section-heading">
            <h6>Our Chefs</h6>
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($chefs as $chef)
            <div class="chef-card">
                @if($chef->gambar)
                    <img src="{{ asset('storage/' . $chef->gambar) }}" alt="{{ $chef->nama }}" class="chef-image">
                @endif

                <div class="chef-content">
                    <h5 class="chef-name">{{ $chef->nama }}</h5>
                    <p class="chef-specialty">{{ $chef->specialty }}</p>

                    @auth
                        @if (Auth::user()->usertype == 1)
                            <div class="action-buttons">
                                <a href="{{ route('chef.edit', $chef) }}" class="btn-edit">Edit</a>

                                <form action="{{ route('chef.destroy', $chef) }}" method="POST"
                                      onsubmit="return confirm('Hapus chef ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">Hapus</button>
                                </form>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        @endforeach
    </div>
</main>
@endsection
