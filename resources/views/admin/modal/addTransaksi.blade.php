<!-- Modal -->
<div class="modal fade" id="addTransaksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 700px;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('addDataTransaksi') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_transaksi" class="form-label">Tanggal Transaksi</label>
                        <input type="date" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi">
                    </div>
                    <div class="mb-3">
                        <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                        <select class="form-select" id="metode_pembayaran" name="metode_pembayaran">
                            <option value="Cash">Cash</option>
                            <option value="Qris">Qris</option>
                            <option value="Dana">Dana</option>
                        </select>
                    </div>
                    <!-- Input untuk detail transaksi -->

                    <div id="produk-container">
                        <!-- Tempat untuk menambahkan input produk dan promosi secara dinamis -->
                    </div>
                    <button type="button" class="btn btn-primary" onclick="addProduk()">Tambah Produk</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let produkCount = 0;

    function addProduk() {
        produkCount++;
        const produkInput = `
            <div class="mb-3">
                <label for="produk_id_${produkCount}" class="form-label">Produk ID ${produkCount}</label>
                <select class="form-select" id="produk_id_${produkCount}" name="produk_id[]">
                    @foreach ($produks as $row)
                        <option value="{{ $row->id }}">{{ $row->id }} - {{ $row->nama_produk }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="promosi_id_${produkCount}" class="form-label">Promosi ID ${produkCount}</label>
                <select class="form-select" id="promosi_id_${produkCount}" name="promosi_id[]">
                    <option value="">Pilih Promosi</option>
                    @foreach ($promosis as $row)
                        <option value="{{ $row->id }}">{{ $row->id }} - {{ $row->nama_promosi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="jumlah_beli_produk_${produkCount}" class="form-label">Jumlah Beli Produk ${produkCount}</label>
                <input type="number" class="form-control" id="jumlah_beli_produk_${produkCount}" name="jumlah_beli_produk[]" required>
            </div>
        `;
        document.getElementById('produk-container').insertAdjacentHTML('beforeend', produkInput);
    }
</script>
