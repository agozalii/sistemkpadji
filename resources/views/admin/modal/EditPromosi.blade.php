<div class="modal fade" id="editPromosi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content me-5" style="width: 700px;">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('updatePromosi', $data->id) }}" enctype="multipart/form-data" method="POST">
                @method('PUT')

                @csrf
            <div class="modal-body">
                <div class="mb-3 row">
                    <label class="col-sm-5 col-form-label">Id Promosi</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control-plaintext" id="idProduk" name="id_produk"
                            value="{{ $data->id }}" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-5 col-form-label">Foto</label>
                    <div class="col-sm-7">
                        <input type="hidden" name="gambar_promosi" value="{{$data->gambar_promosi}}" >
                        <img src="{{ asset('storage/promosi/' . $data->gambar_promosi) }}" id="preview" class="mb-2 preview" style="width: 100px;">
                        <input class="form-control " type="file" accept=".png, .jpg, .jpeg" id="inputFoto"
                            name="gambar_promosi" value="{{ $data->gambar_promosi }}" onchange="previewImg()" >
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-5 col-form-label">Nama Promosi</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="nama_promosi" name="nama_promosi"
                            value="{{ $data->nama_promosi }} ">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-5 col-form-label">Deskripsi Promosi</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="deskripsi_promosi" name="deskripsi_promosi"
                            value="{{ $data->deskripsi_promosi }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tanggal_mulai" class="col-sm-5 col-form-label">Tanggal Mulai</label>
                    <div class="col-sm-7">
                        <div class="input-group">
                            <input type="text" class="form-control" id="tanggal_mulai" name="tanggal_mulai"
                                placeholder="Pilih tanggal mulai" value="{{ $data->tanggal_mulai }}">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tanggal_selesai" class="col-sm-5 col-form-label">Tanggal Selesai</label>
                    <div class="col-sm-7">
                        <div class="input-group">
                            <input type="text" class="form-control" id="tanggal_selesai" name="tanggal_selesai"
                                placeholder="Pilih tanggal selesai" value="{{ $data->tanggal_selesai }}">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        </div>
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
