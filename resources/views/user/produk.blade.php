@extends('layout.mainuser')

@section('judul')
    <strong>Halaman Produk</strong>
@endsection

@section('content')
    <div class="container" style="margin-top: 150px">
        <div class="row">
            <div class="col-md-3 mb-4">
                <!-- Profile Button with User Icon -->
                <a id="btn-semua" href="#" class="btn btn-block category-btn active" data-category="semua"
                    style="color: #343a40; text-decoration: none; display: flex; align-items: center;"
                    onmouseover="this.style.color='#148E8E';" onmouseout="this.style.color='#343a40';">
                    <i class="fas fa-list-alt mr-2" style="margin-right: 5px;"></i>
                    <span style="white-space: nowrap;">Semua Produk</span>
                </a>

                <!-- Kategori Button -->
                <a id="btn-tas" href="#" class="btn btn-block category-btn" data-category="tas"
                    style="color: #343a40; text-decoration: none; display: flex; align-items: center;"
                    onmouseover="this.style.color='#148E8E';" onmouseout="this.style.color='#343a40';">
                    <i class="fas fa-user mr-2"></i> Tas
                </a>
                <!-- Wishlist Button with Heart Icon -->
                <a id="btn-pakaian" href="#" class="btn btn-block category-btn" data-category="pakaian"
                    style="color: #343a40; text-decoration: none; display: flex; align-items: center;"
                    onmouseover="this.style.color='#148E8E';" onmouseout="this.style.color='#343a40';">
                    <i class="fas fa-heart mr-2"></i> Pakaian
                </a>
                <a id="btn-sepatu" href="#" class="btn btn-block category-btn" data-category="sepatu"
                    style="color: #343a40; text-decoration: none; display: flex; align-items: center;"
                    onmouseover="this.style.color='#148E8E';" onmouseout="this.style.color='#343a40';">
                    <i class="fas fa-heart mr-2"></i> Sepatu
                </a>
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
