@extends('layout.main')

@include('sweetalert::alert')

@section('judul')
    <strong>Halaman Kritik & Saran</strong>
@endsection

@section('isi')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                </div>
            </div>
            <div class="table-responsive" style="overflow-x: auto;">
                <table class="table table-bordered table-striped" style="min-width: 1000px; overflow-y: auto;">
                    <thead>
                        <tr>
                            <th width="50px" scope="col">No</th>
                            <th width="200px">Nama</th>
                            <th width="150px">Email</th>
                            <th width="150px">No Telpon</th>
                            <th width="700px">Pesan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        @endphp
                        @foreach ($data as $y => $x)
                            <tr>
                                <th scope="row">{{ $data->firstItem() + $loop->index }}</th>
                                <td>{{ $x->nama }}</td>
                                <td>{{ $x->email }}</td>
                                <td>{{ $x->no_telpon }}</td>
                                <td>{{ $x->pesan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-2">
                <ul class="pagination">
                    <li class="page-item">
                        @if ($data->previousPageUrl())
                            <a href="{{ $data->previousPageUrl() }}" class="page-link">&laquo; Sebelumnya</a>
                        @else
                            <span class="page-link disabled ">&laquo; Sebelumnya</span>
                        @endif
                    </li>

                    <li class="page-item">
                        @if ($data->nextPageUrl())
                            <a href="{{ $data->nextPageUrl() }}" class="page-link">Berikutnya &raquo;</a>
                        @else
                            <span class="page-link disabled">Berikutnya &raquo;</span>
                        @endif
                    </li>
                </ul>
            </div>

            <p class="text-center">Menampilkan {{ $data->firstItem() }} - {{ $data->lastItem() }}, dari total {{ $data->total() }}</p>

    </div>
    <div class="tampilData" style="display:none;"></div>
@endsection
