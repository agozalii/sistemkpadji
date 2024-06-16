@extends('layout.mainuser')

@section('judul')
    <strong>Detail Promosi</strong>
@endsection

@section('content')
    <div class="container" style="margin-top: 75px;">
        <div class="text-center">
            <h1>{{ $promo->nama_promosi }}</h1>
            <img src="{{ asset('storage/promosi/' . $promo->gambar_promosi) }}" alt="{{ $promo->nama_promosi }}"
                class="img-fluid" style="max-width: 70%; height: auto;">
        </div>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs justify-content-left" id="promoTab" role="tablist"
            style="max-width: 70%; margin: 0 auto; margin-top: 30px;">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab"
                    aria-controls="description" aria-selected="true">Deskripsi</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="details-tab" data-toggle="tab" href="#details" role="tab"
                    aria-controls="details" aria-selected="false">Produk Promo</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content" id="promoTabContent" style="max-width: 70%; margin: 0 auto; margin-top: 20px;">
            <div class="tab-pane fade show active tab-content-container" id="description" role="tabpanel"
                aria-labelledby="description-tab">
                <p>{{ $promo->deskripsi_promosi }}</p>
                <p style="margin-top: 30px;"><strong>Detail : </strong></p>
                <p>Mulai: {{ $promo->tanggal_mulai }}</p>
                <p>Selesai: {{ $promo->tanggal_selesai }}</p>
            </div>
            <div class="tab-pane fade tab-content-container" id="details" role="tabpanel" aria-labelledby="details-tab">
                @php $count = 0 @endphp
                @foreach ($promo->details as $product)
                    @if ($count % 3 == 0)
                        <div class="row mb-3">
                    @endif
                    <div class="col-md-4 mt-4">
                        <div class="card">
                            <!-- Menampilkan gambar produk -->
                            <a href="{{ route('detail.produk', ['id' => $product->produk->id]) }}">
                                <img src="{{ asset('/storage/produk/' . $product->produk->gambar_produk) }}"
                                    class="card-img-top" alt="{{ $product->produk->nama_produk }}">
                            </a>
                        </div>
                        <div class="item-meta text-center" style="font-size: 15px;">
                            <!-- Menambahkan font-size 15px dan centering -->
                            <p style="margin-top: 17px; font-weight: bold;">{{ $product->nama_produk }}</p>
                            <!-- Menjadikan nama produk tebal (bold) -->
                            <p style="margin-top: -15px; color: #148E8E;">Harga: {{ $product->produk->harga_produk }}</p>
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

    </div>
    </div>
    </div>

    <style>
        .tab-content-container {
            min-height: 300px;
            max-height: 500px;
            overflow-y: auto;
        }
    </style>

    <script>
        // Script untuk mengarahkan gambar produk ke halaman detail saat diklik
        document.addEventListener('DOMContentLoaded', function() {
            var productImages = document.querySelectorAll('.card-img-top');
            productImages.forEach(function(image) {
                image.addEventListener('click', function(event) {
                    event.preventDefault(); // Mencegah tindakan default dari link
                    var parentCard = image.closest('.card');
                    var detailLink = parentCard.querySelector('a').getAttribute('href');
                    window.location.href = detailLink;
                });
            });
        });
    </script>
@endsection
