<?php

namespace App\Http\Controllers;

use App\Models\VideoModel;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = VideoModel::query()->where('kategori', 'review')->get();
        $tutorials = VideoModel::query()->where('kategori', 'tutorial')->get();
        $tips = VideoModel::query()->where('kategori', 'tips')->get();
        $petualangans = VideoModel::query()->where('kategori', 'petualangan')->get();

        return view('user.galeri', compact('reviews', 'tutorials', 'tips', 'petualangans'));
    }

    public function showModal($id)
    {
        $video = VideoModel::find($id); // Ambil data video berdasarkan ID

        return view('user.modal.showvideos', compact('video'));
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
