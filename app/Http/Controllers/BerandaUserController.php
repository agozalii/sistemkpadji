<?php

namespace App\Http\Controllers;

use App\Models\ProdukModel;
use App\Models\PromosiModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BerandaUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = ProdukModel::all();

        if (auth()->check()) {
            return view('user.beranda', compact('products'));
        } else {
            return view('user.beranda', compact('products'));
        }
    }


    public function showProducts()
    {
        $products = ProdukModel::all(); // Ganti Product dengan model produk Anda

        return view('produk', compact('products'));
    }

    public function tentangkami()
    {

        return view('user.tentangkami');
    }

    public function promo()
    {

        // return view('user.promo');
        // Mengambil data promosi dari model Promo
        // $promos = PromosiModel::all();

        // // Mengirim data promosi ke view 'nama_view'
        // return view('user.promo', compact('promos'));

        // Ambil semua promosi dari model
        // Ambil semua promosi dari model
        $promos = PromosiModel::all();

        // Filter promosi bulan ini dan promosi lainnya
        $promoBulanIni = $promos->filter(function ($promo) {
            return Carbon::parse($promo->tanggal_mulai)->format('m') === Carbon::now()->format('m');
        });

        $promoLain = $promos->reject(function ($promo) {
            return Carbon::parse($promo->tanggal_mulai)->format('m') === Carbon::now()->format('m');
        });

        return view('user.promo', compact('promoBulanIni', 'promoLain'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
