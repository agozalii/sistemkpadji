{{-- <div class="modal fade" id="addTransaksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content me-5" style="width: 700px;">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('addDataTransaksi') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-body">
                    <!-- Kolom tambahan untuk detail transaksi -->
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Id Transaksi</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control-plaintext" id="id" name="id"
                                value="{{$id}} " readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Produk ID</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="produk_id" name="produk_id" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Transaksi ID</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="transaksi_id" name="transaksi_id" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Promosi ID</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="promosi_id" name="promosi_id" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Jumlah Beli Produk</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" id="jumlah_beli_produk" name="jumlah_beli_produk" value="">
                        </div>
                    </div>
                    <!-- End Kolom tambahan untuk detail transaksi -->

                    <!-- Kolom untuk transaksi -->
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Nama Pelanggan</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Tanggal Transaksi</label>
                        <div class="col-sm-7">
                            <input type="date" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Metode Pembayaran</label>
                        <div class="col-sm-7">
                            <select class="form-control" id="metode_pembayaran" name="metode_pembayaran">
                                <option value="Cash">Cash</option>
                                <option value="Qris">Qris</option>
                                <option value="Dana">Dana</option>
                            </select>
                        </div>
                    </div>
                    <!-- End Kolom untuk transaksi -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div> --}}

<!-- Modal -->
<div class="modal fade" id="addTransaksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
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
    let produkCount = 1;

    function addProduk() {
        produkCount++;
        const produkInput = `
            <div class="mb-3">
                <label for="produk_id_${produkCount}" class="form-label">Produk ID ${produkCount}</label>
                <input type="text" class="form-control" id="produk_id_${produkCount}" name="produk_id[]">
            </div>
            <div class="mb-3">
                <label for="promosi_id_${produkCount}" class="form-label">Promosi ID ${produkCount}</label>
                <input type="text" class="form-control" id="promosi_id_${produkCount}" name="promosi_id[]">
            </div>
            <div class="mb-3">
                <label for="jumlah_beli_produk_${produkCount}" class="form-label">Jumlah Beli Produk ${produkCount}</label>
                <input type="number" class="form-control" id="jumlah_beli_produk_${produkCount}" name="jumlah_beli_produk[]">
            </div>
        `;
        document.getElementById('produk-container').insertAdjacentHTML('beforeend', produkInput);
    }
</script>
