@extends('layout.mainuser')

@section('judul')
    <strong>Halaman Produk</strong>
@endsection

@section('content')
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
                    <h5>Slider One Item</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt excepturi quas vero.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ url('storage/img/forester1.jpg') }}" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Slider One Item</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt excepturi quas vero.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ url('storage/img/forester1.jpg') }}" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Slider One Item</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, nulla, tempore. Deserunt excepturi quas vero.</p>
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

    <div class="container mb-4">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3 mb-4 mt-1">
                    <div class="item">
                        <div class="item-image" style="width: 250px; height: 250px; border: 1px solid #ccc; position: relative;">
                            <!-- Tombol tambahkan ke favorit -->
                            <button class="btn btn-outline-danger" style="position: absolute; top: 10px; right: 10px;"><i class="fa fa-heart"></i></button>
                            <!-- Gambar produk -->
                            <img src="{{ asset('storage/produk/' . $product->gambar_produk) }}" alt="Gambar Produk" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="item-meta text-center" style="font-size: 15px;"> <!-- Menambahkan font-size 15px dan centering -->
                            <p style="margin-top: 17px; font-weight: bold;">{{ $product->nama_produk }}</p> <!-- Menjadikan nama produk tebal (bold) -->
                            <p style="margin-top: -15px; color: #148E8E;">Harga: {{ $product->harga_produk }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>



    <div class="about-us">
        <div class="container">
            <h2>About Us</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam mattis, nulla vel luctus bibendum, metus dui
                tristique lacus, eu cursus justo purus sit amet tortor. Mauris sed metus id eros interdum vehicula. Nunc
                volutpat arcu eu tellus vulputate, vitae fermentum mi varius. In gravida nisi at ex lobortis, sed varius
                ligula eleifend. Nullam laoreet, erat eu fermentum faucibus, odio magna feugiat ipsum, sed fringilla lectus
                nulla vel lectus. Nulla sit amet semper lorem. Vivamus vitae
        </div>
    </div>
@endsection
