<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;


class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Produk::where('stok', '>', 0)->get();
        // $barang = DB::table('produks')
        // ->join('tokos', 'produks.kodetoko', '=', 'tokos.id')
        // ->join('kategoris', 'produks.kodekategori', '=', 'kategoris.id')
        // ->select('produks.*', 'produks.id AS idproduk', 'tokos.namatoko', 'tokos.kota', 'kategoris.keterangan')
        // ->where('produks.stok', '>', 0)
        // ->get();
        return view('barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = DB::table('produks')
        ->join('tokos', 'produks.kodetoko', '=', 'tokos.id')
        ->join('kategoris', 'produks.kodekategori', '=', 'kategoris.id')
        ->select('produks.*', 'tokos.namatoko', 'tokos.kota', 'kategoris.keterangan')
        ->where('produks.id', $id)
        ->first();
        dd($barang);
        // return view('barang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
