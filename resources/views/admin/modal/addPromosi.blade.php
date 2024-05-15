<div class="modal fade" id="addPromosi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content me-5" style="width: 700px;">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('addDatapromosi') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Id Promosi</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control-plaintext" id="id" name="id"
                                value="{{$id}} " readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Gambar Promosi</label>
                        <div class="col-sm-7">
                            <input class="form-control " type="file" accept=".png, .jpg, .jpeg" id="gambar_promosi"
                                name="gambar_promosi" onchange="previewImg()">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Nama Promosi</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="nama_promosi" name="nama_promosi"
                                value=" ">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Deskripsi Promosi</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="deskripsi_promosi" name="deskripsi_promosi"
                                value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tanggal_mulai" class="col-sm-5 col-form-label">Tanggal Mulai</label>
                        <div class="col-sm-7">
                            <div class="input-group">
                                <input type="text" class="form-control" id="tanggal_mulai" name="tanggal_mulai"
                                    placeholder="Pilih tanggal mulai">
                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tanggal_selesai" class="col-sm-5 col-form-label">Tanggal Selesai</label>
                        <div class="col-sm-7">
                            <div class="input-group">
                                <input type="text" class="form-control" id="tanggal_selesai" name="tanggal_selesai"
                                    placeholder="Pilih tanggal selesai">
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

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr('#tanggal_mulai', {
            dateFormat: 'Y-m-d',
            minDate: 'today', // Mulai dari hari ini
        });

        flatpickr('#tanggal_selesai', {
            dateFormat: 'Y-m-d',
            minDate: 'today', // Mulai dari hari ini
        });
    </script>


