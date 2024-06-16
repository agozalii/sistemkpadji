@extends('layout.main')

@include('sweetalert::alert')

@section('judul')
<strong>Halaman Kelola Pegawai</strong>
@endsection

@section('isi')
<div class="card">
    <div class="card-body">



        <div class="row">
            <div class="col-md-6">
                <button style="background-color: #237e79" class="btn btn-success mb-3" id="addDataPegawai">
                    <i class="fa fa-plus"></i>
                    <span> Tambah Pegawai</span>

                </button>
            </div>
        </div>
        <div class="table-responsive" style="overflow-x: auto; height: 600px;">
            <table class="table table-bordered table-striped" style="min-width: 1000px; overflow-y: auto;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>USername</th>
                        <th>Role</th>
                        <th>Jenis KElamin</th>
                        <th>Nomer Telpn</th>
                        <th>Email</th>
                        <th>Alamt</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $y => $x)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $x->nama }}</td>
                        <td>{{ $x->username }}</td>
                        <td>{{ $x->role }}</td>
                        <td>{{ $x->jenis_kelamin }}</td>
                        <td>{{ $x->nomor_telpon}}</td>
                        <td>{{ $x->email}}</td>
                        <td>{{ $x->alamat}}</td>
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
        $('#addDataPegawai').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route('addPegawai') }}',
                success: function(response) {
                    $('.tampilData').html(response).show();
                    $('#addPegawai').modal("show");
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
