@extends('layout.mainuser')

@section('judul')
    <strong>Halaman Produk</strong>
@endsection

@section('content')
    <div class="container" style="margin-top: 75px">
        <h1 class="text-center" style="border-bottom: 4px solid #148E8E; padding-bottom: 8px;">Semua Produk</h1>

        <div class="row">
            <div class="col-md-3 mb-4 mt-4">
                <!-- Profile Button with User Icon -->
                <a id="btn-semua" href="#" class="btn btn-block category-btn active" data-category="semua"
                    style="color: #343a40; text-decoration: none; display: flex; align-items: center;"
                    onmouseover="this.style.color='#148E8E';" onmouseout="this.style.color='#343a40';">
                    <i class="fas fa-list-alt mr-2" style="margin-right: 5px;"></i>
                    <span style="white-space: nowrap;">Semua Produk</span>
                </a>
                <!-- Kategori Button -->
                @foreach ($kategoris as $k)
                    <a id="btn-{{ $k->id }}" href="#" class="btn btn-block category-btn"
                        data-category="{{ $k->id }}"
                        style="color: #343a40; text-decoration: none; display: flex; align-items: center;"
                        onmouseover="this.style.color='#148E8E';" onmouseout="this.style.color='#343a40';">
                        <i class="fas fa-list mr-2"></i> {{ $k->name }}
                    </a>
                @endforeach

                <!-- Wishlist Button with Heart Icon -->
                {{-- <a id="btn-Peralatan Outdoor" href="#" class="btn btn-block category-btn"
                    data-category="Peralatan Outdoor"
                    style="color: #343a40; text-decoration: none; display: flex; align-items: center;"
                    onmouseover="this.style.color='#148E8E';" onmouseout="this.style.color='#343a40';">
                    <i class="fas fa-campground mr-2"></i> Peralatan Outdoor
                </a>
                <a id="btn-Peralatan Keamanan" href="#" class="btn btn-block category-btn"
                    data-category="Peralatan Keamanan"
                    style="color: #343a40; text-decoration: none; display: flex; align-items: center;"
                    onmouseover="this.style.color='#148E8E';" onmouseout="this.style.color='#343a40';">
                    <i class="fas fa-shield-alt mr-2"></i> Peralatan Keamanan
                </a>
                <a id="btn-Sepatu & Sandal" href="#" class="btn btn-block category-btn"
                    data-category="Sepatu & Sandal"
                    style="color: #343a40; text-decoration: none; display: flex; align-items: center;"
                    onmouseover="this.style.color='#148E8E';" onmouseout="this.style.color='#343a40';">
                    <i class="fas fa-shoe-prints mr-2"></i> Sepatu & Sandal
                </a>
                <a id="btn-Ransel" href="#" class="btn btn-block category-btn" data-category="Ransel"
                    style="color: #343a40; text-decoration: none; display: flex; align-items: center;"
                    onmouseover="this.style.color='#148E8E';" onmouseout="this.style.color='#343a40';">
                    <i class="fas fa-suitcase-rolling mr-2"></i> Ransel
                </a>
                <a id="btn-Jaket & Jas Hujan" href="#" class="btn btn-block category-btn"
                    data-category="Jaket & Jas Hujan"
                    style="color: #343a40; text-decoration: none; display: flex; align-items: center;"
                    onmouseover="this.style.color='#148E8E';" onmouseout="this.style.color='#343a40';">
                    <i class="fas fa-cloud-rain mr-2"></i> Jaket & Jas Hujan
                </a> --}}

            </div>

            <div class="col-md-9">
                <div id="product-container"></div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Memuat semua produk saat halaman dimuat
            loadProducts('semua');

            $('.category-btn').click(function() {
                var category = $(this).data('category');
                loadProducts(category);
                $('.category-btn').removeClass('active'); // Menghapus kelas active dari semua tombol
                $(this).addClass('active'); // Menambahkan kelas active pada tombol yang diklik
            });

            function loadProducts(category) {
                $.ajax({
                    url: '/get-products', // Ganti dengan route yang sesuai untuk memuat produk
                    type: 'GET',
                    data: {
                        category: category
                    },
                    success: function(response) {
                        $('#product-container').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }
        });
    </script>

    <style>
        .btn.active {
            background-color: #148E8E;
            color: white !important;
        }

        .category-btn {
            justify-content: flex-start;
        }
    </style>
@endsection
