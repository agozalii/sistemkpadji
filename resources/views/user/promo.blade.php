@extends('layout.mainuser')

@include('sweetalert::alert')

@section('judul')
    <strong>Halaman Produk</strong>
@endsection

@section('content')
<div class="container">
    <h1 class="text-center" style="border-bottom: 4px solid #148E8E; padding-bottom: 8px; margin-top:75px;">Promo Menarik</h1>

    <div class="row">
        <div class="col-md-12 mt-3">
            <h3>Promo Bulan Ini</h3>
            <div class="row">
                @foreach ($promoBulanIni as $promo)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <a href="{{ route('promosi.showdetailpromosi', $promo->id) }}">
                                <img src="{{ asset('storage/promosi/' . $promo->gambar_promosi) }}" class="card-img-top" alt="{{ $promo->nama_promosi }}">
                                <h5>{{ $promo->nama_promosi }}</h5>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h3>Promo Lain</h3>
            <div class="row">
                @foreach ($promoLain as $promo)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <a href="{{ route('promosi.showdetailpromosi', $promo->id) }}">
                                <img src="{{ asset('storage/promosi/' . $promo->gambar_promosi) }}" class="card-img-top" alt="{{ $promo->nama_promosi }}">
                                <h5>{{ $promo->nama_promosi }}</h5>
                            </a>
                            <p class="card-text">Mulai: {{ $promo->tanggal_mulai }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
