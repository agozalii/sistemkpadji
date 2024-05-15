<div class="modal fade" id="editProduk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content me-5" style="width: 700px;">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('updateProduk', $data->id) }}" enctype="multipart/form-data" method="POST">
                @method('PUT')

                @csrf
            <div class="modal-body">
                <div class="mb-3 row">
                    <label class="col-sm-5 col-form-label">Id Produk</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control-plaintext" id="idProduk" name="id_produk"
                            value="{{ $data->id }}" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-5 col-form-label">Foto</label>
                    <div class="col-sm-7">
                        <input type="hidden" name="gambar_produk" value="{{$data->gambar_produk}}" >
                        <img src="{{ asset('storage/produk/' . $data->gambar_produk) }}" id="preview" class="mb-2 preview" style="width: 100px;">
                        <input class="form-control " type="file" accept=".png, .jpg, .jpeg" id="inputFoto"
                            name="gambar_produk" value="{{ $data->gambar_produk }}" onchange="previewImg()" >
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-5 col-form-label">Nama Produk</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="namaProduk" name="nama_produk"
                            value="{{ $data->nama_produk }} ">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-5 col-form-label">Harga Produk</label>
                    <div class="col-sm-7">
                        <input type="number" class="form-control" id="hargaProduk" name="harga_produk"
                            value="{{ $data->harga_produk }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-5 col-form-label">Kategori Produk</label>
                    <div class="col-sm-7">
                        <select type="text" class="form-control" name="kategori_produk" id="kategori_produk">
                            <option value="">Pilih Kategori</option>
                            <option value="tas" {{ $data->kategori_produk === 'celana' ? 'selected' : '' }}>Tas
                            </option>
                            <option value="sepatu" {{ $data->kategori_produk === 'sepatu' ? 'selected' : '' }}>Sepatu
                            </option>
                            <option value="pakaian" {{ $data->kategori_produk === 'pakaian' ? 'selected' : '' }}>Pakaian
                            </option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-5 col-form-label">Deskripsi Produk</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="deskripsiProduk" name="deskripsi_produk"
                            value="{{ $data->deskripsi_produk }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-5 col-form-label">Merk Produk</label>
                    <div class="col-sm-7">
                        <select type="text" class="form-control" name="merk_produk" id="merk_produk">
                            <option value="">Pilih Merk</option>
                            <option value="consina" {{ $data->merk_produk === 'consina' ? 'selected' : '' }}>Consina
                            </option>
                            <option value="forester" {{ $data->merk_produk === 'forester' ? 'selected' : '' }}>Forester
                            </option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-5 col-form-label">Status Produk</label>
                    <div class="col-sm-7">
                        <select type="text" class="form-control" name="status_produk" id="status_produk">
                            <option value="">Pilih Status</option>
                            <option value="new arrival" {{ $data->status_produk === 'new arrival' ? 'selected' : '' }}>
                                New Arrival</option>
                            <option value="lama" {{ $data->status_produk === 'lama' ? 'selected' : '' }}>Lama
                            </option>
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

{{-- script untuk menampilkan preview gambar --}}
<script>
    function previewImg() {
        const fotoIn = document.querySelector('#inputFoto');
        const preview = document.querySelector('.preview');

        preview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(fotoIn.files[0]);

        oFReader.onload = function(oFREvent) {
            preview.src = oFREvent.target.result;
        }
    }
</script>
