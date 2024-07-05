<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Toko;
use App\Models\Kategori;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::latest()->paginate(15);
        return view('produk.index', compact('produk'))->with('i', (request()->input('page', 1) -1) *15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $toko = Toko::all();
        $kategori = Kategori::all();
        return view('produk.create', compact('toko', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'kodetoko' => 'required',
            'kodekategori' => 'required',
            'namaproduk' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'daerah' => 'required',
            'deskripsi' => 'required',
            'gambar1' => 'required|mimes:jpeg,jpg,png,gif',
            'gambar2' => 'required|mimes:jpeg,jpg,png,gif',
            'gambar3' => 'required|mimes:jpeg,jpg,png,gif',
        ]);

        $gambar1 = $request->file('gambar1');
        $gambar2 = $request->file('gambar2');
        $gambar3 = $request->file('gambar3');

        if ($gambar1) {
            $nama1 = $gambar1->getClientOriginalName();
            $gambar1->move('gambarproduk/', $nama1);
        }

        if ($gambar2) {
            $nama2 = $gambar2->getClientOriginalName();
            $gambar2->move('gambarproduk/', $nama2);
        }

        if ($gambar3) {
            $nama3 = $gambar3->getClientOriginalName();
            $gambar3->move('gambarproduk/', $nama3);
        }

        $produk = Produk::create([
            'kodetoko' => $request->kodetoko,
            'kodekategori' => $request->kodekategori,
            'namaproduk' => $request->namaproduk,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'daerah' => $request->daerah,
            'deskripsi' => $request->deskripsi,
            'gambar1' => $nama1,
            'gambar2' => $nama2,
            'gambar3' => $nama3,
        ]);

        Alert::success('Sukses!', 'Data Berhasil Di Tambahkan!');

        // dd($produk);
        return redirect()->route('produk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        return view('produk.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        $toko = Toko::all();
        $kategori = Kategori::all();
        return view('produk.edit', compact('produk', 'toko', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $request -> validate([
            'kodetoko' => 'required',
            'kodekategori' => 'required',
            'nama' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'daerah' => 'required',
            'deskripsi' => 'required',
            'gambar1' => 'required|mimes:jpeg,jpg,png,gif',
            'gambar2' => 'required|mimes:jpeg,jpg,png,gif',
            'gambar3' => 'required|mimes:jpeg,jpg,png,gif',
        ]);

        $gambar1 = $request->file('gambar1');
        $gambar2 = $request->file('gambar2');
        $gambar3 = $request->file('gambar3');

        if ($gambar1) {
            $nama1 = $gambar1->getClientOriginalName();
            $gambar1->move('gambarproduk/', $nama1);
        }

        if ($gambar2) {
            $nama2 = $gambar2->getClientOriginalName();
            $gambar2->move('gambarproduk/', $nama2);
        }

        if ($gambar3) {
            $nama3 = $gambar3->getClientOriginalName();
            $gambar3->move('gambarproduk/', $nama3);
        }

        $produk -> update ([
            'kodetoko' => $request->kodetoko,
            'kodekategori' => $request->kodekategori,
            'namaproduk' => $request->namaproduk,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'daerah' => $request->daerah,
            'deskripsi' => $request->deskripsi,
            'gambar1' => $nama1,
            'gambar2' => $nama2,
            'gambar3' => $nama3
        ]);

        $produk -> update($request->all());

        Alert::success('Sukses!', 'Data Berhasil Di Edit!');
        return redirect()->route('produk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::find($id);
        $produk -> delete();

        Alert::success('Sukses!', 'Data Berhasil Di Hapus!');
        return redirect()->route('produk.index'); 
    }
}
