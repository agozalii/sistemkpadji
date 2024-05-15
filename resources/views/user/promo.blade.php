@extends('layout.mainuser')

@include('sweetalert::alert')

@section('judul')
    <strong>Halaman Produk</strong>
@endsection

@section('content')
    {{-- <div class="container mb-4">
    <div class="row justify-content-center">
        @foreach ($promos as $key => $promo)
            <div class="col-6 mb-4 mt-1">
                <div class="item" style="position: {{ $key % 2 == 0 ? 'relative' : 'absolute' }}; {{ $key % 2 == 0 ? 'margin-right: 20px;' : 'margin-left: 20px;' }} margin-top: 20px;">
                    <div class="item-image text-center" style="width: 400px; height: 400px; border: 1px solid #ccc;">
                        <img src="{{ asset('storage/promosi/' . $promo->gambar_promosi) }}" alt="Gambar Produk" class="mx-auto d-block" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div> --}}

{{-- <div class="container">
    @php $count = 0 @endphp
    @foreach ($promos as $key => $promo)
        @if ($count % 3 == 0)
            <div class="row mb-3">
        @endif
        <div class="col-md-4" style="margin-top: 75px;">
            <div class="card">
                <!-- Menampilkan gambar produk -->
                    <img src="{{ asset('storage/promosi/' . $promo->gambar_promosi) }}" class="card-img-top"
                        alt="{{ $promo->nama_promosi }}">
                </a>
            </div>
        </div>

        @php $count++ @endphp
        @if ($count % 3 == 0)
            </div>
        @endif
    @endforeach

    @if ($count % 3 != 0)
        </div>
    @endif
@endsection
</div> --}}


{{-- <div class="container">
    @php $count = 0; $promoBulanIni = []; $promoLain = []; @endphp
    @foreach ($promos as $key => $promo)
        @php
            $today = now()->format('Y-m-d');
            if ($promo->tanggal_mulai <= $today && $promo->tanggal_selesai >= $today) {
                $promoBulanIni[] = $promo;
            } else {
                $promoLain[] = $promo;
            }
        @endphp
    @endforeach

    @if (count($promoBulanIni) > 0)
        <h3>Promo Bulan Ini</h3>
        @foreach ($promoBulanIni as $key => $promo)
            @if ($count % 3 == 0)
                <div class="row mb-3">
            @endif
            <div class="col-md-4" style="margin-top: 75px;">
                <div class="card">
                    <!-- Menampilkan gambar produk -->
                    <img src="{{ asset('storage/promosi/' . $promo->gambar_promosi) }}" class="card-img-top"
                        alt="{{ $promo->nama_promosi }}">
                </div>
            </div>

            @php $count++ @endphp
            @if ($count % 3 == 0)
                </div>
            @endif
        @endforeach

        @if ($count % 3 != 0)
            </div>
        @endif
    @endif

    @if (count($promoLain) > 0)
        <h3>Promo Lainnya</h3>
        @foreach ($promoLain as $key => $promo)
            @if ($count % 3 == 0)
                <div class="row mb-3">
            @endif
            <div class="col-md-4" style="margin-top: 75px;">
                <div class="card">
                    <!-- Menampilkan gambar produk -->
                    <img src="{{ asset('storage/promosi/' . $promo->gambar_promosi) }}" class="card-img-top"
                        alt="{{ $promo->nama_promosi }}">
                </div>
            </div>

            @php $count++ @endphp
            @if ($count % 3 == 0)
                </div>
            @endif
        @endforeach

        @if ($count % 3 != 0)
            </div>
        @endif
    @endif
</div> --}}
<div class="container">
    <h1>Promosi</h1>
    <div class="row">
        <div class="col-md-12">
            <h3>Promo Bulan Ini</h3>
            <div class="row">
                @foreach ($promoBulanIni as $promo)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('storage/promosi/' . $promo->gambar_promosi) }}" class="card-img-top" alt="{{ $promo->nama_promosi }}">
                            {{-- <div class="card-body">
                                <p class="card-text">{{ $promo->deskripsi_promosi }}</p>
                                <p class="card-text">Mulai: {{ $promo->tanggal_mulai }}</p>
                                <p class="card-text">Selesai: {{ $promo->tanggal_selesai }}</p>
                            </div> --}}
                        </div>
                        <h5>{{ $promo->nama_promosi }}</h5> <!-- Nama promosi di luar card -->
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
                            <img src="{{ asset('storage/promosi/' . $promo->gambar_promosi) }}" class="card-img-top" alt="{{ $promo->nama_promosi }}">
                        </div>
                        <h5>{{ $promo->nama_promosi }}</h5> <!-- Nama promosi di luar card -->
                        <p class="card-text">Mulai: {{ $promo->tanggal_mulai }}</p>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


@endsection


