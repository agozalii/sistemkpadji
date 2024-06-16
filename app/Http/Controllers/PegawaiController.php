<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePegawaiRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $data = User::all(); // Menjalankan query untuk mendapatkan semua data pengguna
    return view("manajer.pegawai", compact('data'))->with([
        'user' => Auth::user()
    ]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function addPegawai()
    {
        return view("manajer.modal.addPegawai", [
            'title' => 'Tambah  Pegawai',
            'id' => 'PR' . rand(100, 999),
        ]);
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePegawaiRequest $request)
    {
        $data = new User();
        $data->nama = $request->nama;
        $data->username = $request->username;
        $data->password = $request->password;
        $data->role = $request->role;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->nomor_telpon = $request->nomor_telpon;
        $data->email = $request->email;
        $data->alamat = $request->alamat;

        // Alert::success('Berhasil', 'Data berhasil tersimpan');
        $data->save();
        return redirect('/manajer/pegawai');
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
