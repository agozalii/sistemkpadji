@extends('layout.mainuser')

@section('judul')
    <strong>Halaman Produk</strong>
@endsection

@section('content')
    <style>
        .btn-image {
            width: 100%;
            height: 120px;
            /* Kurangi tinggi gambar */
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            font-weight: bold;
            font-size: 1.2em;
            /* Naikkan ukuran tulisan */
            background-size: cover;
            background-position: center;
            position: relative;
            overflow: hidden;
        }

        .btn-image::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.5);
            /* Efek gelap pada gambar */
        }

        .btn-image:hover {
            color: #148E8E;
            /* Warna tulisan saat di hover */
        }

        .btn-image span {
            position: relative;
            z-index: 1;
        }
    </style>
    <div class="welcome-message" style="margin-top: 75px;">
        Selamat Datang
    </div>
    <div id="carouselExampleIndicators" style="margin-top: 20px;" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ url('storage/img/forester1.jpg') }}" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    {{-- <h5>Slider One Item</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt excepturi
                        quas vero.</p> --}}
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ url('storage/img/forester1.jpg') }}" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Slider One Item</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt excepturi
                        quas vero.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ url('storage/img/forester1.jpg') }}" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Slider One Item</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt excepturi
                        quas vero.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="container">
        <h2 class="text-center" style="margin-top: 20px; margin-bottom:20px;">Rekomendasi Produk</h2>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3 mt-1">
                    <div class="item">
                        <div class="item-image"
                            style="width: 250px; height: 250px; border: 1px solid #ccc; position: relative;">
                            <!-- Tombol tambahkan ke favorit -->
                            {{-- <button class="btn btn-outline-danger" style="position: absolute; top: 10px; right: 10px;"><i
                                    class="fa fa-heart"></i></button> --}}
                            <!-- Gambar produk -->
                            <img src="{{ asset('storage/produk/' . $product->gambar_produk) }}" alt="Gambar Produk"
                                style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="item-meta text-center" style="font-size: 15px;">
                            <!-- Menambahkan font-size 15px dan centering -->
                            <p style="margin-top: 17px; font-weight: bold;">{{ $product->nama_produk }}</p>
                            <!-- Menjadikan nama produk tebal (bold) -->
                            <p style="margin-top: -15px; color: #148E8E;">Harga: Rp.{{ $product->harga_produk }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-end">
            <a href="{{ url('/user/produkuser') }}" class="btn" role="button" style="background-color: #148E8E; color: white; padding: 10px 30px; font-size: 16px; text-decoration: none;">
                Selengkapnya
            </a>
        </div>


        <div class="about-us">
            <div class="container">
                <h2 class="text-center" style=" margin-bottom:20px;">Video</h2>
                <p><strong>Selamat Datang di Dunia Hiking Kami!!</strong> Temukan video review perlengkapan dan tutorial mendaki
                    dari para ahli. Klik kategori di bawah ini untuk menjelajah lebih lanjut!
            </div>
        </div>
        <p class="d-inline-flex gap-1">
        <div class="row" style="margin-top: -50px;" >
            <div class="col-md-3" style="justify-content: center;align-items: center;display: flex">
                <a href="{{ url('/user/galeri?category=review') }}" class="btn-image" role="button" data-bs-toggle="button"
                    style="background-image: url('{{ asset('storage/img/review.jpg') }}');">
                    <span>Review & Unboxing</span>
                </a>
            </div>
            <div class="col-md-3" style="justify-content: center;align-items: center;display: flex">
                <a href="{{ url('/user/galeri?category=tutorial') }}" class="btn-image" role="button"
                    data-bs-toggle="button" style="background-image: url('{{ asset('storage/img/tutorial.jpg') }}');">
                    <span>Tutorial Penggunaan</span>
                </a>
            </div>
            <div class="col-md-3" style="justify-content: center;align-items: center;display: flex">
                <a href="{{ url('/user/galeri?category=tips') }}" class="btn-image" role="button" data-bs-toggle="button"
                    style="background-image: url('{{ asset('storage/img/tips.jpg') }}');">
                    <span>Tips and Trik</span>
                </a>
            </div>
            <div class="col-md-3" style="justify-content: center;align-items: center;display: flex">
                <a href="{{ url('/user/galeri?category=petualangan') }}" class="btn-image" role="button"
                    data-bs-toggle="button" style="background-image: url('{{ asset('storage/img/petualangan.jpg') }}');">
                    <span>Petualangan Anda</span>
                </a>
            </div>
        </div>
        </p>
    </div>



    <div class="about-us">
        <div class="container">
            <h2>Tentang Kami</h2>
            <p>Forester Jakal adalah sebuah toko yang menjual peralatan pendakian dengan merk Consina dan Forester. Forester
                jakal merupakan anak cabang dari perusahaan serupa yaitu Nomad Adventure. Sebagai salah satu dari empat
                cabang yang dimiliki oleh Nomad Adventure. Pada dasarnya, karena Forester Jakal merupakan perusahaan yang
                menjalin kerjasama konsinyasi dengan Consina dan Forester mereka tidak mempunyai visi misi sendiri dan
                berpegang pada visi misi dari 2 brand yang ada pada mereka yaitu Consina dan Forester.
                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ url('/user/tentangkami') }}" class="btn" role="button" style="background-color: #148E8E; color: white; padding: 10px 30px; font-size: 16px; text-decoration: none;">
                        Selengkapnya
                    </a>
                </div>
        </div>
    </div>
@endsection
