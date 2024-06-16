@extends('layout.mainuser')

@include('sweetalert::alert')

@section('judul')
    <strong>Halaman Produk</strong>
@endsection

@section('content')
<div class="container">
    <h1 class="text-center" style="border-bottom: 4px solid #148E8E; padding-bottom: 8px; margin-top: 75px;">VIP Member</h1>
    <img src="{{ url('storage/img/VIP.png') }}" style="width: 100%; height: auto; margin-top: 30px;" alt="VIP Image">
    <p style="margin-top: 20px; font-size:20px;"><strong>Keuntungan menjadi member di Forester Jakal:</strong></p>
    <ul>
        <li>Poin akan diberikan setiap pembelian.</li>
        <li>Poin dapat ditukarkan dengan nilai rupiah.</li>
        <li>Poin dapat ditukarkan dengan gift menarik.</li>
        <li>Anda akan mendapatkan akun website khusus member.</li>
    </ul>
    <p>Ayo, tunggu apa lagi! Jadi member Forester Jakal sekarang juga dengan mengikuti langkah-langkah di atas. Nikmati keuntungan menjadi member dan dapatkan poin setiap pembelian, tukarkan poin dengan nilai rupiah atau gift menarik, dan dapatkan akses ke akun website khusus member. Bergabunglah sekarang dan rasakan manfaatnya!</p>
</div>




@endsection


