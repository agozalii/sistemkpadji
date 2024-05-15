<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('inc.atas')
</head>
<body>




    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <img src="{{asset('assets/logo smp 3 godean.png')}}" alt="profile">
                </div>

                <div class="sidebar-menu">


                    <ul class="menu" >
                        @if ($user->role == 'admin')

                        <li class="sidebar-item ">
                            <a href="{{url('')}}" class="sidebar-link">
                                <i class="fa-solid fa-house" width="15"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>



                        <li class="sidebar-item">
                            <a href="{{url('ekstrakurikuler')}}" class="sidebar-link">
                                <i class="fa-solid fa-medal"></i>
                                <span>Ekstrakurikuler</span>
                            </a>
                        </li>


                        <li class="sidebar-item">
                            <a href="{{url ('kegiatan')}}" class="sidebar-link">
                                <i class="fa-solid fa-calendar-days"></i>
                                <span>Kegiatan</span>
                            </a>
                        </li>

                        <li class="sidebar-item has-sub">
                            <a href="" class="sidebar-link">
                                <i class="fa-solid fa-users-line"></i>
                                <span>Data Pengguna</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="submenu active">

                                <li>
                                    <a href="{{ url ('penggunaPembina')}}">Pembina</a>
                                </li>
                                <li>
                                    <a href="{{ url ('penggunaSiswa')}}">Siswa</a>
                                </li>
                                <li>
                                    <a href="{{ url ('penggunaAdmin')}}">Admin</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{url ('laporan')}}" class="sidebar-link">
                                <i class="fa-regular fa-clipboard"></i>
                                <span>Laporan Pendaftaran</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{url('laporanKegiatan')}}" class="sidebar-link">
                                <i class="fa-solid fa-table-list"></i>
                                <span>Laporan Kegiatan</span>
                            </a>
                        </li>

                        {{-- <li class="sidebar-item">
                            <a href="{{url ('pendaftaran')}}" class="sidebar-link">
                                <i class="fa-regular fa-id-badge"></i>
                                <span>Pendaftaran</span>
                            </a>
                        </li> --}}

                        @elseif ($user->role == 'pembina')
                        <li class="sidebar-item ">
                            <a href="{{url('')}}" class="sidebar-link">
                                <i class="fa-solid fa-house" width="15"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{url ('Kegiatan')}}" class="sidebar-link">
                                <i class="fa-solid fa-house" width="15"></i>
                                <span>Kegiatan</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{url ('Laporan')}}" class="sidebar-link">
                                <i class="fa-solid fa-house" width="15"></i>
                                <span>Laporan Pendaftaran</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{url('LaporanKegiatan')}}" class="sidebar-link">
                                <i class="fa-solid fa-house" width="15"></i>
                                <span>Laporan Kegiatan</span>
                            </a>
                        </li>

                        @elseif($user->role == 'siswa')
                        <li class="sidebar-item ">
                            <a href="{{url('')}}" class="sidebar-link">
                                <i class="fa-solid fa-house" width="15"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{url('Ekstrakurikuler')}}" class="sidebar-link">
                                <i class="fa-solid fa-medal"></i>
                                <span>Ekstrakurikuler</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{url ('Pendaftaran')}}" class="sidebar-link">
                                <i class="fa-regular fa-id-badge"></i>
                                <span>Pendaftaran</span>
                            </a>
                        </li>




                    </ul>
                    @endif

                </div>
                <button class=" sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>


            <div id="main">
                <nav class=" navbar navbar-header navbar-expand navrbar-light">
                    <a class=" sidebar-toggler" href="#"><span class=" navbar-toggler-icon"></span></a>
                    <button class=" btn navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <h2 class="ms-auto"><marquee>SISTEM INFORMASI EKSTRAKURIKULER SMP</marquee></h2>
                        <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                            <li class="dropdown">
                                <a href="#" data-bs-toggle="dropdown"
                                    class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                    <i class="fa-solid fa-user"></i> {{ $user->nama}}
                                    <div class="d-none d-md-block d-lg-inline-block ms-3">

                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    {{-- <a class="dropdown-item" href="{{url('akunprofile')}}"><i data-feather="user"></i> Account</a>
                                    <div class="dropdown-divider"></div> --}}
                                    <a class="dropdown-item" href="logout"><i data-feather="log-out"></i> Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>

                <div class=" main-content container-fluid">
                    @yield('content')
                </div>
            </div>

        </div>
    </div>



@include('inc.script')

</body>
</html>
