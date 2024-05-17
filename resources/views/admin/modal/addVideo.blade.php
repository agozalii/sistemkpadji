<div class="modal fade" id="addVideo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content me-5" style="width: 700px;">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('addDataVideo') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Id Video</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control-plaintext" id="id" name="id"
                                value="{{ $id }} " readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Nama Admin</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ Auth::user()->nama }}" readonly>
                            <input type="hidden" id="user_id" name="user_id" value="{{ Auth::id() }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Kategori</label>
                        <div class="col-sm-7">
                            <select class="form-control" id="kategori" name="kategori">
                                <option value="">Pilih</option>
                                <option value="review">Review & Unboxing</option>
                                <option value="tutorial">Tutorial Penggunaan</option>
                                <option value="tips">Tips & TRik</option>
                                <option value="petualangan">Petualangan Kalian</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Foto</label>
                        <div class="col-sm-7">
                            <input class="form-control " type="file" accept=".png, .jpg, .jpeg" id="tumbnail"
                                name="tumbnail" onchange="previewImg()">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Video</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="file" accept=".mp4, .avi, .mov, .mkv" id="video"
                                name="video">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Judul Video</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="judul_video" name="judul_video"
                                value=" ">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Deskripsi</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="deskripsi_video" name="deskripsi_video"
                                value="">
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
