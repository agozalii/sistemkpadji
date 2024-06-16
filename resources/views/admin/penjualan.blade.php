@extends('layout.main')

@include('sweetalert::alert')

@section('judul')
<strong>Laporan Penjualan</strong>
@endsection

@section('isi')
<div class="card">
    <div class="card-header">
        <div class="mt-2">
            <form action="{{ route('laporan.penjualan.admin') }}" method="GET">
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
                        <a href="{{ route('laporan.penjualan') }}" class="btn btn-danger" style="margin-top: 32px"><i
                                class="fa fa-eraser"></i> Reset</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="row col-md-12 mb-5">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <canvas id="salesChart" width="200" height="100"></canvas>
                </div>
                <div class="col-md-1"></div>

            </div>
            <div class="row col-md-12 mt-2 mb-4" style="overflow-x: auto">
                <div class="col-md-1"></div>

                <div class="row col-md-10">
                <h3 class="text-center">Total Penjualan produk</h3>

                    <canvas id="produkChart" width="200" height="100"></canvas>
                </div>
                <div class="col-md-1"></div>

            </div>

        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h3 class="col-md-12">Data Laporan Penjualan</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive" style="overflow-x: auto; height: 600px;">
            <table id="example1" class="table table-bordered table-striped" style="min-width:1500px; overflow-y: auto;">
                <thead>
                    {{-- class="sticky-top" --}}
                    <tr style="text-align: center">
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Produk</th>
                        <th>Total Transaksi</th>
                        <th>Tanggal Transaksi</th>
                        <th>Metode Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($data as $d)
                    <tr>
                        <th>{{ $no++ }}</th>
                        <td>{{ $d->nama_pelanggan }}</td>
                        <td>
                            <ul>
                                @foreach ($d->detail as $detail)
                                <li>{{ $detail->produk->nama_produk }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>Rp. {{ number_format($d->total_transaksi, 2) }}</td>
                        <td>{{ date('d F Y', strtotime($d->tanggal_transaksi)) }}</td>
                        <td>{{ $d->metode_pembayaran }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="5">Total Transaksi</th>
                        <th>Rp. {{ number_format($data->sum('total_transaksi'), 2) }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script>
    // Data penjualan produk dari PHP (hasil array)
        const salesData = @json($salesData);

        // Ekstrak nama produk dan total penjualan
        const monthNames = salesData.map(item => item.bulan);
        const priceSales = salesData.map(item => item.total);

        // Konfigurasi chart
        const ctx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: monthNames,
                datasets: [{
                    label: 'Total Penjualan',
                    data: priceSales,
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
    // Data penjualan produk dari PHP (hasil array)
    const produkData = @json($dataGrafik);;

    // Ekstrak nama produk dan total penjualan
    const productNames = produkData.map(item => item.produk);
    const productSales = produkData.map(item => item.total);

    // Konfigurasi chart
    const product = document.getElementById('produkChart').getContext('2d');
    const produkChart = new Chart(product, {
        type: 'pie',
        data: {
            labels: productNames,
            datasets: [{
                label: 'Total Produk Terjual',
                data: productSales,
                backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
                ],
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
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
                    title: 'Laporan Penjualan',
                    orientation: 'landscape',
                    customize: function(doc) {
                        var tableBody = doc.content[1].table.body;

                        // Menambahkan baris total transaksi ke tableBody
                        var totalTransaksi =
                            'Rp. {{ number_format($data->sum('total_transaksi'), 2) }}';
                        var totalRow = ['', '', '', '', 'Total Transaksi', totalTransaksi];
                        tableBody.push(totalRow);

                        tableBody.forEach(function(row) {
                            row.forEach(function(cell) {
                                cell.margin = [10, 5, 10,
                                5]; // [left, top, right, bottom]
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