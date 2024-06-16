<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKritiksaranRequest;
use App\Models\KritiksaranModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class KritiksaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.kritiksaran');

    }
    public function tampil(Request $request)
    {
        $data = KritiksaranModel::query();
        $data = $data->paginate(10);

        return view("admin.kritiksaran", compact('data'))->with([
            'user' => Auth::user()
        ]);
    }
    public function tampilmanajer(Request $request)
    {
        $data = KritiksaranModel::query();
        $data = $data->paginate(10);

        return view("manajer.kritiksaran", compact('data'))->with([
            'user' => Auth::user()

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
    public function store(StoreKritiksaranRequest $request)
    {
        $data = new KritiksaranModel();
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->no_telpon = $request->no_telpon;
        $data->pesan = $request->pesan;

        $data->save();

        return redirect('/user/kritiksaran');
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
    public function destroy(KritiksaranModel $produk, $id)
    {
        $data = KritiksaranModel::find($id);
        $data->delete();
        // Alert :: toast('Data Berhasil Dihapus', 'success');
        //  return redirect('/produk');
        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil Menghapus Data',
        ]);
    }
}
