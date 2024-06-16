@extends('layout.mainuser')

@section('judul')
    <strong>Detail Produk</strong>
@endsection

@section('content')
    <style>
        .description-content {
            border: 1px solid #ccc;
            padding: 10px;
            padding-left: 10px;
        }

        .table th,
        .table td {
            padding: 0.5rem;
            /* Atur padding antara teks dan kolom */
        }

        .platform-icons {
            margin-top: 20px;
            display: flex;
            align-items: center;
        }

        .platform-icons img {
            width: 35px;
            height: 35px;
            margin-right: 15px;
            cursor: pointer;
        }

        .platform-icons a {
            text-decoration: none;
        }
    </style>
    <div class="container" style="margin-top: 75px;">
        <h2 class="text-center mt-5 mb-3">Detail Produk</h2>
        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <!-- Menampilkan gambar produk -->
                    <img src="{{ asset('storage/produk/' . $product->gambar_produk) }}" class="card-img"
                        alt="{{ $product->nama_produk }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="card-title mb-4">{{ strtoupper($product->nama_produk) }}</h2>
                        <div class="description-header mt-5">
                            <h5>Detail</h5>
                        </div>
                        <table class="custom-table" style="width: 200px;">
                            <tbody>
                                <tr>
                                    <td style="padding-left: 20px;">Harga</td>
                                    <td>:</td>
                                    <td style="padding-left: 10px;"><strong
                                            style="color: #148E8E;">{{ $product->harga_produk }}</strong></td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 20px;">Merk</td>
                                    <td>:</td>
                                    <td style="padding-left: 10px;"><strong
                                            style="color: #148E8E;">{{ $product->merk_produk }}</strong></td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 20px;">Kategori</td>
                                    <td>:</td>
                                    <td style="padding-left: 10px;"><strong
                                            style="color: #148E8E;">{{ $product->kategori_produk }}</strong></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="description-header mt-4">
                            <h5>Deskripsi</h5>
                        </div>
                        <div class="description-content" style="margin-left: 20px;">
                            <div class="wordpress-post">
                                <p>{{ $product->deskripsi_produk }}</p>
                            </div>
                        </div>

                        <div class="description-header mt-4">
                            <h5>Kunjungi Kami</h5>
                        </div>
                        <div class="platform-icons">
                            <a href="https://tokopedia.link/tAmJ3CKLbKb" target="_blank">
                                <img src="{{ url('storage/img/tokopedia.png') }}" alt="Tokopedia">
                            </a>
                            <a href="https://shopee.co.id/andala.id?entryPoint=ShopByPDP&is_from_login=true" target="_blank">
                                <img src="{{ url('storage/img/shopee.png') }}" alt="Shopee">
                            </a>
                            <a href="https://maps.app.goo.gl/RLuzxtfNTZ5qEh2v9" target="_blank">
                                <img src="{{ url('storage/img/lokasi.png') }}" alt="Lokasi">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
