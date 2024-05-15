@extends('layout.mainuser')

@section('judul')
    <strong>Detail Produk</strong>
@endsection

@section('content')

<style>
    /* .description-header {
    border-bottom: 1px solid #ccc;
    padding-bottom: 10px;
    margin-bottom: 20px;
} */

.description-content {
    border: 1px solid #ccc;
    padding: 10px;
    padding-left: 10px;"
}
.table th,
    .table td {
        padding: 0.5rem; /* Atur padding antara teks dan kolom */
    }

</style>
<div class="container" style="margin-top: 150px;">
    <div class="card">
        <div class="row no-gutters">
            <div class="col-md-4">
                <!-- Menampilkan gambar produk -->
                <img src="{{ asset('storage/produk/' . $product->gambar_produk) }}" class="card-img" alt="{{ $product->nama_produk }}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title mb-4">{{ strtoupper($product->nama_produk) }}</h2>
                    <div class="description-header mt-5">
                        <h5>Detail</h4>
                    </div>
                    {{-- <p class="card-text ml-3">Harga&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp; <strong style="color: #148E8E;">{{ $product->harga_produk }}</strong></p>
                    <p class="card-text ml-3">Merk&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp; <strong style="color: #148E8E;">{{ $product->merk_produk }}</strong></p>
                    <p class="card-text ml-3">Kategori&nbsp;&nbsp;&nbsp;:&nbsp; <strong style="color: #148E8E;">{{ $product->kategori_produk }}</strong></p>
                    <p class="card-text ml-3">Status&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp; <strong style="color: #148E8E;">{{ $product->status_produk }}</strong></p> --}}

                                    <table class="custom-table" style="width: 200px;" >
                                        <tbody>
                                            <tr>
                                                <td style="padding-left: 20px;">Harga</td>
                                                <td>:</td>
                                                <td style="padding-left: 10px;"><strong style="color: #148E8E;">{{ $product->harga_produk }}</strong></td>
                                            </tr>
                                            <tr>
                                                <td style="padding-left: 20px;">Merk</td>
                                                <td>:</td>
                                                <td style="padding-left: 10px;"><strong style="color: #148E8E;">{{ $product->merk_produk }}</strong></td>
                                            </tr>
                                            <tr>
                                                <td style="padding-left: 20px;">Kategori</td>
                                                <td>:</td>
                                                <td style="padding-left: 10px;"><strong style="color: #148E8E;">{{ $product->kategori_produk }}</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>



                    <div class="description-header mt-4">
                        <h5>Deskripsi</h4>
                    </div>
                    <div class="description-content" style="margin-left: 20px;">
                        <div class="wordpress-post">
                            <p>{{ $product->deskripsi_produk }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
