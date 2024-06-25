<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\detailproduk;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Produk::join('detailproduks', 'produks.id', '=', 'detailproduks.kodeproduk')
            ->select('produks.*', 'detailproduks.*')
            ->get();
        // dd($shop);
        
        return view('shop.index', compact('data'))->with('i', (request()->input('page', 1) -1) *15);
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
    public function show(Produk $produk)
    {
        $data = DB::table('produks')
        ->join('tokos', 'produks.kodetoko', '=', 'tokos.id')
        ->join('kategoris', 'produks.kodekategori', '=', 'kategoris.id')
        ->select('produks.*', 'tokos.*', 'kategoris.*', 'produks.id AS kodeproduk')
        ->first();

        // dd($data);
        return view('shop.show', compact('data'));
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
