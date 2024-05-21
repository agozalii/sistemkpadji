@extends('layout.main')

@include('sweetalert::alert')

@section('judul')
<strong>Detail Transaksi {{ $transaksi->nama_pelanggan }}</strong>
@endsection

@section('isi')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('transaksi.index') }}" style="background-color: #237e79" class="btn btn-success mb-3"
                    id="addDataTransaksi">
                    <i class="fa fa-arrow-left"></i>
                    <span> Kembali</span>

                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="id">ID Transaksi</label>
                    <input type="text" class="form-control" id="id" name="id" value="{{ $transaksi->id }}" readonly>
                </div>
                <div class="form-group">
                    <label for="id_pelanggan">Nama Pelanggan</label>
                    <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan"
                        value="{{ $transaksi->nama_pelanggan }}" readonly>
                </div>
                <div class="form-group">
                    <label for="tanggal_transaksi">Tanggal Transaksi</label>
                    <input type="text" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi"
                        value="{{ $transaksi->tanggal_transaksi }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="total">Total Transaksi</label>
                    <input type="text" class="form-control" id="total" name="total"
                        value="Rp. {{ number_format($transaksi->total_transaksi, 2) }}" readonly>
                </div>
                <div class="form-group">
                    <label for="metode_pembayaran">Metode Pembayaran</label>
                    <input type="text" class="form-control" id="metode_pembayaran" name="metode_pembayaran"
                        value="{{ $transaksi->metode_pembayaran }}" readonly>
                </div>
            </div>
            <h3>Detail Produk</h3>
            <div class="table-responsive" style="overflow-x: auto; height: 600px;">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Nota</th>
                            <th>ID Produk</th>
                            <th>Nama Produk</th>
                            <th>Harga Produk</th>
                            <th>Promo Value</th>
                            <th>Harga Promo</th>
                            <th>Jumlah</th>
                            <th>Nama Promosi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detail as $index => $item)
                        @php
                        $produk = \App\Models\ProdukModel::find($item->produk_id);
                        $promosi = \App\Models\PromosiModel::find($item->promosi_id);
                        @endphp
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $transaksi->id }}</td>
                            <td>{{ $item->produk_id }}</td>
                            <td>{{ $produk->nama_produk }}</td>
                            <td>Rp. {{ number_format($produk->harga_produk, 2) }}</td>
                            <td>{{ $item->promo_value != null ? $item->promo_value.'%' : '-' }}</td>
                            <td>{{ $item->harga_promo ? 'Rp.'. number_format($item->harga_promo, 2) : '-' }}</td>
                            <td>{{ $item->jumlah_beli_produk }}</td>
                            <td>{{ $promosi != null ? $promosi->nama_promosi : '-' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            @endsection