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
    <h1 class="text-center mt-4">Galeri Video</h1>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                        <ul class="nav nav-tabs" style="justify-content: center;align-items: center"
                            id="custom-tabs-three-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link {{ $kategori == '' || $kategori == 'review' ? 'active' : '' }}"
                                    id="custom-tabs-three-review-tab" data-toggle="pill" href="#custom-tabs-three-review"
                                    role="tab" aria-controls="custom-tabs-three-review" aria-selected="true">Review &
                                    Unboxing</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $kategori == 'tutorial' ? 'active' : '' }}"
                                    id="custom-tabs-three-tutorial-tab" data-toggle="pill"
                                    href="#custom-tabs-three-tutorial" role="tab"
                                    aria-controls="custom-tabs-three-tutorial" aria-selected="false">Tutorial Penggunaan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $kategori == 'tips' ? 'active' : '' }}"
                                    id="custom-tabs-three-tips-tab" data-toggle="pill" href="#custom-tabs-three-tips"
                                    role="tab" aria-controls="custom-tabs-three-tips" aria-selected="false">Tips and
                                    Trik</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ $kategori == 'petualangan' ? 'active' : '' }}"
                                    id="custom-tabs-three-petualangan-tab" data-toggle="pill"
                                    href="#custom-tabs-three-petualangan" role="tab"
                                    aria-controls="custom-tabs-three-petualangan" aria-selected="false">Petualangan Anda</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-three-tabContent">
                            <div class="tab-pane fade {{ $kategori == '' || $kategori == 'review' ? 'show active' : '' }}"
                                id="custom-tabs-three-review" role="tabpanel"
                                aria-labelledby="custom-tabs-three-review-tab">
                                <div class="row">
                                    @foreach ($reviews as $video)
                                        <div class="col-md-6" style="margin-top:50px;">
                                            <a href="#" class="video-link"
                                                data-video="{{ asset('storage/videos/' . $video->video) }}">
                                                <div class="thumbnail-container">
                                                    <div class="thumbnail-wrapper">
                                                        <img src="{{ asset('storage/tumbnail/' . $video->tumbnail) }}"
                                                            alt="Thumbnail" class="thumbnail-img" style="width: 90%">
                                                        <img src="{{ asset('storage/img/play.png') }}" alt="Play"
                                                            class="play-icon">
                                                    </div>
                                                </div>
                                            </a>
                                            <p style="margin-top: 8px; font-weight: bold; font-size: 25px; color: #148E8E;">
                                                {{ $video->judul_video }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade {{ $kategori == 'tutorial' ? 'show active' : '' }}"
                                id="custom-tabs-three-tutorial" role="tabpanel"
                                aria-labelledby="custom-tabs-three-tutorial-tab">
                                @foreach ($tutorials as $video)
                                    <div class="col-md-6" style="margin-top:50px;">
                                        <a href="#" class="video-link"
                                            data-video="{{ asset('storage/videos/' . $video->video) }}">
                                            <div class="thumbnail-container">
                                                <div class="thumbnail-wrapper">
                                                    <img src="{{ asset('storage/tumbnail/' . $video->tumbnail) }}"
                                                        alt="Thumbnail" class="thumbnail-img" style="width: 90%">
                                                    <img src="{{ asset('storage/img/play.png') }}" alt="Play"
                                                        class="play-icon">
                                                </div>
                                            </div>
                                        </a>
                                        <p style="margin-top: 8px; font-weight: bold; font-size: 25px; color: #148E8E;">
                                            {{ $video->judul_video }}</p>
                                    </div>
                                @endforeach
                            </div>
                            <div class="tab-pane fade {{ $kategori == 'tips' ? 'show active' : '' }}"
                                id="custom-tabs-three-tips" role="tabpanel" aria-labelledby="custom-tabs-three-tips-tab">
                                @foreach ($tips as $video)
                                    <div class="col-md-6" style="margin-top:50px;">
                                        <a href="#" class="video-link"
                                            data-video="{{ asset('storage/videos/' . $video->video) }}">
                                            <div class="thumbnail-container">
                                                <div class="thumbnail-wrapper">
                                                    <img src="{{ asset('storage/tumbnail/' . $video->tumbnail) }}"
                                                        alt="Thumbnail" class="thumbnail-img" style="width: 90%">
                                                    <img src="{{ asset('storage/img/play.png') }}" alt="Play"
                                                        class="play-icon">
                                                </div>
                                            </div>
                                        </a>
                                        <p style="margin-top: 8px; font-weight: bold; font-size: 25px; color: #148E8E;">
                                            {{ $video->judul_video }}</p>
                                    </div>
                                @endforeach
                            </div>
                            <div class="tab-pane fade {{ $kategori == 'petualangan' ? 'show active' : '' }}"
                                id="custom-tabs-three-petualangan" role="tabpanel"
                                aria-labelledby="custom-tabs-three-petualangan-tab">
                                @foreach ($petualangans as $video)
                                    <div class="col-md-6" style="margin-top:50px;">
                                        <a href="#" class="video-link"
                                            data-video="{{ asset('storage/videos/' . $video->video) }}">
                                            <div class="thumbnail-container">
                                                <div class="thumbnail-wrapper">
                                                    <img src="{{ asset('storage/tumbnail/' . $video->tumbnail) }}"
                                                        alt="Thumbnail" class="thumbnail-img" style="width: 90%">
                                                    <img src="{{ asset('storage/img/play.png') }}" alt="Play"
                                                        class="play-icon">
                                                </div>
                                            </div>
                                        </a>
                                        <p style="margin-top: 8px; font-weight: bold; font-size: 25px; color: #148E8E;">
                                            {{ $video->judul_video }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel"
        aria-hidden="true">
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
                $(this).find('.thumbnail-img').removeClass(
                    'zoomed'); // Hapus class zoomed untuk kembali ke ukuran normal
            });
        });
    </script>
    <style>
        /* Mengatur lebar modal */
        .modal-lg {
            max-width: 80%;
            /* Ubah sesuai kebutuhan, misalnya 80% dari lebar layar */
        }

        /* Mengatur tinggi modal */
        .modal-content {
            max-height: auto;
            /* Ubah sesuai kebutuhan, misalnya 80% dari tinggi layar */
            overflow-y: hidden;
            /* Menambahkan scroll jika konten melebihi tinggi maksimum */
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 9999;
            /* Pastikan tombol close berada di atas konten lain */
            background-color: transparent;
            border: none;
            font-size: 24px;
            color: #fff;
            /* Ubah warna sesuai kebutuhan */
            cursor: pointer;
        }

        /* CSS untuk menutup modal */
        .modal-close {
            display: none;
            /* Sembunyikan tombol close secara default */
        }

        .modal-backdrop {
            background-color: rgb(0, 0, 0) !important;
            /* Ubah alpha channel (0.5) sesuai kebutuhan untuk kegelapan yang diinginkan */
        }

        .play-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 75px;
            /* Ukuran gambar play */
            height: 75px;
            /* Ukuran gambar play */
            z-index: 1;
            /* Pastikan gambar play di atas gambar video */
        }

        .thumbnail-container {
            overflow: hidden;
            position: relative;
            width: 560px;
            /* Ubah sesuai ukuran thumbnail */
            height: 315px;
            /* Ubah sesuai ukuran thumbnail */
        }

        .thumbnail-wrapper {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .thumbnail-img {
            transition: transform 0.3s ease;
            /* Efek transisi untuk perubahan ukuran */
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .thumbnail-img.zoomed {
            transform: scale(1.05);
            /* Perbesar gambar saat hover */
        }
    </style>
@endsection
