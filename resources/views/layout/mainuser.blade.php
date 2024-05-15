<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        /* CSS Styling for Navbar and Carousel */
        .navbar {
            background-color: #ffffff;
        }

        .navbar-brand {
            color: #fff;
            font-size: 25px;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 2px;
        }

        .navbar-nav .nav-link {
            color: #fff;
            padding: .2rem 1rem;
        }

        .navbar-nav .active>.nav-link,
        .navbar-nav .nav-link.active,
        .navbar-nav .nav-link.show,
        .navbar-nav .show>.nav-link {
            color: #fff;
        }

        .navbar-toggler {
            background: #fff;
            padding: 1px 5px;
            font-size: 18px;
            line-height: 0.3;
        }

        .navbar-light .navbar-nav .nav-link:focus,
        .navbar-light .navbar-nav .nav-link:hover {
            color: #fff;
        }

        .carousel-item {
            width: 100%;
            height: 90vh;
            min-height: 300px;
            background: no-repeat center center scroll;
            background-size: cover;
        }

        .carousel-caption {
            bottom: 270px;
        }

        .carousel-caption h5 {
            font-size: 45px;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-top: 25px;
        }

        .carousel-caption p {
            width: 75%;
            margin: auto;
            font-size: 18px;
            line-height: 1.9;
        }

        .about-us {
            background-color: #f8f9fa;
            /* Background color for About Us section */
            padding: 50px 0;
        }

        .about-us h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .about-us p {
            text-align: center;
            font-size: 20px;
            line-height: 1.6;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            /* Menggunakan Montserrat untuk seluruh teks di body */
            /* Ukuran font default */
        }
        .navbar {
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1); /* Tambahkan bayangan dengan warna rgba(0, 0, 0, 0.1) */
    }
        .navbar-brand,
        .nav-link {
            font-family: 'Montserrat', sans-serif;
            /* Menggunakan Montserrat untuk teks di navbar */
            font-size: 14px;
            /* Ukuran font untuk navbar */
        }
        .welcome-message {
        background-color: #148E8E;
        color: #ffffff;
        padding: 5px;
        text-align: center;
    }
        .navbar-nav .nav-link.active {
    font-weight: bold;
}
.dropdown-item:hover {
        background-color: #148E8E !important; /* Warna latar belakang saat tombol dihover */
        color: #fff !important; /* Warna teks saat tombol dihover */
    }

    .dropdown-item.active,
    .dropdown-item:active {
        background-color: #148E8E !important; /* Warna latar belakang saat tombol diklik */
        color: #fff !important; /* Warna teks saat tombol diklik */
    }

    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Forester Jakal</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <!-- Add more navbar items as needed -->
                </ul>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Forester Jakal</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ">
                        <a class="nav-link " style="color: #303030" href="{{ url('/user/beranda') }}">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle ml-4" style="color: #303030" href="#" id="navbarDropdown" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            Produk
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('produkuser') }}">Semua Produk</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('produkterbaru') }}">Produk Terbaru</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link  dropdown-toggle ml-4" style="color: #303030" href="#" id="navbarDropdown" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            Promo
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('promo') }}">Promo Menarik</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">VIP</a>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link ml-4" style="color: #303030" href="{{ route('galeri') }}">Galleri</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link ml-4" style="color: #303030" href="{{ route('index') }}">Kritik Saran</a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link ml-4" style="color: #303030" href="{{ route('tentangkami') }}">Tentang Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>

    <script>
       $(document).ready(function() {
    var currentUrl = window.location.href;

    $('.navbar-nav .nav-link').each(function() {
        var linkUrl = $(this).attr('href');

        if (currentUrl.indexOf(linkUrl) !== -1) {
            $(this).addClass('active');
        }
    });

    // Menambahkan efek hover pada teks dropdown
    $('.nav-link').mouseenter(function() {
        $(this).css('color', '#148E8E'); // Mengubah warna teks saat hover
    });
    $('.nav-link').mouseleave(function() {
        $(this).css('color', '#303030'); // Mengembalikan warna teks ke aslinya saat tidak hover
    });
    $('.dropdown-item').mouseenter(function() {
        $(this).css('color', '#148E8E'); // Mengubah warna teks saat hover
    });

    $('.dropdown-item').mouseleave(function() {
        $(this).css('color', ''); // Mengembalikan warna teks ke aslinya saat tidak hover
    });

    // Script untuk dropdown menu
    $('.nav-link.dropdown-toggle').mouseenter(function() {
        $(this).addClass('show');
        $(this).next('.dropdown-menu').addClass('show');
    });

    $('.nav-link.dropdown-toggle').mouseleave(function() {
        $(this).removeClass('show');
        $(this).next('.dropdown-menu').removeClass('show');
    });

    $('.dropdown-menu').mouseenter(function() {
        $(this).addClass('show');
    });

    $('.dropdown-menu').mouseleave(function() {
        $(this).removeClass('show');
        $(this).prev('.dropdown-toggle').removeClass('show');
    });
});
    </script>

    @include('sweetalert::alert')
</body>

</html>
