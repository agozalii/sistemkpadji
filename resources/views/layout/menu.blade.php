<li class="nav-item">
    <a href="{{ url('home') }}" class="nav-link">
        <i class="nav-icon fa-solid fa-house ml-2"></i>
        <p style="color: white">
            Beranda
        </p>
    </a>
</li>


@if ($user->role == 'admin')
    <li class="nav-header"><strong style="color: white">DATA MASTER</strong></li>
    <li class="nav-item">
        <a href="{{ url('admin/kategori') }}" class="nav-link">
            <i class="nav-icon fa-solid fa-list ml-2"></i>
            <p style="color: white">
                Kategori
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ url('produk') }}" class="nav-link">
            <i class="nav-icon fa-solid fa-box ml-2"></i>
            <p style="color: white">
                Produk
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ url('video') }}" class="nav-link">
            <i class="nav-icon fa-solid fa-video ml-2"></i>
            <p style="color: white">
                Video
            </p>
        </a>
    </li>
    <li class="nav-header"><strong style="color: white">DATA TRANSAKSI</strong></li>
    <li class="nav-item">
        <a href="{{ url('transaksi') }}" class="nav-link">
            <i class="nav-icon fa-solid fa-bag-shopping ml-2"></i>
            <p style="color: white">
                Transaksi
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ url('promosi') }}" class="nav-link">
            <i class="nav-icon fa-solid fa-bullhorn ml-2"></i>
            <p style="color: white">
                Promosi
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ url('admin/kritiksaran') }}" class="nav-link">
            <i class="nav-icon fa-solid fa-comment ml-2"></i>
            <p style="color: white">
                Kritik & Saran
            </p>
        </a>
    </li>
    <li class="nav-header"><strong style="color: white">LAPORAN</strong></li>
    <li class="nav-item">
        <a href="{{ url('laporan') }}" class="nav-link">
            <i class="nav-icon fa-solid fa-file ml-2"></i>
            <p style="color: white">
                Laporan
            </p>
        </a>
    </li>
@elseif ($user->role == 'manajer')
    <li class="nav-header" style="color: white">LAPORAN</li>
    <li class="nav-item">
        <a href="{{ url('/manajer/pegawai') }}" class="nav-link">
            <i class="nav-icon fa-solid fa-user ml-2"></i>
            <p style="color: white">
                Data Pegawai
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-file ml-2"></i>
            <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ url('/manajer/laporanPenjualan') }}" class="nav-link">
                    <i class="far fa-circle nav-icon ml-2"></i>
                    <p>Laporan Penjualan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/manajer/laporanPromosi') }}" class="nav-link">
                    <i class="far fa-circle nav-icon ml-2"></i>
                    <p>Laporan Promosi</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="{{ url('/manajer/kritiksaran') }}" class="nav-link">
            <i class="nav-icon fa-solid fa-comment ml-2"></i>
            <p style="color: white">
                Kritik & Saran
            </p>
        </a>
    </li>
@endif
