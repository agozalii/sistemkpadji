<?php

namespace App\Http\Controllers;

use App\Models\ProdukModel;
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

            $salesGrafik = [];

            // Inisialisasi array untuk menyimpan total penjualan setiap bulan
            $currentYear = date('Y', strtotime($tgl_akhir));
            $currentMonth = date('m', strtotime($tgl_akhir));

            // Mengisi array dengan 12 bulan terakhir
            for ($i = 1; $i <= 12; $i++) {
                $month = date('Y-m', mktime(0, 0, 0, $i, 1, $currentYear));
                $salesGrafik[$month] = 0;
            }

            // Mengelompokkan penjualan berdasarkan bulan dan tahun dari created_at
            foreach ($data as $transaksi) {
                $bulan = $transaksi->created_at->format('Y-m');

                if (array_key_exists($bulan, $salesGrafik)) {
                    $salesGrafik[$bulan] += $transaksi->total_transaksi;
                }
            }

            // Menyusun data untuk chart
            $salesData = [];
            foreach ($salesGrafik as $bulan => $total) {
                $salesData[] = [
                    'bulan' => $bulan,
                    'total' => $total,
                ];
            }

            $produks = ProdukModel::all();
            $dataGrafik = [];

            foreach ($produks as $produk) {
                $dataGrafik[$produk->id] = [
                    'id' => $produk->id,
                    'produk' => $produk->nama_produk,
                    'total' => 0
                ];
            }

            foreach ($data as $row) {
                foreach ($row->detail as $detail) {
                    if (isset($dataGrafik[$detail->produk_id])) {
                        $dataGrafik[$detail->produk_id]['total'] += 1;
                    }
                }
            }
            $dataGrafik = array_filter($dataGrafik, function ($item) {
                return $item['total'] > 0;
            });

            $salesData = array_values($salesData);
            $dataGrafik = array_values($dataGrafik);
        } else {
            $data = TransaksiModels::query()
                ->with(['detail', 'detail.produk'])
                ->get();

            $salesGrafik = [];

            // Inisialisasi array untuk menyimpan total penjualan setiap bulan
            $currentYear = date('Y');
            $currentMonth = date('m');

            // Mengisi array dengan 12 bulan terakhir
            for ($i = 1; $i <= 12; $i++) {
                $month = date('Y-m', mktime(0, 0, 0, $i, 1, $currentYear));
                $salesGrafik[$month] = 0;
            }

            // Mengelompokkan penjualan berdasarkan bulan dan tahun dari created_at
              foreach ($data as $transaksi) {
                $bulan = $transaksi->created_at->format('Y-m');

                if (array_key_exists($bulan, $salesGrafik)) {
                    if($bulan == date('Y-m')){
                    $salesGrafik[$bulan] += $transaksi->total_transaksi;
                        
                    }
                }
            }

            // Menyusun data untuk chart
            $salesData = [];
            foreach ($salesGrafik as $bulan => $total) {
                $salesData[] = [
                    'bulan' => $bulan,
                    'total' => $total,
                ];
            }


            $produks = ProdukModel::all();
            $dataGrafik = [];

            // Inisialisasi array untuk menyimpan total pembelian setiap produk
            foreach ($produks as $produk) {
                $dataGrafik[$produk->id] = [
                    'id' => $produk->id,
                    'produk' => $produk->nama_produk,
                    'total' => 0
                ];
            }

            foreach ($data as $row) {
                foreach ($row->detail as $detail) {
                    if (isset($dataGrafik[$detail->produk_id])) {
                        $dataGrafik[$detail->produk_id]['total'] += 1;
                    }
                }
            }
            $dataGrafik = array_filter($dataGrafik, function ($item) {
                return $item['total'] > 0;
            });

            $salesData = array_values($salesData);
            $dataGrafik = array_values($dataGrafik);
        }
        // dd($dataGrafik);
        $produks = ProdukModel::all();
        return view('manajer.penjualan', [
            'data' => $data,
            'user' => Auth::user(),
            'tgl_awal' => $tgl_awal,
            'tgl_akhir' => $tgl_akhir,
            'produks' => $produks,
            'dataGrafik' => $dataGrafik,
            'salesData' => $salesData
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
    
    public function adminIndex(Request $request)
    {
        $tgl_awal = request('tgl_awal');
        $tgl_akhir = request('tgl_akhir');

        if ($tgl_awal && $tgl_akhir) {
            $data = TransaksiModels::query()
                ->with(['detail', 'detail.produk'])
                ->whereBetween('tanggal_transaksi', [date('Y-m-d', strtotime($tgl_awal)), date('Y-m-d', strtotime($tgl_akhir))])
                ->get();

            $salesGrafik = [];

            // Inisialisasi array untuk menyimpan total penjualan setiap bulan
            $currentYear = date('Y', strtotime($tgl_akhir));
            $currentMonth = date('m', strtotime($tgl_akhir));

            // Mengisi array dengan 12 bulan terakhir
            for ($i = 1; $i <= 12; $i++) {
                $month = date('Y-m', mktime(0, 0, 0, $i, 1, $currentYear));
                $salesGrafik[$month] = 0;
            }

            // Mengelompokkan penjualan berdasarkan bulan dan tahun dari created_at
            foreach ($data as $transaksi) {
                $bulan = $transaksi->created_at->format('Y-m');

                if (array_key_exists($bulan, $salesGrafik)) {
                    $salesGrafik[$bulan] += $transaksi->total_transaksi;
                }
            }

            // Menyusun data untuk chart
            $salesData = [];
            foreach ($salesGrafik as $bulan => $total) {
                $salesData[] = [
                    'bulan' => $bulan,
                    'total' => $total,
                ];
            }

            $produks = ProdukModel::all();
            $dataGrafik = [];

            foreach ($produks as $produk) {
                $dataGrafik[$produk->id] = [
                    'id' => $produk->id,
                    'produk' => $produk->nama_produk,
                    'total' => 0
                ];
            }

            foreach ($data as $row) {
                foreach ($row->detail as $detail) {
                    if (isset($dataGrafik[$detail->produk_id])) {
                        $dataGrafik[$detail->produk_id]['total'] += 1;
                    }
                }
            }
            $dataGrafik = array_filter($dataGrafik, function ($item) {
                return $item['total'] > 0;
            });

            $salesData = array_values($salesData);
            $dataGrafik = array_values($dataGrafik);
        } else {
            $data = TransaksiModels::query()
                ->with(['detail', 'detail.produk'])
                ->get();

            $salesGrafik = [];

            // Inisialisasi array untuk menyimpan total penjualan setiap bulan
            $currentYear = date('Y');
            $currentMonth = date('m');

            // Mengisi array dengan 12 bulan terakhir
            for ($i = 1; $i <= 12; $i++) {
                $month = date('Y-m', mktime(0, 0, 0, $i, 1, $currentYear));
                $salesGrafik[$month] = 0;
            }

            // Mengelompokkan penjualan berdasarkan bulan dan tahun dari created_at
              foreach ($data as $transaksi) {
                $bulan = $transaksi->created_at->format('Y-m');

                if (array_key_exists($bulan, $salesGrafik)) {
                    if($bulan == date('Y-m')){
                    $salesGrafik[$bulan] += $transaksi->total_transaksi;
                        
                    }
                }
            }

            // Menyusun data untuk chart
            $salesData = [];
            foreach ($salesGrafik as $bulan => $total) {
                $salesData[] = [
                    'bulan' => $bulan,
                    'total' => $total,
                ];
            }


            $produks = ProdukModel::all();
            $dataGrafik = [];

            // Inisialisasi array untuk menyimpan total pembelian setiap produk
            foreach ($produks as $produk) {
                $dataGrafik[$produk->id] = [
                    'id' => $produk->id,
                    'produk' => $produk->nama_produk,
                    'total' => 0
                ];
            }

            foreach ($data as $row) {
                foreach ($row->detail as $detail) {
                    if (isset($dataGrafik[$detail->produk_id])) {
                        $dataGrafik[$detail->produk_id]['total'] += 1;
                    }
                }
            }
            $dataGrafik = array_filter($dataGrafik, function ($item) {
                return $item['total'] > 0;
            });

            $salesData = array_values($salesData);
            $dataGrafik = array_values($dataGrafik);
        }
        // dd($dataGrafik);
        $produks = ProdukModel::all();
        return view('admin.penjualan', [
            'data' => $data,
            'user' => Auth::user(),
            'tgl_awal' => $tgl_awal,
            'tgl_akhir' => $tgl_akhir,
            'produks' => $produks,
            'dataGrafik' => $dataGrafik,
            'salesData' => $salesData
        ]);
    }
}
