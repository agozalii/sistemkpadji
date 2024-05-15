@extends('layout.mainuser')

@section('judul')
    <strong>Halaman Produk</strong>
@endsection

@section('content')
    <div class="container" style="margin-top: 150px">
        <div class="row">
            <div class="col-md-3 mb-4">
                <!-- Profile Button with User Icon -->
                <a href="{{ route('profil') }}" class="btn btn-block"
                    style="background-color: #d1d8e0; border-color: #e9ecef; color: #343a40;
                      text-decoration: none;">
                    <i class="fas fa-user mr-2" style="color: #148E8E"></i> Profile
                </a>
                <!-- Wishlist Button with Heart Icon -->
                <a href="#" class="btn btn-block" style="color: #343a40;
                      text-decoration: none;"
                    onmouseover="this.style.color='#148E8E';" onmouseout="this.style.color='#343a40';">
                    <i class="fas fa-heart mr-2"></i> Wishlist
                </a>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Input Data</h5>
                        {{-- <form action="{{ route('store-data') }}" method="POST">
                        @csrf --}}
                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <input type="hidden" id="role" name="role" value="pelanggan">
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin:</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nomor_telepon">Nomor Telepon:</label>
                            <input type="tel" class="form-control" id="nomor_telepon" name="nomor_telepon" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat:</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mx-auto"
                                style="background-color: #148E8E; border-color: #148E8E; width: 300px;">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
