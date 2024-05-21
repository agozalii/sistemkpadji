@extends('layout.main')

@include('sweetalert::alert')

@section('judul')
<strong>Halaman Promosi</strong>
@endsection

@section('isi')
<div class="card">
    <div class="card-body">



        <div class="row">
            <div class="col-md-6">
                <button style="background-color: #237e79" class="btn btn-success mb-3" id="addDatapromosi">
                    <i class="fa fa-plus"></i>
                    <span> Tambah Promosi</span>

                </button>
            </div>
            <div class="col-md-6">
                <form action="/promosi" role="search" method="GET" class="form-inline float-right">
                    <a href="{{ route('promosi.index') }}" class="btn ml-2 mr-2">
                        <i class="fas fa-sync-alt"></i> <!-- Ikon refresh -->
                    </a>
                    <input type="text" name="query" class="form-control mr-2" placeholder="Cari promosi..."
                        style="width: 400px" name="search" value="{{ request('search') }}">
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
                        <th width="100px">Id</th>
                        <th width="200px">Gambar</th>
                        <th width="250px">Nama</th>
                        <th width="150px">Deskripsi</th>
                        <th width="150px">Tanggal Mulai</th>
                        <th width="150px">Tanggal Selesai</th>
                        <th width="150px">Promo Value</th>
                        <th width="150px">Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $y => $x)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $x->id }}</td>
                        <td><img src="{{ asset('storage/promosi/' . $x->gambar_promosi) }}" alt="Gambar Promosi"
                                width="100"></td>
                        <td>{{ $x->nama_promosi }}</td>
                        <td>{{ $x->deskripsi_promosi }}</td>
                        <td>{{ $x->tanggal_mulai }}</td>
                        <td>{{ $x->tanggal_selesai }}</td>
                        <td>{{ $x->promosi_value != null ? $x->promosi_value.'%' : '' }}</td>
                        <td>

                            <button class="btn btn-info editPromosi" data-id="{{ $x->id }}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger deletePromosi" data-id="{{ $x->id }}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <div class="tampilData" style="display:none;"></div>
    <div class="tampilEditData" style="display:none;"></div>




    <script>
        $('#addDatapromosi').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route('addPromosi') }}',
                success: function(response) {
                    $('.tampilData').html(response).show();
                    $('#addPromosi').modal("show");
                }
            });
        });

        $('.editPromosi').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            $.ajax({
                type: "GET",
                url: "{{ route('editPromosi', ['id' => ':id']) }}".replace(':id', id),
                success: function(response) {
                    $('.tampilEditData').html(response).show();
                    $('#editPromosi').modal("show");
                }
            });
        });

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $('.deletePromosi').click(function(e) {
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
                        url: "{{ route('deletePromosi', ['id' => ':id']) }}".replace(':id', id),
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