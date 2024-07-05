<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\detailproduk;
use App\Models\Checkout;
use App\Models\Keranjang;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Session;


class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop = Produk::where('stok', '>', 0)->get();

        // $data = DB::table('produks')
        // ->join('tokos', 'produks.kodetoko', '=', 'tokos.id')
        // ->join('kategoris', 'produks.kodekategori', '=', 'kategoris.id')
        // ->select('produks.*', 'produks.id AS idproduk', 'tokos.id AS idtoko', 'kategoris.id AS idkategori', 'tokos.namatoko', 'tokos.kota', 'kategoris.keterangan')
        // ->where('produks.stok', '>', 0)
        // ->get();

        $user = session::get('email');
        $jumlahco = Keranjang::where('user', $user)->count();
        
        return view('shop.index', compact('shop', 'jumlahco'));
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
        $shop = DB::table('produks')
        ->join('tokos', 'produks.kodetoko', '=', 'tokos.id')
        ->join('kategoris', 'produks.kodekategori', '=', 'kategoris.id')
        ->select('produks.*', 'tokos.namatoko', 'tokos.kota', 'kategoris.keterangan')
        ->where('produks.id', $id)
        ->first();
        // dd($barang);
        return view('shop.show', compact('shop'));
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
