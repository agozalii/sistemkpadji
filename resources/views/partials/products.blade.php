@php $count = 0 @endphp
@foreach ($products as $product)
    @if ($count % 3 == 0)
        <div class="row mb-3">
    @endif
    <div class="col-md-4 mt-4">
        <div class="card">
            <!-- Menampilkan gambar produk -->
            <a href="{{ route('detail.produk', ['id' => $product->id]) }}">
                <img src="{{ asset('storage/produk/' . $product->gambar_produk) }}" class="card-img-top" alt="{{ $product->nama_produk }}">
            </a>
        </div>
        <div class="item-meta text-center" style="font-size: 15px;"> <!-- Menambahkan font-size 15px dan centering -->
            <p style="margin-top: 17px; font-weight: bold;">{{ $product->nama_produk }}</p> <!-- Menjadikan nama produk tebal (bold) -->
            <p style="margin-top: -15px; color: #148E8E;">Harga: {{ $product->harga_produk }}</p>
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

<script>
    // Script untuk mengarahkan gambar produk ke halaman detail saat diklik
    document.addEventListener('DOMContentLoaded', function () {
        var productImages = document.querySelectorAll('.card-img-top');
        productImages.forEach(function (image) {
            image.addEventListener('click', function (event) {
                event.preventDefault(); // Mencegah tindakan default dari link
                var parentCard = image.closest('.card');
                var detailLink = parentCard.querySelector('a').getAttribute('href');
                window.location.href = detailLink;
            });
        });
    });
</script>
