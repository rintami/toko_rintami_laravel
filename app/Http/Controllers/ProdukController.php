<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Toko;
use App\Models\Kategori;
use Illuminate\Support\Facades\Hash;

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
            'nama' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'daerah' => 'required',
            'deskripsi' => 'required',
        ]);

        Produk::create($request->all());

        return redirect()->route('produk.index')->with('succes', 'Data berhasil di input');
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
        ]);

        $produk -> update($request->all());

        return redirect()->route('produk.index')->with('succes', 'Data berhasil di input');
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

        return redirect()->route('produk.index')->with('succes', 'Jenis Simpanan berhasil di hapus'); 
    }
}
