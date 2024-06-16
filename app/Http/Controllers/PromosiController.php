<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePromosiRequest;
use App\Http\Requests\UpdatepromosiRequest;
use App\Models\DetailPromosiModel;
use App\Models\ProdukModel;
use App\Models\PromosiModel;
use Database\Factories\ProdukModelFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PromosiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PromosiModel::query()->with('details')->get();  // Mengambil semua data dari tabel promosi

        // dd($data);
        return view('admin.promosi', compact('data'))->with([
            'user' => Auth::user()
        ]);
    }

    public function addPromosi()
    {
        $produks = ProdukModel::all();
        return view('admin.modal.addPromosi', [
            'title' => 'Tambah  Promosi',
            'produks' => $produks,
            'id' => 'PS' . rand(100, 999),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePromosiRequest $request)
    {
        $data = new PromosiModel();
        $data->id = $request->id;
        $data->gambar_promosi = $request->gambar_promosi;
        $data->nama_promosi = $request->nama_promosi;
        $data->deskripsi_promosi = $request->deskripsi_promosi;
        $data->tanggal_mulai = $request->tanggal_mulai;
        $data->tanggal_selesai = $request->tanggal_selesai;
        $data->promosi_value = $request->promosi_value;

        if ($request->hasFile('gambar_promosi')) {

            $photo = $request->file('gambar_promosi');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();

            // Define the absolute path to the desired upload directory
            $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/storage/promosi';

            // Ensure the destination directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            // Move the file to the destination directory
            $photo->move($destinationPath, $filename);
            $data->gambar_promosi = $filename;
        }

        if ($data->save()) {
            foreach ($request->produks as $key => $value) {
                $produk = ProdukModel::findOrFail($value);

                $detail = new DetailPromosiModel();
                $detail->id_produk = $value;
                $detail->id_promosi = $request->id;
                $detail->nama_produk = $produk->nama_produk;
                $detail->save();
            }

            return redirect('/promosi');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = PromosiModel::query()
            ->where('promosi.id', $id)
            ->first();
        $details = DetailPromosiModel::query()
            ->where('detail_promosi.id_promosi', $id)
            ->get();

        $produks = ProdukModel::all();

        return view(
            'admin.modal.EditPromosi',
            [
                'title' => 'Edit Data Promosi',
                'data' => $data,
                'details' => $details,
                'produks' => $produks
            ]
        )->render();
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
    public function update(UpdatepromosiRequest $request, $id)
    {
        $data = PromosiModel::findOrFail($id);

        if ($request->file('gambar_promosi')) {
            // dd(public_path());
            $photo = $request->file('gambar_promosi');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();

            // Define the absolute path to the desired upload directory
            $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/storage/promosi';

            // Ensure the destination directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            // Move the file to the destination directory
            $photo->move($destinationPath, $filename);
            $data->gambar_promosi = $filename;
        } else {
            $filename = $request->gambar_promosi;
        }

        $data->gambar_promosi = $filename;
        $data->nama_promosi = $request->nama_promosi;
        $data->deskripsi_promosi = $request->deskripsi_promosi;
        $data->tanggal_mulai = $request->tanggal_mulai;
        $data->tanggal_selesai = $request->tanggal_selesai;
        $data->promosi_value = $request->promosi_value;

        if ($data->save()) {

            foreach ($request->produks as $key => $value) {
                $produk = ProdukModel::findOrFail($value);

                $already = DetailPromosiModel::where('id_promosi', $data->id)->where('id_produk', $value)->first();
                if (!$already) {
                    $detail = new DetailPromosiModel();
                    $detail->id_produk = $value;
                    $detail->id_promosi = $data->id;
                    $detail->nama_produk = $produk->nama_produk;
                    $detail->save();
                }
            }
            return redirect('/promosi');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = PromosiModel::find($id);
        $data->delete();
        // Alert :: toast('Data Berhasil Dihapus', 'success');
        //  return redirect('/produk');
        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil Menghapus Data',
        ]);
    }

    public function destroyProduk(Request $request)
    {
        $id = $request->input('id');
        $data = DetailPromosiModel::find($id);
        $data->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil Menghapus Data',
        ]);
    }
    public function showdetailpromosi($id)
    {
        $promo = PromosiModel::query()->with(['details', 'details.produk'])->where('id', $id)->first();
        // dd($promo);
        return view('user.detailpromosi', compact('promo'));
    }
}
