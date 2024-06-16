<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Models\VideoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = VideoModel::with('user')->get();
        return view("admin.video", compact('data'))->with([
            'user' => Auth::user()
        ]);
    }

    public function addVideo()
    {
        return view("admin.modal.addVideo", [
            'title' => 'Tambah  Video',
            'id' => 'VD' . rand(100, 999),
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
    public function store(StoreVideoRequest $request)
    {
        $data = new VideoModel();
        $data->id = $request->id;
        $data->kategori = $request->kategori;
        $data->tumbnail = $request->tumbnail;
        $data->video = $request->video;
        $data->judul_video = $request->judul_video;
        $data->deskripsi_video = $request->deskripsi_video;
        $data->user_id = Auth::id();

        if ($request->hasFile('tumbnail')) {
            
            $photo = $request->file('tumbnail');
                $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
                
                // Define the absolute path to the desired upload directory
                $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/storage/tumbnail';
                
                // Ensure the destination directory exists
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
                
                // Move the file to the destination directory
                $photo->move($destinationPath, $filename);
                $data->tumbnail = $filename;
        }

        if ($request->hasFile('video')) {
            
             $video = $request->file('video');
                $filename = date('Ymd') . '_' . $video->getClientOriginalName();
                
                // Define the absolute path to the desired upload directory
                $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/storage/videos';
                
                // Ensure the destination directory exists
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
                
                // Move the file to the destination directory
                $video->move($destinationPath, $filename);
                $data->video = $filename;
        }


        $data->save();
        return redirect('/video');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = VideoModel::findOrFail($id);

        return view(
            'admin.modal.EditVideo',
            [
                'title' => 'Edit Data Video',
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
    public function update(UpdateVideoRequest $request, $id)
    {
        $data = VideoModel::findOrFail($id);

        if ($request->hasFile('video')) {
            
            $video = $request->file('video');
                $filename = date('Ymd') . '_' . $video->getClientOriginalName();
                
                // Define the absolute path to the desired upload directory
                $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/storage/videos';
                
                // Ensure the destination directory exists
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }
                
                // Move the file to the destination directory
                $video->move($destinationPath, $filename);
                $data->video = $filename;
        } else {
            $filename = $request->video;
        }

        $field = [
            'id' => $request->id,
            'kategori' => $request->kategori,
            'video' => $filename,
            'judul_video' => $request->judul_video,
            'deskripsi_video' => $request->deskripsi_video,

        ];
        $data::where('id', $id)->update($field);
        // Alert :: toast('Data Berhasil Diedit', 'success');
        return redirect('/video');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = VideoModel::find($id);
        $data->delete();
        // Alert :: toast('Data Berhasil Dihapus', 'success');
        //  return redirect('/produk');
        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil Menghapus Data',
        ]);
    }
}
