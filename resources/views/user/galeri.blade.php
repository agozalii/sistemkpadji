@extends('layout.mainuser')

@include('sweetalert::alert')

@section('judul')
    <strong>Halaman Galeri</strong>
@endsection

@section('content')

    <video id="myVideo" style="margin-top: -20px;" autoplay loop muted>
        <source src="{{ asset('storage/vid/videoheader.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="container">
        <div class="row">
            @foreach ($videos as $video)
            <div class="col-md-6" style="margin-top:50px;">
                <a href="#" class="video-link" data-video="{{ asset('storage/videos/' . $video->video) }}">
                    <div class="thumbnail-container">
                        <div class="thumbnail-wrapper">
                            <img src="{{ asset('storage/tumbnail/' . $video->tumbnail) }}" alt="Thumbnail" class="thumbnail-img">
                            <img src="{{ asset('storage/img/play.png') }}" alt="Play" class="play-icon">
                        </div>
                    </div>
                </a>
                <p style="margin-top: 8px; font-weight: bold; font-size: 25px; color: #148E8E;">{{ $video->judul_video }}</p>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Hapus bagian modal-header -->

                <div class="modal-body">
                    <div class="embed-responsive embed-responsive-16by9">
                        <video id="videoPlayer" class="embed-responsive-item" controls autoplay>
                            <source src="" type="video/mp4">
                            Browser Anda tidak mendukung tag video.
                        </video>
                        <!-- Tombol close di pojok kanan atas video -->
                        <button type="button" class="close-btn" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script>
        $(document).ready(function() {
            $('.video-link').click(function(e) {
                e.preventDefault();
                var videoSrc = $(this).data('video');
                // var videoTitle = $(this).data('title');
                // var videoDescription = $(this).data('description');

                // $('#videoModalLabel').text(videoTitle);
                $('#videoPlayer source').attr('src', videoSrc);
                $('#videoPlayer')[0].load(); // Load the new video source
                $('#videoModal').modal('show');
                // $('#videoDescription').html('<p>' + videoDescription + '</p>');
            });
            $('#videoModal').on('hidden.bs.modal', function() {
                $('#videoPlayer')[0].pause(); // Pause the video when modal is closed
            });

            // Efek membesar saat hover pada gambar thumbnail
            $('.thumbnail-container').hover(function() {
                $(this).find('.thumbnail-img').addClass('zoomed'); // Tambahkan class zoomed untuk efek zoom
            }, function() {
                $(this).find('.thumbnail-img').removeClass('zoomed'); // Hapus class zoomed untuk kembali ke ukuran normal
            });
        });
    </script>
<style>
    /* Mengatur lebar modal */
    .modal-lg {
        max-width: 80%; /* Ubah sesuai kebutuhan, misalnya 80% dari lebar layar */
    }

    /* Mengatur tinggi modal */
    .modal-content {
        max-height: auto; /* Ubah sesuai kebutuhan, misalnya 80% dari tinggi layar */
        overflow-y: hidden; /* Menambahkan scroll jika konten melebihi tinggi maksimum */
    }
    .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 9999; /* Pastikan tombol close berada di atas konten lain */
        background-color: transparent;
        border: none;
        font-size: 24px;
        color: #fff; /* Ubah warna sesuai kebutuhan */
        cursor: pointer;
    }

    /* CSS untuk menutup modal */
    .modal-close {
        display: none; /* Sembunyikan tombol close secara default */
    }
    .modal-backdrop {
        background-color: rgb(0, 0, 0) !important; /* Ubah alpha channel (0.5) sesuai kebutuhan untuk kegelapan yang diinginkan */
    }
    .play-icon {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 75px; /* Ukuran gambar play */
        height: 75px; /* Ukuran gambar play */
        z-index: 1; /* Pastikan gambar play di atas gambar video */
    }
    .thumbnail-container {
        overflow: hidden;
        position: relative;
        width: 560px; /* Ubah sesuai ukuran thumbnail */
        height: 315px; /* Ubah sesuai ukuran thumbnail */
    }
    .thumbnail-wrapper {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    .thumbnail-img {
        transition: transform 0.3s ease; /* Efek transisi untuk perubahan ukuran */
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .thumbnail-img.zoomed {
        transform: scale(1.05); /* Perbesar gambar saat hover */
    }
</style>

@endsection
