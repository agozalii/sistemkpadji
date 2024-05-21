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
                            <input type="text" class="form-control" id="id" name="id"
                                value="{{ $id }} " readonly>
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
                    <div class="mb-3 row">
                        <label for="promosi_value" class="col-sm-5 col-form-label">Promo Value</label>
                        <div class="col-sm-7">
                            <div class="input-group">
                                <input type="number" class="form-control" id="promosi_value" name="promosi_value"
                                    placeholder="%">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-5 d-inline-block">
                            <label class="form-label">Daftar Produk Promosi</label><br>
                            <button type="button" id="add-product" class="btn btn-primary mt-2"><i
                                    class="fa fa-plus"></i> Tambah produk</button>
                        </div>
                        <div class="col-sm-7" id="produks-container">
                            <div class="produks-item mb-2">
                                <select class="form-control" name="produks[]" id="produks">
                                    <option value="">-- Pilih --</option>
                                    @foreach ($produks as $produk)
                                        <option value="{{ $produk->id }}">{{ $produk->nama_produk }}</option>
                                    @endforeach
                                </select>
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
    // Fungsi untuk menambahkan elemen form select baru
    document.getElementById('add-product').addEventListener('click', function() {
        var container = document.getElementById('produks-container');

        var newItem = document.createElement('div');
        newItem.className = 'produks-item mb-3';

        newItem.innerHTML = `
        <select class="form-control" name="produks[]" id="produks">
            <option value="">-- Pilih --</option>
            @foreach ($produks as $produk)
                <option value="{{ $produk->id }}">{{ $produk->nama_produk }}</option>
            @endforeach
        </select>
    `;

        if (container.querySelectorAll('.produks-item').length > 0) {
            var deleteButton = document.createElement('button');
            deleteButton.type = 'button';
            deleteButton.className = 'btn btn-danger delete-product mt-2';
            deleteButton.innerHTML = '<i class="fa fa-trash"></i>';
            newItem.appendChild(deleteButton);
        }

        container.appendChild(newItem);

        // Tampilkan tombol hapus jika jumlah elemen form select lebih dari 1
        if (container.querySelectorAll('.produks-item').length > 1) {
            document.querySelectorAll('.delete-product').forEach(function(btn) {
                btn.style.display = 'inline-block';
            });
        }
    });

    // Fungsi untuk menghapus elemen form select
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('delete-product')) {
            var container = event.target.parentNode.parentNode;
            container.removeChild(event.target.parentNode);

            // Sembunyikan tombol hapus jika jumlah elemen form select menjadi 1
            if (container.querySelectorAll('.produks-item').length === 1) {
                document.querySelectorAll('.delete-product').forEach(function(btn) {
                    btn.style.display = 'none';
                });
            }
        }
    });
</script>
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
