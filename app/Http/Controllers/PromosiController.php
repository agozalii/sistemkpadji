<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePromosiRequest;
use App\Http\Requests\UpdatepromosiRequest;
use App\Models\PromosiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PromosiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PromosiModel::all(); // Mengambil semua data dari tabel promosi
        return view("admin.promosi", compact('data'))->with([
            'user' => Auth::user()
        ]);
    }

    public function addPromosi()
    {
        return view("admin.modal.addPromosi", [
            'title' => 'Tambah  Promosi',
            'id' => 'PS' . rand(100, 999),
        ]);
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
    public function store(StorePromosiRequest $request)
    {
        $data = new PromosiModel();
        $data->id = $request->id;
        $data->gambar_promosi = $request->gambar_promosi;
        $data->nama_promosi = $request->nama_promosi;
        $data->deskripsi_promosi = $request->deskripsi_promosi;
        $data->tanggal_mulai = $request->tanggal_mulai;
        $data->tanggal_selesai = $request->tanggal_selesai;

        if ($request->hasFile('gambar_promosi')) {
            $photo = $request->file('gambar_promosi');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/promosi'), $filename);
            $data->gambar_promosi = $filename;
        }

        $data->save();
        return redirect('/promosi');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = PromosiModel::findOrFail($id);

        return view(
            'admin.modal.EditPromosi',
            [
                'title' => 'Edit Data Promosi',
                'data' => $data,
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
            $photo = $request->file('gambar_promosi');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/promosi'), $filename);
            $data->gambar_promosi = $filename;
        } else {
            $filename = $request->gambar_promosi;
        }

        $field = [
            'id' => $request->id,
            'gambar_promosi' => $filename,
            'nama_promosi' => $request->nama_promosi,
            'deskripsi_promosi' => $request->deskripsi_promosi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,

        ];
        $data::where('id', $id)->update($field);
        // Alert :: toast('Data Berhasil Diedit', 'success');
        return redirect('/promosi');
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
}
