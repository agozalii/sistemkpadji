<?php

namespace App\Http\Controllers;

// use Illuminate\Console\View\Components\Alert;
use App\Http\Requests\StoreprodukRequest;
use App\Http\Requests\UpdateprodukRequest;
use App\Models\Kategori;
use App\Models\ProdukModel;
// use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $data = ProdukModel::query()
            ->join('kategori', 'kategori.id', '=', 'produk.kategori_id')
            ->select('produk.id as produk_id', 'produk.gambar_produk', 'produk.nama_produk', 'produk.harga_produk', 'produk.kategori_id', 'produk.deskripsi_produk', 'produk.merk_produk', 'produk.status_produk', 'produk.stok', 'produk.created_at', 'produk.updated_at', 'kategori.name as kategori_name');


        if ($request->has('query')) {
            $searchTerm = $request->input('query');
            $data->where('nama_produk', 'like', '%' . $searchTerm . '%')
                ->orWhere('harga_produk', 'like', '%' . $searchTerm . '%');
        }

        // $data = $data->get();
        $data = $data->paginate(10);

        // dd($data);

        return view("admin.produk", compact('data'))->with([
            'user' => Auth::user()

        ]);
    }


    public function generateIdProduk()
    {

        $lastProduk = ProdukModel::orderBy('id', 'desc')->first();

        if ($lastProduk) {
            $lastIdProduk = $lastProduk->id;

            // Mengambil bagian angka dari ID produk terakhir
            $lastIdNumber = intval(substr($lastIdProduk, 2));

            // Menambah 1 pada bagian angka
            $newIdNumber = $lastIdNumber + 1;

            // Format ID baru dengan padding angka menjadi 3 digit
            $newIdProduk = "PR" . str_pad($newIdNumber, 3, '0', STR_PAD_LEFT);
        } else {
            // Jika belum ada produk, ID pertama adalah "PR001"
            $newIdProduk = "PR001";
        }

        return $newIdProduk;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addProduk()
    {
        $kategoris = Kategori::query()->where('status', 1)->get();

        return view("admin.modal.addProduk", [
            'title' => 'Tambah  Produk',
            'id' => $this->generateIdProduk(),
            'kategoris' => $kategoris
        ]);
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreprodukRequest $request)
    {
        $data = new ProdukModel();
        $data->id = $request->id;
        $data->nama_produk = $request->nama_produk;
        $data->harga_produk = $request->harga_produk;
        $data->kategori_id = $request->kategori_produk;
        $data->stok = $request->stok;
        $data->deskripsi_produk = $request->deskripsi_produk;
        $data->merk_produk = $request->merk_produk;
        $data->status_produk = $request->status_produk;

        if ($request->hasFile('gambar_produk')) {

            $photo = $request->file('gambar_produk');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();

            // Define the absolute path to the desired upload directory
            $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/storage/produk';

            // Ensure the destination directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            // Move the file to the destination directory
            $photo->move($destinationPath, $filename);
            $data->gambar_produk = $filename;
        }

        // Alert::success('Berhasil', 'Data berhasil tersimpan');
        $data->save();
        return redirect('/produk');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = ProdukModel::findOrFail($id);
        $kategoris = Kategori::query()->where('status', 1)->get();

        return view(
            'admin.modal.EditProduk',
            [
                'title' => 'Edit Data Produk',
                'data' => $data,
                'kategoris' => $kategoris
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
    public function update(UpdateprodukRequest $request, ProdukModel $produk, $id)
    {
        $data = ProdukModel::findOrFail($id);

        if ($request->file('gambar_produk')) {
            $photo = $request->file('gambar_produk');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();

            // Define the absolute path to the desired upload directory
            $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/storage/produk';

            // Ensure the destination directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            // Move the file to the destination directory
            $photo->move($destinationPath, $filename);
            $data->gambar_produk = $filename;
        } else {
            $filename = $request->gambar_produk;
        }

        $field = [
            'id' => $request->id,
            'gambar_produk' => $filename,
            'nama_produk' => $request->nama_produk,
            'harga_produk' => $request->harga_produk,
            'kategori_id' => $request->kategori_produk,
            'stok' => $request->stok,
            'deskripsi_produk' => $request->deskripsi_produk,
            'merk_produk' => $request->merk_produk,
            'status_produk' => $request->status_produk,

        ];
        $data::where('id', $id)->update($field);
        // Alert :: toast('Data Berhasil Diedit', 'success');
        return redirect('/produk');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProdukModel $produk, $id)
    {
        $data = ProdukModel::find($id);
        $data->delete();
        // Alert :: toast('Data Berhasil Dihapus', 'success');
        //  return redirect('/produk');
        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil Menghapus Data',
        ]);
    }

    // app/Http/Controllers/ProdukController.php
    public function getProductsByCategory(Request $request)
    {
        // $category = $request->input('category');
        // $products = ProdukModel::where('kategori_produk', $category)->get();
        // return view('partials.products')->with('products', $products);

        $category = $request->input('category');

        if ($category === 'semua') {
            $products = ProdukModel::all();
        } else {
            $products = ProdukModel::where('kategori_id', $category)->get();
        }

        // Anda dapat mengembalikan view atau menggunakan partials untuk memuat data produk
        return view('partials.products', compact('products'));
    }


    public function produkuser(Request $request)
    {
        $products = ProdukModel::all();
        $kategoris = Kategori::query()->where('status', 1)->get();
        return view('user.produk', compact('products', 'kategoris'));
    }

    public function produkterbaru(Request $request)
    {
        $produkNewArrival = ProdukModel::where('status_produk', 'New Arrival')->get();
        return view('user.produkterbaru', ['produkNewArrival' => $produkNewArrival]);
    }

    public function detailProduk($id)
    {
        $product = ProdukModel::find($id);
        return view('user.detail_produk', compact('product'));
    }
}
