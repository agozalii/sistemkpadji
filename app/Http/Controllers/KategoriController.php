<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Kategori::query();

        if ($request->has('query')) {
            $searchTerm = $request->input('query');
            $data->where('name', 'like', '%' . $searchTerm . '%')
                ->orWhere('slug', 'like', '%' . $searchTerm . '%');
        }

        // $data = $data->get();
        $data = $data->paginate(10);

        return view("admin.kategori", compact('data'))->with([
            'user' => Auth::user(),
            'search' => $request->input('query'),

        ]);
    }

    public function addKategori()
    {
        return view("admin.modal.addKategori", [
            'title' => 'Tambah  Kategori',
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
    public function store(Request $request)
    {
        $data = new Kategori();
        $data->name = $request->nama_kategori;
        $data->slug = str($request->nama_kategori)->slug();
        $data->status = $request->status;

        if ($data->save()) {
            return redirect()->route('admin.kategori');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Kategori::findOrFail($id);

        return view(
            'admin.modal.EditKategori',
            [
                'title' => 'Edit Data Kategori',
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
    public function update(Request $request, string $id)
    {
        $data = Kategori::findOrFail($id);
        $data->name = $request->nama_kategori;
        $data->slug = str($request->nama_kategori)->slug();
        $data->status = $request->status;

        if ($data->save()) {
            return redirect()->route('admin.kategori');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Kategori::findOrFail($id);
        if ($data) {
            $data->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil Menghapus Data',
            ]);
        }
    }
}
