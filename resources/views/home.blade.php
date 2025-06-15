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

    <title>Klassy Restaurant - Restaurant HTML Template</title>
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
                                <a href="javascript:;">Cart</a>
                                <ul>
                                    <li><a href="{{ route('bookings.index') }}">My Reservation</a></li>
                                    
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
                            <h4>Klassy Restaurant</h4>
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

   <!-- ***** About Section Starts ***** -->
<style>
    .about-section {
        padding: 80px 0;
        background-color: #fffaf7;
    }

    .about-section .heading {
        margin-bottom: 30px;
    }

    .about-section h6 {
        color: #fb5849;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 14px;
        letter-spacing: 1.5px;
    }

    .about-section h2 {
        font-size: 36px;
        font-weight: 700;
        color: #333;
        margin-top: 10px;
    }

    .about-section p {
        font-size: 16px;
        color: #555;
        line-height: 1.8;
        margin-bottom: 30px;
    }

    .about-gallery {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }

    .about-gallery img {
        width: 100%;
        border-radius: 10px;
        object-fit: cover;
        height: 80px;
        transition: transform 0.3s ease;
    }

    .about-gallery img:hover {
        transform: scale(1.05);
    }

    .about-video {
        position: relative;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    }

    .about-video img {
        width: 100%;
        height: auto;
        display: block;
    }

    .about-video a {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 32px;
        color: white;
        background-color: rgba(0, 0, 0, 0.5);
        padding: 14px 18px;
        border-radius: 50%;
        transition: background 0.3s ease;
    }

    .about-video a:hover {
        background-color: rgba(251, 88, 73, 0.9);
    }
</style>

<section class="about-section" id="about">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="heading">
                    <h6>About Us</h6>
                    <h2>We Leave A Delicious Memory For You</h2>
                </div>
                <p>Klassy Cafe adalah restoran dengan nuansa elegan dan modern yang menghadirkan pengalaman
                    bersantap istimewa dalam suasana yang nyaman dan stylish.
                    <br><br>
                    Menyajikan beragam hidangan lezat dari berbagai cita rasa, mulai dari menu klasik hingga kreasi
                    kontemporer, Klassy Cafe cocok untuk berkumpul bersama keluarga, teman, maupun pertemuan bisnis.
                </p>
                <div class="about-gallery">
                    <div class="col"><img src="assets/images/about-thumb-01.jpg" alt=""></div>
                    <div class="col"><img src="assets/images/about-thumb-02.jpg" alt=""></div>
                    <div class="col"><img src="assets/images/about-thumb-03.jpg" alt=""></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-video">
                    <a href="http://youtube.com" target="_blank" rel="noopener"><i class="fa fa-play"></i></a>
                    <img src="assets/images/about-video-bg.jpg" alt="Video Background">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** About Section Ends ***** -->

    <!-- ***** Menu Area Ends ***** -->
<section class="custom-menu-section" id="menu">
    <style>
        .custom-menu-section {
            background-color: #fffaf9;
            padding: 70px 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .custom-menu-heading {
            text-align: center;
            margin-bottom: 40px;
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

        .tab-btn-group {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 40px;
        }

        .tab-btn {
            padding: 12px 20px;
            background-color: #fff;
            border: 2px solid #fb5849;
            color: #fb5849;
            border-radius: 12px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s;
            text-align: center;
            min-width: 100px;
        }

        .tab-btn:hover,
        .tab-btn.active {
            background-color: #fb5849;
            color: #fff;
        }

        .custom-menu-list {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
            max-width: 1000px;
            margin: 0 auto;
        }

        .custom-menu-card {
            background: #fff;
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 16px;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .custom-menu-card:hover {
            transform: translateY(-4px);
        }

        .custom-menu-card img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 12px;
            flex-shrink: 0;
        }

        .custom-menu-details {
            flex-grow: 1;
        }

        .custom-menu-title {
            font-size: 18px;
            font-weight: 700;
            color: #333;
            margin-bottom: 6px;
        }

        .custom-menu-description {
            font-size: 14px;
            color: #666;
            margin-bottom: 8px;
        }

        .custom-menu-price {
            background-color: #fb5849;
            color: #fff;
            padding: 8px 20px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 15px;
            min-width: 120px;
            text-align: center;
        }

        .btn-menu-all {
            background-color: #fb5849;
            color: #fff;
            padding: 12px 28px;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.2s ease;
            display: inline-block;
        }

        .btn-menu-all:hover {
            background-color: #e44b3d;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .custom-menu-list {
                grid-template-columns: 1fr;
            }

            .custom-menu-card {
                flex-direction: column;
                text-align: center;
            }

            .custom-menu-card img {
                margin-bottom: 10px;
            }

            .custom-menu-price {
                margin-top: 8px;
            }
        }
    </style>

    <div class="custom-menu-heading">
        <h6>This Week’s Special</h6>
        <h2>Meal Offers</h2>
    </div>

    <div class="tab-btn-group">
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

    <div class="custom-menu-list">
        @forelse($menus as $menu)
            <div class="custom-menu-card">
                @if($menu->gambar)
                    <img src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->nama }}">
                @endif
                <div class="custom-menu-details">
                    <div class="custom-menu-title">{{ $menu->nama }}</div>
                    <div class="custom-menu-description">
                        {{ \Illuminate\Support\Str::words($menu->deskripsi, 10, '...') }}
                    </div>
                </div>
                <div class="custom-menu-price">
                    Rp {{ number_format($menu->harga, 0, ',', '.') }}
                </div>
            </div>
        @empty
            <p style="grid-column: 1 / -1; text-align:center; color: #888;">Tidak ada menu untuk kategori ini.</p>
        @endforelse
    </div>

    <div style="text-align: center; margin-top: 40px;">
        <a href="{{ url('/menu') }}" class="btn-menu-all">🍽️ Lihat Menu Lengkap</a>
    </div>
</section>

<!-- ***** Chefs Area Starts ***** -->
<section class="section" id="chefs">
    <style>
        .chef-scroll-wrapper {
            display: flex;
            gap: 20px;
            overflow-x: auto;
            padding: 20px 0;
            scroll-snap-type: x mandatory;
        }

        .chef-scroll-wrapper::-webkit-scrollbar {
            height: 10px;
        }

        .chef-scroll-wrapper::-webkit-scrollbar-thumb {
            background-color: #fb5849;
            border-radius: 10px;
        }

        .chef-card {
            background-color: #fff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s, box-shadow 0.3s;
            width: 300px;
            flex: 0 0 auto;
            scroll-snap-align: start;
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

        /* Section Title Styling */
        .section-heading h6 {
            font-size: 16px;
            color: #fb5849;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .section-heading h2 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .section-heading {
            margin-bottom: 20px;
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

        <div class="chef-scroll-wrapper">
            @foreach ($chefs as $chef)
                <div class="chef-card text-center">
                    <div class="chef-thumb">
                        @if($chef->gambar)
                            <img src="{{ asset('storage/' . $chef->gambar) }}" alt="{{ $chef->nama }}">
                        @endif
                    </div>
                    <div class="chef-info">
                        <h4 class="chef-name">{{ $chef->nama }}</h4>
                        <p class="chef-specialty">{{ $chef->specialty }}</p>
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