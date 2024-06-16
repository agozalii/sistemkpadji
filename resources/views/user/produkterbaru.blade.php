@extends('layout.mainuser')

@section('judul')
    <strong>Halaman Produk</strong>
@endsection

@section('content')

            {{-- <div class="container" style="margin-top: 150px">
                <div class="row">
                    <div class="col-md-3 mb-4">
                        <!-- Profile Button with User Icon -->
                        <a id="btn-terbaru" href="#" class="btn btn-block category-btn" data-category="terbaru"
                            style="background-color: #d1d8e0; border-color: #e9ecef; color: #343a40;
                                  text-decoration: none;">
                            <i class="fas fa-list-alt mr-2" style="color: #148E8E"></i>Produk Terbaru
                        </a>
                    </div>

                    <div class="col-md-9">
                        <div class="row">
                            @foreach ($produkNewArrival as $produk)
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <img src="{{ asset('storage/produk/' . $produk->gambar_produk) }}" class="card-img-top" alt="{{ $produk->nama_produk }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                                            <p class="card-text">Harga: {{ $produk->harga_produk }}</p>
                                            <!-- Tambahkan link atau tombol untuk detail produk -->
                                            <a href="{{ route('detail.produk', ['id' => $produk->id]) }}" class="btn btn-primary">Detail Produk</a>
                                        </div>
                                    </div>
                                </div>
                                @if ($loop->iteration % 3 == 0)
                                    </div><div class="row">
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="container" style="margin-top: 75px">
                <h1 class="text-center" style="border-bottom: 4px solid #148E8E; padding-bottom: 8px;">Produk Terbaru</h1>
                <div class="row">
                    <div class="col-md-3 mb-4 mt-4">
                        <!-- Profile Button with User Icon -->
                        <a id="btn-terbaru" href="#" class="btn btn-block category-btn" data-category="terbaru"
                            style="background-color: #d1d8e0; border-color: #e9ecef; color: #343a40;
                                  text-decoration: none;">
                            <i class="fas fa-list-alt mr-2" style="color: #148E8E"></i>Produk Terbaru
                        </a>
                    </div>

                    <div class="col-md-9 mt-4">
                        <div class="row">
                            @foreach ($produkNewArrival as $produk)
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <!-- Tambahkan class "product-image" dan data-href sesuai dengan route -->
                                    <a href="{{ route('detail.produk', ['id' => $produk->id]) }}">
                                        <img src="{{ asset('storage/produk/' . $produk->gambar_produk) }}" class="card-img-top product-image" alt="{{ $produk->nama_produk }}" data-href="{{ route('detail.produk', ['id' => $produk->id]) }}">
                                    </a>
                                </div>
                                {{-- <div class="card-body">
                                    <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                                    <p class="card-text">Harga: {{ $produk->harga_produk }}</p>
                                    <!-- Hapus tombol detail produk -->
                                </div> --}}
                                <div class="item-meta text-center" style="font-size: 15px;"> <!-- Menambahkan font-size 15px dan centering -->
                                    <p style="margin-top: 17px; font-weight: bold;">{{ $produk->nama_produk }}</p> <!-- Menjadikan nama produk tebal (bold) -->
                                    <p style="margin-top: -15px; color: #148E8E;">Harga: {{ $produk->harga_produk }}</p>
                                </div>
                            </div>

                                @if ($loop->iteration % 3 == 0)
                                    </div><div class="row">
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <script>
                // Script untuk mengarahkan gambar produk ke halaman detail saat diklik
                document.addEventListener('DOMContentLoaded', function () {
                    var productImages = document.querySelectorAll('.product-image');
                    productImages.forEach(function (image) {
                        image.addEventListener('click', function (event) {
                            event.preventDefault(); // Mencegah tindakan default dari link
                            var href = image.getAttribute('data-href');
                            window.location.href = href;
                        });
                    });
                });
            </script>

@endsection
