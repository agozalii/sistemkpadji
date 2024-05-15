<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKritiksaranRequest;
use App\Models\KritiksaranModel;
use Illuminate\Http\Request;
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
        // $data->id = $request->id;
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->no_telpon = $request->no_telpon;
        $data->pesan = $request->pesan;

        $data->save();



        // return response()->json([
        //     'status'=> 'success',
        //     'message'=>'Berhasil Menghapus Data',
        // ]);
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
    public function destroy(string $id)
    {
        //
    }
}
