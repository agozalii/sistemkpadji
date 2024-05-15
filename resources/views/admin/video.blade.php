@extends('layout.main')

@include('sweetalert::alert')

@section('judul')
    <strong>Halaman Video</strong>
@endsection

@section('isi')
    <div class="card">
        <div class="card-body">



            <div class="row">
                <div class="col-md-6">
                    <button style="background-color: #237e79" class="btn btn-success mb-3" id="addDataVideo">
                        <i class="fa fa-plus"></i>
                        <span> Tambah Video</span>

                    </button>
                </div>
                <div class="col-md-6">
                    <form action="/video" role="search" method="GET" class="form-inline float-right">
                        <a href="{{ route('video.index') }}" class="btn ml-2 mr-2">
                            <i class="fas fa-sync-alt"></i> <!-- Ikon refresh -->
                        </a>
                        <input type="text" name="query" class="form-control mr-2" placeholder="Cari video..."
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
                            <th width="50px" scope="col">Id</th>
                            <th width="100px">Nama Admin</th>
                            <th width="100px">Tumbnail</th>
                            <th width="200px">Video</th>
                            <th width="250px">Judul</th>
                            <th width="250px">Deskripsi</th>
                            <th width="250px">Aksi</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $y => $x)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $x->id }}</td>
                                <td>{{ $x->user->nama }}</td>
                                <td><img src="{{ asset('storage/tumbnail/' . $x->tumbnail) }}" alt="Gambar Produk"
                                    width="100"></td>
                                <td>
                                    <video width="320" height="150" controls>
                                        <source src="{{ asset('storage/videos/' . $x->video) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </td>
                                <td>{{ $x->judul_video }}</td>
                                <td>{{ $x->deskripsi_video }}</td>
                                <td>

                                    <button class="btn btn-info editVideo" data-id="{{ $x->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger deleteVideo" data-id="{{ $x->id }}">
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
        $('#addDataVideo').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route('addVideo') }}',
                success: function(response) {
                    $('.tampilData').html(response).show();
                    $('#addVideo').modal("show");
                }
            });
        });

        $('.editVideo').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            $.ajax({
                type: "GET",
                url: "{{ route('editVideo', ['id' => ':id']) }}".replace(':id', id),
                success: function(response) {
                    $('.tampilEditData').html(response).show();
                    $('#editVideo').modal("show");
                }
            });
        });

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $('.deleteVideo').click(function(e) {
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
                        url: "{{ route('deleteVideo', ['id' => ':id']) }}".replace(':id', id),
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
