@extends('layout.mainuser')

@include('sweetalert::alert')

@section('judul')
    <strong>Halaman Produk</strong>
@endsection

@section('content')
    <main class="main main-product" style="margin-top: 75px" role="main">
        <div class="container">
            <h1 class="text-center" style="border-bottom: 4px solid #148E8E; padding-bottom: 8px;">Kritik & Saran</h1>

            <div class="page">
                <div class="wrapper">
                    <div class="page-hero">
                        <!-- Breadcrumb dan judul header -->
                    </div>
                    <div id="addpesan">
                        <div class="page-content">
                            <div class="contact">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="contact-form">
                                            <div class="heading">
                                                <!-- <h3 class="title">Dapatkan Informasi</h3> -->
                                                <p class="subtitle" style="padding-top: 30px;">Beri tahu kami informasi apa yang ingin anda dapatkan
                                                </p>
                                            </div>
                                            <form id="formData" action="{{ route('simpanKritikSaran') }}"
                                                enctype="multipart/form-data" method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="contact_name" class="form-label">Nama</label>
                                                    <input type="text" name="nama" class="form-control" id="nama"
                                                        placeholder="Nama" aria-describedby="nameHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="contact_email" class="form-label">Email</label>
                                                    <input type="email" name="email" class="form-control" id="email"
                                                        placeholder="Email" aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="contact_phone" class="form-label">No. Telepon</label>
                                                    <input type="number" name="no_telpon" class="form-control"
                                                        id="no_telpon" placeholder="No. Telepon"
                                                        aria-describedby="phoneHelp">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="contact_message" class="form-label">Pesan Anda</label>
                                                    <textarea name="pesan" class="form-control" id="pesan" rows="5" placeholder="Pesan Anda"></textarea>
                                                </div>
                                                <button style="background-color: #237e79"
                                                    class="btn btn-success mb-3 submitKritikSaran" type="submit">
                                                    <span> Tambah Produk</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-4" style="padding-top: 30px;">
                                        <div class="contact-info">
                                            <div class="section">
                                                <p class="heading"><i class="fas fa-clock"></i> Jam Buka</p>
                                                <p class="text">Senin - Jumat : 09:00 - 17:00. Tutup hari Sabtu, Minggu
                                                    dan
                                                    Libur Nasional.</p>
                                            </div>
                                            <div class="section">
                                                <p class="heading"><i class="fas fa-envelope"></i> Email</p>
                                                <!-- Masukkan alamat email yang sesuai di sini -->
                                            </div>
                                            <div class="section">
                                                <p class="heading"><i class="fas fa-phone-square"></i> No. Telepon</p>
                                                <p class="text">+62 895-1619-9993</p>
                                                <!-- Masukkan nomor telepon yang sesuai di sini -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="tampilData" style="display:none;"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function() {
    $('#formData').submit(function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Serialize the form data
        var formData = $(this).serialize();

        // Kirim Ajax request untuk menyimpan data
        $.ajax({
            url: '{{ route('simpanKritikSaran') }}',
            type: 'POST',
            data: formData,
            success: function(response) {
                // Tampilkan pesan sukses menggunakan SweetAlert
                Swal.fire({
                    title: 'Pesan Berhasil Terkirim',
                    text: 'Terimakasih atas feeback yang anda berikan',
                    icon: 'success'
                });

                // Reset form input
                $('#formData')[0].reset();
            },
            error: function(xhr, status, error) {
                // Tampilkan pesan error menggunakan SweetAlert
                Swal.fire({
                    title: 'Error',
                    text: 'Terjadi kesalahan saat menyimpan data.',
                    icon: 'error'
                });
            }
        });
    });
});

    </script>
@endsection
