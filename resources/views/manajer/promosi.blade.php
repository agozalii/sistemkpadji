@extends('layout.main')

@include('sweetalert::alert')

@section('judul')
<strong>Laporan Promosi</strong>
@endsection

@section('isi')
<style>
    .checked {
        color: orange;
    }
</style>
<div class="card">
    <div class="card-header">
        <div class="mt-2">
            <form action="{{ route('laporan.promosi') }}" method="GET">
                <div class="row">
                    <div class="col-md-3">
                        <label for="tgl_awal">Tgl. Awal</label>
                        <input type="date" name="tgl_awal" class="form-control" id="datepicker" placeholder="Tgl. Awal"
                            value="{{ $tgl_awal }}">
                    </div>
                    <div class="col-md-3">
                        <label for="tgl_akhir">Tgl. Akhir</label>
                        <input type="date" name="tgl_akhir" class="form-control" id="datepicker" placeholder="Tgl. Awal"
                            value="{{ $tgl_akhir }}">
                    </div>
                    <div class="col-md-3 d-inline-flex gap-1">
                        <button type="submit" class="btn btn-primary" style="margin-top: 32px"><i
                                class="fa fa-filter"></i> Filter</button>
                        <a href="{{ route('laporan.promosi') }}" class="btn btn-danger" style="margin-top: 32px"><i
                                class="fa fa-eraser"></i> Reset</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10" style="overflow-x: auto">
                <div>
                    <canvas id="promoChart" width="400" height="150"></canvas>
                </div>
            </div>
            <div class="col-md-1"></div>

        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h3 class="col-md-12 mb-4">Data Laporan Promosi</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive" style="overflow-x: auto; height: 600px;">
            <table id="example1" class="table table-bordered table-striped" style="min-width:1500px; overflow-y: auto;">
                <thead>
                    {{-- class="sticky-top" --}}
                    <tr style="text-align: center">
                        <th>No</th>
                        <th>Nama Promosi</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Penggunaan Promosi</th>
                        <th>Rating</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($data as $d)
                    <tr>
                        <th>{{ $no++ }}</th>
                        <td>{{ $d->nama_promosi }}</td>
                        <td>{{ date('d F Y', strtotime($d->tanggal_mulai)) }}</td>
                        <td>{{ date('d F Y', strtotime($d->tanggal_selesai)) }}</td>
                        <td>{{ $d->promosi_use }}</td>
                        <td>
                            @php
                            // Tentukan jumlah bintang yang dicentang berdasarkan nilai promosi_use
                            $promosi_use = $d->promosi_use;
                            if ($promosi_use >= 0 && $promosi_use <= 5) { $rating=1; } elseif ($promosi_use>= 6 &&
                                $promosi_use <= 10) { $rating=2; } elseif ($promosi_use>= 11 && $promosi_use <= 15) {
                                        $rating=3; } elseif ($promosi_use>= 16 && $promosi_use <= 20) { $rating=4; }
                                            else { $rating=5; } @endphp @for ($i=1; $i <=5; $i++) @if ($i <=$rating)
                                            <span class="fa fa-star checked"></span>
                                            @else
                                            <span class="fa fa-star"></span>
                                            @endif
                                            @endfor
                                            <span class="sr-only">{{ $rating }}</span>
                        </td>
                        <td>
                            @if ($d->promosi_use >= 0 && $d->promosi_use <= 5) <span class="badge bg-danger">Sangat
                                Kurang Baik</span>
                                @elseif ($d->promosi_use >= 6 && $d->promosi_use <= 10) <span class="badge bg-warning">
                                    Kurang Baik</span>
                                    @elseif ($d->promosi_use >= 11 && $d->promosi_use <= 15) <span
                                        class="badge bg-info">Cukup Baik</span>
                                        @elseif ($d->promosi_use >= 16 && $d->promosi_use <= 20) <span
                                            class="badge bg-primary">Baik</span>
                                            @else
                                            <span class="badge bg-success">Sangat Baik</span>
                                            @endif

                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    // Data promo dari PHP (hasil array)
    const salesData = @json($data);;

    // Ekstrak nama produk dan total penjualan
    const promoNames = salesData.map(item => item.nama_promosi);
    const promoUse = salesData.map(item => item.promosi_use);

    // Konfigurasi chart
    const ctx = document.getElementById('promoChart').getContext('2d');
    const promoChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: promoNames,
            datasets: [{
                label: 'Total Promosi Digunakan',
                data: promoUse,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<script>
    $(document).ready(function() {
            $('#example1').DataTable({
                dom: 'Blfrtip',
                buttons: [{
                    extend: 'pdf',
                    text: 'Print PDF',
                    title: 'Laporan Kinerja Promosi',
                    orientation: 'landscape',
                    customize: function(doc) {
                        var tableBody = doc.content[1].table.body;
                        tableBody.forEach(function(row) {
                            row.forEach(function(cell) {
                                cell.margin = [10, 5, 10,
                                    5
                                ]; // [left, top, right, bottom]
                            });
                        });

                        // Mengatur lebar kolom agar tabel memenuhi 100% lebar halaman
                        var objLayout = {};
                        objLayout['hLineWidth'] = function(i) {
                            return .5;
                        };
                        objLayout['vLineWidth'] = function(i) {
                            return .5;
                        };
                        objLayout['hLineColor'] = function(i) {
                            return '#aaa';
                        };
                        objLayout['vLineColor'] = function(i) {
                            return '#aaa';
                        };
                        objLayout['paddingLeft'] = function(i) {
                            return 10;
                        };
                        objLayout['paddingRight'] = function(i) {
                            return 10;
                        };
                        objLayout['paddingTop'] = function(i) {
                            return 5;
                        };
                        objLayout['paddingBottom'] = function(i) {
                            return 5;
                        };

                        doc.content[1].layout = objLayout;

                        // Mengatur lebar kolom pertama otomatis dan lainnya 100%
                        var widths = ['auto']; // Kolom pertama otomatis
                        var numCols = doc.content[1].table.body[0].length;
                        for (var i = 1; i < numCols; i++) {
                            widths.push('*');
                        }
                        doc.content[1].table.widths = widths;
                    }
                }],
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ]
            });
        });
</script>
@endsection