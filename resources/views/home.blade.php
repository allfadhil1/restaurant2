<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <title>Klassy Cafe - Restaurant HTML Template</title>
    <!-- TemplateMo 558 Klassy Cafe https://templatemo.com/tm-558-klassy-cafe -->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/klassy-logo.png" alt="Klassy Cafe Logo">

                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>

                            <!-- `
                            <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down Page 1</a></li>
                                    <li><a href="#">Drop Down Page 2</a></li>
                                    <li><a href="#">Drop Down Page 3</a></li>
                                </ul>
                            </li>
                        -->
                            <li class="scroll-to-section">
                                @if (Auth::check() && Auth::user()->usertype == 1)
                                    <a href="{{ route('menu.index') }}">Menu</a>
                                @else
                                    <a href="#menu">Menu</a>
                                @endif
                            </li>
                            <li class="scroll-to-section"><a href="#chefs">Chefs</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="{{ route('bookings.index') }}">My Reservation</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a href="#">Features Page 4</a></li>
                                </ul>
                            </li>
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="#reservation">Make A Reservation</a></li>
                            @if (Route::has('login'))
                                @auth
                                    <li class="scroll-to-section"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                @else
                                    <li class="scroll-to-section"><a href="{{ route('login') }}">Log in</a></li>
                                    @if (Route::has('register'))
                                        <li class="scroll-to-section"><a href="{{ route('register') }}">Register</a></li>
                                    @endif
                                @endauth
                            @endif
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="left-content">
                        <div class="inner-content">
                            <h4>Klassy Cafe</h4>
                            <h6>THE BEST EXPERIENCE</h6>
                            <div class="main-white-button scroll-to-section">
                                <a href="#reservation">Make A Reservation</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="main-banner header-text">
                        <div class="Modern-Slider">
                            <!-- Item -->
                            <div class="item">
                                <div class="img-fill">
                                    <img src="assets/images/slide-01.jpg" alt="">
                                </div>
                            </div>
                            <!-- // Item -->
                            <!-- Item -->
                            <div class="item">
                                <div class="img-fill">
                                    <img src="assets/images/slide-02.jpg" alt="">
                                </div>
                            </div>
                            <!-- // Item -->
                            <!-- Item -->
                            <div class="item">
                                <div class="img-fill">
                                    <img src="assets/images/slide-03.jpg" alt="">
                                </div>
                            </div>
                            <!-- // Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** About Area Starts ***** -->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>About Us</h6>
                            <h2>We Leave A Delicious Memory For You</h2>
                        </div>
                        <p>Klassy Cafe adalah restoran dengan nuansa elegan dan modern yang menghadirkan pengalaman
                            bersantap istimewa dalam suasana yang nyaman dan stylish. <br> <br>Menyajikan beragam
                            hidangan lezat dari berbagai cita rasa, mulai dari menu klasik hingga kreasi kontemporer,
                            Klassy Cafe cocok untuk berkumpul bersama keluarga, teman, maupun pertemuan bisnis.</p>
                        <div class="row">
                            <div class="col-4">
                                <img src="assets/images/about-thumb-01.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img src="assets/images/about-thumb-02.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img src="assets/images/about-thumb-03.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="right-content">
                        <div class="thumb">
                            <a rel="nofollow" href="http://youtube.com"><i class="fa fa-play"></i></a>
                            <img src="assets/images/about-video-bg.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** About Area Ends ***** -->

    <section class="custom-menu-section" id="menu">
        <br>
        <style>
            .custom-menu-section {
                background-color: #fffaf9;
                padding: 70px 20px;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }

            .custom-menu-heading {
                max-width: 1200px;
                margin: 0 auto 50px;
                text-align: center;
            }

            .custom-menu-heading h6 {
                color: #fb5849;
                font-size: 15px;
                font-weight: bold;
                margin-bottom: 8px;
                letter-spacing: 1px;
                text-transform: uppercase;
            }

            .custom-menu-heading h2 {
                font-size: 32px;
                font-weight: 700;
                color: #333;
                line-height: 1.4;
            }

            .custom-tab-menu {
                display: flex;
                justify-content: center;
                gap: 30px;
                margin-bottom: 30px;
            }

            .tab-btn {
                background-color: #fffaf9;
                border: none;
                padding: 10px 15px;
                border-radius: 12px;
                cursor: pointer;
                text-align: center;
                transition: all 0.3s;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .tab-btn img.icon {
                width: 40px;
                height: 40px;
                margin-bottom: 6px;
            }

            .tab-btn span {
                font-weight: 600;
                font-size: 14px;
                color: #444;
            }

            .tab-btn.active {
                background-color: #fdeae7;
            }

            .custom-menu-wrapper {
                max-width: 1200px;
                margin: 0 auto;
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 24px;
            }

            .custom-menu-card {
                background: #fff;
                border-radius: 16px;
                overflow: hidden;
                border: 1px solid #f3f3f3;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                cursor: pointer;
                display: flex;
                flex-direction: column;
            }

            .custom-menu-card:hover {
                transform: translateY(-6px);
                box-shadow: 0 12px 24px rgba(251, 88, 73, 0.2);
            }

            .custom-menu-image {
                width: 100%;
                height: 200px;
                object-fit: cover;
                border-bottom: 1px solid #eee;
            }

            .custom-menu-content {
                padding: 20px;
                display: flex;
                flex-direction: column;
                flex: 1;
            }

            .custom-menu-title {
                font-size: 20px;
                font-weight: 600;
                color: #fb5849;
                margin-bottom: 6px;
            }

            .custom-menu-price {
                font-size: 17px;
                font-weight: bold;
                color: #333;
                margin-bottom: 12px;
            }

            .custom-menu-description {
                font-size: 14px;
                color: #666;
                line-height: 1.5;
                flex-grow: 1;
                overflow: hidden;
                display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
            }

            .btn-menu-all {
                display: inline-block;
                padding: 12px 24px;
                background: transparent;
                border: 2px solid #fb5849;
                border-radius: 30px;
                font-size: 16px;
                color: #fb5849;
                text-decoration: none;
                transition: all 0.3s;
                margin-top: 30px;
            }

            .btn-menu-all:hover {
                background-color: #fb5849;
                color: #fff;
            }
        </style>

        <div class="custom-menu-heading text-center mb-6">
            <h6 class="text-sm uppercase tracking-widest text-gray-400">This Week’s Special</h6>
            <h2 class="text-3xl font-bold text-[#fb5849]">Meal Offers</h2>
        </div>

        <div class="flex flex-wrap gap-4 mb-6">
            <a href="{{ url('/') }}" class="tab-btn {{ request('category') == '' ? 'active' : '' }}">
                Semua
            </a>
            @foreach($categories as $cat)
                <a href="{{ url('/') }}?category={{ $cat->id }}"
                    class="tab-btn {{ request('category') == $cat->id ? 'active' : '' }}">
                    {{ $cat->name }}
                </a>

            @endforeach
        </div>


        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($menus as $menu)
                <div class="bg-white border border-[#fb5849]/30 rounded-lg shadow-lg overflow-hidden">
                    @if($menu->gambar)
                        <img src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->nama }}"
                            class="w-full h-48 object-cover">
                    @endif

                    <div class="p-4">
                        <h5 class="text-xl font-semibold text-[#fb5849] mb-2">{{ $menu->nama }}</h5>
                        <p class="text-sm text-gray-500 mb-2">Kategori: {{ $menu->category->name ?? '-' }}</p>
                        <p class="text-lg font-bold text-[#fb5849] mb-2">Rp {{ number_format($menu->harga, 0, ',', '.') }}
                        </p>
                        <p class="text-gray-600 text-sm mb-4">{{ $menu->deskripsi }}</p>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center text-gray-500">
                    Tidak ada menu untuk kategori ini.
                </div>
            @endforelse
        </div>

        <div style="text-align: center;">
            <a href="{{ url('/menu') }}" class="btn-menu-all">Lihat Menu Lengkap</a>
        </div>
    </section>

    <!-- ***** Chefs Area Starts ***** -->
    <section class="section" id="chefs">
        <style>
            .chef-card {
                background-color: #fff;
                border-radius: 16px;
                overflow: hidden;
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
                transition: transform 0.3s, box-shadow 0.3s;
                max-width: 320px;
                width: 100%;
                margin-bottom: 30px;
            }

            .chef-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
            }

            .chef-thumb img {
                width: 100%;
                height: 300px;
                object-fit: cover;
                border-top-left-radius: 16px;
                border-top-right-radius: 16px;
            }

            .chef-info {
                padding: 20px;
            }

            .chef-name {
                font-size: 22px;
                font-weight: bold;
                margin-bottom: 8px;
            }

            .chef-specialty {
                font-size: 16px;
                color: #888;
            }
        </style>

        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 text-center">
                    <div class="section-heading">
                        <h6>Our Chefs</h6>
                        <h2>We offer the best ingredients for you</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                @foreach ($chefs as $chef)
                    <div class="col-md-6 col-lg-4 d-flex justify-content-center">
                        <div class="chef-card text-center">
                            <div class="chef-thumb">
                                @if($chef->gambar)
                                    <img src="{{ asset('storage/' . $chef->gambar) }}" alt="{{ $chef->nama }}"
                                        class="custom-chef-image">
                                @endif

                            </div>
                            <div class="chef-info">
                                <h4 class="chef-name">{{ $chef->nama }}</h4>

                                <p class="chef-specialty">{{ $chef->specialty }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ***** Chefs Area Ends ***** -->

    <!-- ***** Reservation Us Area Starts ***** -->
    <section class="reservation-section" id="reservation">
        <style>
            .reservation-section {
                padding: 60px 20px;
                background-color: #f7f7f7;
                font-family: 'Arial', sans-serif;
            }

            .reservation-container {
                max-width: 1100px;
                margin: auto;
                background: #fff;
                border-radius: 12px;
                overflow: hidden;
                display: flex;
                flex-wrap: wrap;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.08);
            }

            .reservation-info {
                flex: 1 1 35%;
                background-color: #fb5849;
                color: white;
                padding: 40px;
                box-sizing: border-box;
            }

            .reservation-form {
                flex: 1 1 65%;
                padding: 40px;
                box-sizing: border-box;
            }

            .reservation-info h6 {
                text-transform: uppercase;
                font-size: 14px;
                margin-bottom: 10px;
                color: #fff;
            }

            .reservation-info h2 {
                font-size: 26px;
                margin-bottom: 20px;
                color: #fff;
            }

            .reservation-info p {
                font-size: 14px;
                color: #fff;
                margin-bottom: 20px;
            }

            .contact-box {
                margin-bottom: 20px;
            }

            .contact-box i {
                color: white;
                margin-right: 8px;
            }

            .contact-box h4 {
                margin: 5px 0;
                font-size: 16px;
                color: white;
            }

            .contact-box a {
                text-decoration: none;
                color: white;
                display: block;
                font-size: 14px;
            }

            .form-title {
                font-size: 20px;
                margin-bottom: 20px;
                font-weight: bold;
            }

            .form-group {
                margin-bottom: 16px;
            }

            .form-group label {
                display: block;
                font-weight: 500;
                margin-bottom: 6px;
            }

            .form-group input,
            .form-group select {
                width: 100%;
                padding: 10px 12px;
                font-size: 14px;
                border-radius: 6px;
                border: 1px solid #ccc;
            }

            .menu-list {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 12px;
                max-height: 200px;
                overflow-y: auto;
                border: 1px solid #ddd;
                border-radius: 6px;
                padding: 10px;
                margin-bottom: 15px;
            }

            .menu-item {
                display: flex;
                justify-content: space-between;
                align-items: center;
                font-size: 14px;
            }

            .menu-item input {
                width: 60px;
                padding: 4px;
                font-size: 14px;
            }

            .submit-btn {
                background-color: #fb5849;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 6px;
                font-size: 16px;
                cursor: pointer;
                width: 100%;
            }

            .submit-btn:hover {
                background-color: #e04b3c;
            }

            @media (max-width: 768px) {

                .reservation-info,
                .reservation-form {
                    flex: 1 1 100%;
                }

                .menu-list {
                    grid-template-columns: 1fr;
                }
            }

            .text-danger {
                color: red;
                font-size: 13px;
            }

            .text-success {
                color: green;
                margin-bottom: 16px;
            }
        </style>

        <div class="reservation-container">
            <div class="reservation-info">
                <h6>Contact Us</h6>
                <h2>Reservasi Meja atau Datang Langsung</h2>
                <p>Kami siap melayani Anda untuk reservasi meja maupun kunjungan langsung ke cafe kami.</p>

                <div class="contact-box">
                    <i class="fa fa-phone"></i>
                    <h4>Phone Numbers</h4>
                    <a href="#">080-090-0990</a>
                    <a href="#">080-090-0880</a>
                </div>

                <div class="contact-box">
                    <i class="fa fa-envelope"></i>
                    <h4>Emails</h4>
                    <a href="#">hello@company.com</a>
                    <a href="#">info@company.com</a>
                </div>
            </div>

            <div class="reservation-form">
                @if(session('success'))
                    <div class="text-success">{{ session('success') }}</div>
                @endif
                <form id="contact" action="{{ route('bookings.store') }}" method="post">
                    @csrf
                    <div class="form-title">Table Reservation</div>

                    <div class="form-group">
                        <label for="name">Nama:</label>
                        <input name="name" type="text" id="name" value="{{ Auth::check() ? Auth::user()->name : '' }}"
                            {{ Auth::check() ? 'readonly' : 'required' }} required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input name="email" type="email" id="email"
                            value="{{ Auth::check() ? Auth::user()->email : '' }}" {{ Auth::check() ? 'readonly' : 'required' }} required>
                    </div>

                    <div class="form-group">
                        <label for="table_id">Pilih Meja:</label>
                        <select name="table_id" id="table_id" required>
                            <option value="">-- Pilih Meja --</option>
                            @foreach($tables as $table)
                                <option value="{{ $table->id }}">{{ $table->name }}</option>
                            @endforeach
                        </select>
                        @error('table_id') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label>Menu:</label>
                        <div class="menu-list">
                            @foreach ($menus as $menu)
                                <div class="menu-item">
                                    <span>{{ $menu->nama }} <small>(Rp
                                            {{ number_format($menu->harga, 0, ',', '.') }})</small></span>
                                    <input type="number" name="menus[{{ $menu->id }}][quantity]" value="0" min="0">
                                </div>
                            @endforeach
                        </div>
                        @error('menus') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="start_time">Mulai Booking:</label>
                        <input type="datetime-local" name="start_time" id="start_time" required>
                        @error('start_time') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="end_time">Selesai Booking:</label>
                        <input type="datetime-local" name="end_time" id="end_time" required>
                        @error('end_time') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" class="submit-btn">Make A Reservation</button>
                </form>
            </div>
        </div>
    </section>
    <!-- ***** Reservation Us Area Ends ***** -->


    <!-- ***** Menu Area Starts ***** -->
    <section class="section" id="offers">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4 text-center">
                    <div class="section-heading">
                        <h6>Klassy Week</h6>
                        <h2>This Week’s Special Meal Offers</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row" id="tabs">
                        <div class="col-lg-12">
                            <div class="heading-tabs">
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-3">
                                        <ul>
                                            <li><a href='#tabs-1'><img src="assets/images/tab-icon-01.png"
                                                        alt="">Breakfast</a></li>
                                            <li><a href='#tabs-2'><img src="assets/images/tab-icon-02.png"
                                                        alt="">Lunch</a></a></li>
                                            <li><a href='#tabs-3'><img src="assets/images/tab-icon-03.png"
                                                        alt="">Dinner</a></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <section class='tabs-content'>
                                <article id='tabs-1'>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="left-list">
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-01.png" alt="">
                                                            <h4>Fresh Chicken Salad</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing
                                                                elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$10.50</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-02.png" alt="">
                                                            <h4>Orange Juice</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing
                                                                elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$8.50</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-03.png" alt="">
                                                            <h4>Fruit Salad</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing
                                                                elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$9.90</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="right-list">
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-04.png" alt="">
                                                            <h4>Eggs Omelette</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing
                                                                elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$6.50</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-05.png" alt="">
                                                            <h4>Dollma Pire</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing
                                                                elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$5.00</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-06.png" alt="">
                                                            <h4>Omelette & Cheese</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing
                                                                elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$4.10</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article id='tabs-2'>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="left-list">
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-04.png" alt="">
                                                            <h4>Eggs Omelette</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing
                                                                elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$14</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-05.png" alt="">
                                                            <h4>Dollma Pire</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing
                                                                elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$18</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-06.png" alt="">
                                                            <h4>Omelette & Cheese</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing
                                                                elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$22</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="right-list">
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-01.png" alt="">
                                                            <h4>Fresh Chicken Salad</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing
                                                                elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$10</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-02.png" alt="">
                                                            <h4>Orange Juice</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing
                                                                elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$20</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-03.png" alt="">
                                                            <h4>Fruit Salad</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing
                                                                elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$30</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article id='tabs-3'>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="left-list">
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-05.png" alt="">
                                                            <h4>Eggs Omelette</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing
                                                                elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$14</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-03.png" alt="">
                                                            <h4>Orange Juice</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing
                                                                elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$18</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-02.png" alt="">
                                                            <h4>Fruit Salad</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing
                                                                elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$10</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="right-list">
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-06.png" alt="">
                                                            <h4>Fresh Chicken Salad</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing
                                                                elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$8.50</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-01.png" alt="">
                                                            <h4>Dollma Pire</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing
                                                                elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$9</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="tab-item">
                                                            <img src="assets/images/tab-item-04.png" alt="">
                                                            <h4>Omelette & Cheese</h4>
                                                            <p>Lorem ipsum dolor sit amet, consectetur koit adipiscing
                                                                elit, sed do.</p>
                                                            <div class="price">
                                                                <h6>$11</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Chefs Area Ends ***** -->

    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <div class="right-text-content">
                        <ul class="social-icons">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="logo">
                        <a href="index.html"><img src="assets/images/white-logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12">
                    <div class="left-text-content">
                        <p>© Copyright Klassy Cafe Co.

                            <br>Design: TemplateMo
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/isotope.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script>
        const menus = @json($menus);
        $(function () {
            var selectedClass = "";
            $("p").click(function () {
                selectedClass = $(this).attr("data-rel");
                $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("." + selectedClass).fadeOut();
                setTimeout(function () {
                    $("." + selectedClass).fadeIn();
                    $("#portfolio").fadeTo(50, 1);
                }, 500);

            });
        });

    </script>
</body>

</html>