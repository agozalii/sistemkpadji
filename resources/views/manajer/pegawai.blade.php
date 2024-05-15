@extends('layout.main')

@include('sweetalert::alert')

@section('judul')
    <strong>Halaman Users</strong>
@endsection

@section('isi')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <button style="background-color: #237e79" class="btn btn-success mb-3" id="addData">
                    <i class="fa fa-plus"></i>
                    <span> Tambah Produk</span>

                </button>
            </div>
            <div class="col-md-6">
                <form action="/produk" role="search" method="GET" class="form-inline float-right">
                    <a href="{{ route('produk.index') }}" class="btn ml-2 mr-2">
                        <i class="fas fa-sync-alt"></i> <!-- Ikon refresh -->
                    </a>
                    <input type="text" name="query" class="form-control mr-2" placeholder="Cari produk..."
                        style="width: 400px" name="search" value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>
            </div>
        </div>
                    <div class="table-responsive" style="overflow-x: auto; height: 600px;">
                        <table class="table table-bordered table-striped" style="min-width: 1500px; overflow-y: auto;">
                            <thead>
                                <tr>
                                    <th width="50px" scope="col">No</th>
                                    <th width="100px">ID</th>
                                    <th width="250px">Nama</th>
                                    <th width="200px">Username</th>
                                    <th width="200px">password</th>
                                    <th width="150px">Role</th>
                                    <th width="150px">Jenis Kelamin</th>
                                    <th width="150px">Nomor Telpon</th>
                                    <th width="150px">Email</th>
                                    <th width="250px">Alamat</th>
                                    <th width="150px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->nama }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->password }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>{{ $user->jenis_kelamin }}</td>
                                        <td>{{ $user->nomor_telpon }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->alamat }}</td>
                                        <td>
                                            <!-- Tambahkan tombol edit dan hapus di sini -->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tampilData" style="display:none;"></div>
    <div class="tampilEditData" style="display:none;"></div>


    <script>
        $('#addData').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route('addPegawai') }}',
                success: function(response) {
                    $('.tampilData').html(response).show();
                    $('#addPegawai').modal("show");
                }
            });
        });

        $('.editProduk').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            $.ajax({
                type: "GET",
                url: "{{ route('editProduk', ['id' => ':id']) }}".replace(':id', id),
                success: function(response) {
                    $('.tampilEditData').html(response).show();
                    $('#editProduk').modal("show");
                }
            });
        });

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $('.deleteProduk').click(function(e) {
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
                        url: "{{ route('deleteProduk', ['id' => ':id']) }}".replace(':id', id),
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
