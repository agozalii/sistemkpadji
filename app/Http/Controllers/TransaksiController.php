<?php

namespace App\Http\Controllers;

use App\Models\DetailPromosiModel;
use App\Models\DetailTransaksiModels;
use App\Models\ProdukModel;
use App\Models\PromosiModel;
use App\Models\TransaksiModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('query');

        $data = TransaksiModels::query();

        if ($search) {
            $data = $data
                ->where('id', 'like', '%' . $search . '%')
                ->orWhere('nama_pelanggan', 'like', '%' . $search . '%')
                ->orWhere('metode_pembayaran', 'like', '%' . $search . '%')
                ->orWhere('tanggal_transaksi', 'like', '%' . $search . '%')
                ->orWhere('total_transaksi', 'like', '%' . $search . '%');
        }

        $data = $data
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('admin.transaksi', compact('data'))->with([
            'user' => Auth::user(),
            'search' => $search
        ]);
    }

    public function getProdukPromosi(Request $request)
    {
        $id = $request->input('produkId');
        $tanggal_sekarang = date('Y-m-d');
        $data = DetailPromosiModel::query()->where('id_produk', $id)
        ->join('promosi', 'promosi.id', '=', 'detail_promosi.id_promosi')
        ->where('promosi.tanggal_selesai', '>', $tanggal_sekarang)
        ->where('promosi.tanggal_mulai', '<=', $tanggal_sekarang)
        ->first();
        if ($data) {
            return response()->json([
                'status' => 'success',
                'data' => $data->id_promosi,
            ]);
        } else {
            return response()->json([
                'status' => 'failed',
                'data' => null
            ]);
        }
    }

    public function addTransaksi()
    {
        $produks = ProdukModel::all();
        $promosis = PromosiModel::all();

        return view('admin.modal.addTransaksi', [
            'title' => 'Tambah  Transaksi',
            'id' => 'NT' . rand(100, 999),
            'produks' => $produks,
            'promosis' => $promosis
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validasi data yang diterima

            $validasi = Validator::make($request->all(), [
                'nama_pelanggan' => 'required',
                'tanggal_transaksi' => 'required',
                'metode_pembayaran' => 'required',
                'produk_id' => 'required',
                'jumlah_beli_produk' => 'required',
            ]);

            if ($validasi->fails()) {
                $errors = $validasi->errors()->all();
                return back()->withErrors($errors)->withInput();
            }
            // dd($request->all());

            // buat nomor order
            $no_order = 'NT-' . date('Ymd') . '-' . rand(100, 999);

            // Simpan data transaksi ke dalam tabel transaksi
            $transaksi = new TransaksiModels();
            $transaksi->id = $no_order;
            $transaksi->nama_pelanggan = $request->nama_pelanggan;
            $transaksi->nama_pelanggan = $request->nama_pelanggan;
            $transaksi->tanggal_transaksi = $request->tanggal_transaksi;
            $transaksi->metode_pembayaran = $request->metode_pembayaran;
            $transaksi->total_transaksi = 0;

            if ($transaksi->save()) {
                // Simpan data detail transaksi ke dalam tabel detail_transaksi
                $harga = 0;
                $total_harga = 0;  // inisialisasi total_harga
                foreach ($request->produk_id as $key => $value) {
                    $produk = ProdukModel::query()->where('id', $value)->first();
                    $promosi = PromosiModel::query()->where('id', $request->promosi_id[$key])->first();

                    $haveTransaksi = DetailTransaksiModels::query()->where('transaksi_id', $no_order)->where('produk_id', $value)->first();

                    if (!$haveTransaksi) {
                        $detailTransaksi = new DetailTransaksiModels();
                        $detailTransaksi->transaksi_id = $no_order;
                        $detailTransaksi->produk_id = $value;
                        $detailTransaksi->harga_produk = $produk->harga_produk;
                        if($promosi){
                            $detailTransaksi->promo_value = $promosi->promosi_value;
                            $detailTransaksi->harga_promo = $produk->harga_produk - ($produk->harga_produk * $promosi->promosi_value / 100);
                        }else{
                            $detailTransaksi->promo_value = 0;
                            $detailTransaksi->harga_promo = 0;
                        }
                        $detailTransaksi->promosi_id = $request->promosi_id[$key];
                        $detailTransaksi->jumlah_beli_produk = $request->jumlah_beli_produk[$key];
                        $detailTransaksi->save();
                    } else {
                        $haveTransaksi->jumlah_beli_produk = $haveTransaksi->jumlah_beli_produk + $request->jumlah_beli_produk[$key];
                        if($promosi){
                            $haveTransaksi->promo_value = $promosi->promosi_value;
                            $haveTransaksi->harga_promo = $produk->harga_produk - ($produk->harga_produk * $promosi->promosi_value / 100);
                        }else{
                            $haveTransaksi->promo_value = 0;
                            $haveTransaksi->harga_promo = 0;
                        }
                        $haveTransaksi->save();
                    }

                    
                    if($promosi){
                        $harga = $produk->harga_produk - ($produk->harga_produk * $promosi->promosi_value / 100);
                        $total_harga += $harga * $request->jumlah_beli_produk[$key];
                        $promosi->promosi_use += 1;
                        $promosi->save();
                    }else{
                        $total_harga += $produk->harga_produk * $request->jumlah_beli_produk[$key];
                    }
                }

                $transaksis = TransaksiModels::query()->where('id', $no_order)->first();
                $transaksis->total_transaksi = $total_harga;
                $transaksis->save();
            }

            // Respon sukses
            // return response()->json(['message' => 'Data transaksi berhasil disimpan.']);
            Session::flash('toast_success', 'Data transaksi berhasil disimpan');
            return redirect()->route('transaksi.index');
        } catch (\Exception $e) {
            log::error('Error creating transaksi: ' . $e->getMessage());
            return response()->json(['message' => 'Data transaksi gagal disimpan.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaksi = TransaksiModels::query()->where('id', $id)->first();
        $detail = DetailTransaksiModels::query()->where('transaksi_id', $id)->get();
        $produks = ProdukModel::all();
        $promosis = PromosiModel::all();

        return view('admin.modal.editTransaksi', [
            'title' => 'Edit Transaksi',
            'produks' => $produks,
            'promosis' => $promosis,
            'transaksi' => $transaksi,
            'detail' => $detail
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function view(string $id)
    {
        $transaksi = TransaksiModels::query()->where('id', $id)->first();
        $detail = DetailTransaksiModels::query()->where('transaksi_id', $id)->get();

        return view('admin.view-transaksi', [
            'title' => 'View Transaksi',
            'transaksi' => $transaksi,
            'detail' => $detail,
            'user' => Auth::user(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Validasi data yang diterima

            $validasi = Validator::make($request->all(), [
                'nama_pelanggan' => 'required',
                'tanggal_transaksi' => 'required',
                'metode_pembayaran' => 'required',
                'produk_id' => 'required',
                'jumlah_beli_produk' => 'required',
            ]);

            if ($validasi->fails()) {
                $errors = $validasi->errors()->all();
                return back()->withErrors($errors)->withInput();
            }

            // Simpan data transaksi ke dalam tabel transaksi
            $transaksi = TransaksiModels::query()->where('id', $id)->first();
            $transaksi->id = $id;
            $transaksi->nama_pelanggan = $request->nama_pelanggan;
            $transaksi->nama_pelanggan = $request->nama_pelanggan;
            $transaksi->tanggal_transaksi = $request->tanggal_transaksi;
            $transaksi->metode_pembayaran = $request->metode_pembayaran;
            $transaksi->total_transaksi = 0;

            if ($transaksi->save()) {
                // Simpan data detail transaksi ke dalam tabel detail_transaksi

                $total_harga = 0;  // inisialisasi total_harga
                foreach ($request->produk_id as $key => $value) {
                    $produk = ProdukModel::query()->where('id', $value)->first();
                    $promosi = PromosiModel::query()->where('id', $request->promosi_id[$key])->first();
                    $total_harga += $produk->harga_produk * $request->jumlah_beli_produk[$key];  // update total_harga

                    $detailTransaksi = DetailTransaksiModels::query()->where('transaksi_id', $id)->where('produk_id', $value)->first();
                    if ($detailTransaksi) {
                        $detailTransaksi->jumlah_beli_produk = $detailTransaksi->jumlah_beli_produk + $request->jumlah_beli_produk[$key];
                        if($promosi){
                            $detailTransaksi->promo_value = $promosi->promosi_value;
                            $detailTransaksi->harga_promo = $produk->harga_produk - ($produk->harga_produk * $promosi->promosi_value / 100);
                        }else{
                            $detailTransaksi->promo_value = 0;
                            $detailTransaksi->harga_promo = 0;
                        }
                        $detailTransaksi->save();
                    } else {
                        $detailTransaksi = new DetailTransaksiModels();
                        $detailTransaksi->transaksi_id = $id;
                        $detailTransaksi->produk_id = $value;
                        $detailTransaksi->harga_produk = $produk->harga_produk;
                        $detailTransaksi->promosi_id = $request->promosi_id[$key];
                        if($promosi){
                            $detailTransaksi->promo_value = $promosi->promosi_value;
                            $detailTransaksi->harga_promo = $produk->harga_produk - ($produk->harga_produk * $promosi->promosi_value / 100);
                        }else{
                            $detailTransaksi->promo_value = 0;
                            $detailTransaksi->harga_promo = 0;
                        }
                        $detailTransaksi->jumlah_beli_produk = $request->jumlah_beli_produk[$key];
                        $detailTransaksi->save();
                    }

                    if($promosi){
                        $harga = $produk->harga_produk - ($produk->harga_produk * $promosi->promosi_value / 100);
                        $total_harga += $harga * $request->jumlah_beli_produk[$key];
                        $promosi->promosi_use += 1;
                        $promosi->save();
                    }else{
                        $total_harga += $produk->harga_produk * $request->jumlah_beli_produk[$key];
                    }
                }
                 

                $transaksis = TransaksiModels::query()->where('id', $id)->first();
                $transaksis->total_transaksi = $total_harga;
                $transaksis->save();
            }

            // Respon sukses
            // return response()->json(['message' => 'Data transaksi berhasil disimpan.']);
            Session::flash('toast_success', 'Data transaksi berhasil diperbarui');
            return redirect()->route('transaksi.index');
        } catch (\Exception $e) {
            log::error('Error creating transaksi: ' . $e->getMessage());
            return response()->json(['message' => 'Data transaksi gagal disimpan.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi = TransaksiModels::query()->where('id', $id)->first();

        $detail = DetailTransaksiModels::query()->where('transaksi_id', $id)->get();

        foreach ($detail as $key => $value) {
            $value->delete();
        }

        $transaksi->delete();

        $data = [
            'message' => 'Data transaksi berhasil dihapus.',
            'status' => 'success'
        ];

        return response()->json($data);
    }
}
