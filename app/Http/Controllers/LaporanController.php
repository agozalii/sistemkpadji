<?php

namespace App\Http\Controllers;

use App\Models\PromosiModel;
use App\Models\TransaksiModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $tgl_awal = request('tgl_awal');
        $tgl_akhir = request('tgl_akhir');

        if ($tgl_awal && $tgl_akhir) {
            $data = TransaksiModels::query()
                ->with(['detail', 'detail.produk'])
                ->whereBetween('tanggal_transaksi', [date('Y-m-d', strtotime($tgl_awal)), date('Y-m-d', strtotime($tgl_akhir))])
                ->get();
        } else {
            $data = TransaksiModels::query()
                ->with('detail')
                ->get();
        }

        // dd($data);

        return view('manajer.penjualan', [
            'data' => $data,
            'user' => Auth::user(),
            'tgl_awal' => $tgl_awal,
            'tgl_akhir' => $tgl_akhir
        ]);
    }

    public function promosi(Request $request)
    {
        $tgl_awal = request('tgl_awal');
        $tgl_akhir = request('tgl_akhir');

        if ($tgl_awal && $tgl_akhir) {
            $data = PromosiModel::query()
                ->whereBetween('tanggal_mulai', [date('Y-m-d', strtotime($tgl_awal)), date('Y-m-d', strtotime($tgl_akhir))])
                ->orWhereBetween('tanggal_selesai', [date('Y-m-d', strtotime($tgl_awal)), date('Y-m-d', strtotime($tgl_akhir))])
                ->get();
        } else {
            $data = PromosiModel::query()
                ->get();
        }

        return view('manajer.promosi', [
            'data' => $data,
            'user' => Auth::user(),
            'tgl_awal' => $tgl_awal,
            'tgl_akhir' => $tgl_akhir
        ]);
    }
}
