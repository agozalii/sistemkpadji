@extends('layout.main')

@include('sweetalert::alert')

@section('judul')
    <strong>Halaman Kategori</strong>
@endsection

@section('isi')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <button style="background-color: #237e79" class="btn btn-success mb-3" id="addData">
                        <i class="fa fa-plus"></i>
                        <span> Tambah Kategori</span>

                    </button>
                </div>
                <div class="col-md-6">
                    <form action="/admin/kategori" role="search" method="GET" class="form-inline float-right">
                        <a href="{{ route('admin.kategori') }}" class="btn ml-2 mr-2">
                            <i class="fas fa-sync-alt"></i> <!-- Ikon refresh -->
                        </a>
                        <input type="text" name="query" class="form-control mr-2" placeholder="Cari kategori ..."
                            style="width: 400px" name="search" value="{{ $search }}">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif
            <div class="table-responsive" style="overflow-x: auto; height: 600px;">
                <table class="table table-bordered table-striped" style="min-width: 1500px; overflow-y: auto;">
                    <thead>
                        <tr>
                            <th width="50px" scope="col">No</th>
                            <th width="200px">Nama Kategori</th>
                            <th width="250px">Status</th>
                            <th width="150px">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                        @endphp
                        @foreach ($data as $y => $x)
                            <tr>
                                <th scope="row">{{ $data->firstItem() + $loop->index }}</th>
                                <td>{{ $x->name }}</td>
                                <td>
                                    @if ($x->status == 1)
                                        <span class="badge badge-success">Aktif</span>
                                    @else
                                        <span class="badge badge-danger">Tidak Aktif</span>
                                    @endif
                                </td>
                                <td>

                                    <button class="btn btn-info editKategori" data-id="{{ $x->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger deleteKategori" data-id="{{ $x->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-2">
                <ul class="pagination">
                    <li class="page-item">
                        @if ($data->previousPageUrl())
                            <a href="{{ $data->previousPageUrl() }}" class="page-link">&laquo; Sebelumnya</a>
                        @else
                            <span class="page-link disabled ">&laquo; Sebelumnya</span>
                        @endif
                    </li>

                    <li class="page-item">
                        @if ($data->nextPageUrl())
                            <a href="{{ $data->nextPageUrl() }}" class="page-link">Berikutnya &raquo;</a>
                        @else
                            <span class="page-link disabled">Berikutnya &raquo;</span>
                        @endif
                    </li>
                </ul>
            </div>

            <p class="text-center">Menampilkan {{ $data->firstItem() }} - {{ $data->lastItem() }}, dari total
                {{ $data->total() }}</p>

        </div>
        <div class="tampilData" style="display:none;"></div>
        <div class="tampilEditData" style="display:none;"></div>


        <script>
            $('#addData').click(function(e) {
                e.preventDefault();
                $.ajax({
                    url: '{{ route('addKategori') }}',
                    success: function(response) {
                        $('.tampilData').html(response).show();
                        $('#addKategori').modal("show");
                    }
                });
            });

            $('.editKategori').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    url: "{{ route('editKategori', ['id' => ':id']) }}".replace(':id', id),
                    success: function(response) {
                        $('.tampilEditData').html(response).show();
                        $('#editKategori').modal("show");
                    }
                });
            });

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });
            $('.deleteKategori').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener("mouseenter", Swal.stopTimer);
                        toast.addEventListener("mouseleave", Swal.resumeTimer);
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                    },
                });

                Swal.fire({
                    title: 'Hapus data ?',
                    text: "Kamu yakin untuk menghapus data ini ",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "GET",
                            url: "{{ route('deleteKategori', ['id' => ':id']) }}".replace(':id', id),
                            dataType: "json",
                            success: function(response) {
                                // ini diambil dari controller
                                if (response.status === 'success') {
                                    Toast.fire({
                                        icon: "success",
                                        // ini diambil dari controller
                                        title: response.message,
                                    });
                                    // window.location.reload()
                                }
                            },
                            error: function(xhr, status, error) {
                                // Tampilkan notifikasi error jika terjadi kesalahan
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Terjadi kesalahan saat menghapus data',
                                    icon: 'error'
                                });
                            }
                        });
                    }
                })
            });
        </script>
    @endsection
