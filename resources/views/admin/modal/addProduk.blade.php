<div class="modal fade" id="addProduk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content me-5" style="width: 700px;">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('addData') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Id Produk</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control-plaintext" id="id" name="id"
                                value="{{$id}} " readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Foto</label>
                        <div class="col-sm-7">
                            <input class="form-control " type="file" accept=".png, .jpg, .jpeg" id="gambarProduk"
                                name="gambar_produk" onchange="previewImg()">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Nama Produk</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                value=" ">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Harga Produk</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" id="hargaProduk" name="harga_produk"
                                value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Kategori Produk</label>
                        <div class="col-sm-7">
                            <select type="text" class="form-control" name="kategori_produk" id="kategori_produk">
                                <option value="">Pilih Kategori</option>
                                <option value="tas">Tas</option>
                                <option value="sepatu">Sepatu</option>
                                <option value="pakaian">Pakaian</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Deskripsi Produk</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="deskripsiProduk" name="deskripsi_produk"
                                value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Merk Produk</label>
                        <div class="col-sm-7">
                            <select type="text" class="form-control" name="merk_produk" id="merk_produk">
                                <option value="">Pilih Merk</option>
                                <option value="consina">Consina</option>
                                <option value="forester">Forester</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Status Produk</label>
                        <div class="col-sm-7">
                            <select type="text" class="form-control" name="status_produk" id="status_produk">
                                <option value="">Pilih Status</option>
                                <option value="new arrival">New Arrival</option>
                                <option value="lama">Lama</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save </button>
                </div>
            </form>
        </div>
    </div>
</div>
