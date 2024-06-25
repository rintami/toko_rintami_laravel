<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Keranjang;
use App\Models\Pelanggan;
use App\Models\detailproduk;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $user = $request['user'];

        $user = session::get('email');
        // $data = Keranjang::where('user', $user)->get();
        $data = DB::table('keranjangs')
        ->join('produks', 'keranjangs.kodeproduk', '=', 'produks.id')
        ->join('pelanggans', 'keranjangs.kodepelanggan', '=', 'pelanggans.id')
        ->select('keranjangs.*', 'produks.*', 'pelanggans.*')
        ->where('keranjangs.user', $user)
        ->get();

        // dd($data);

        return view('cart.index', compact('data'))->with('i', (request()->input('page', 1) -1) *15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cart.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jumlah = $request['jumlah'];
        $harga = $request['harga'];
        $totalharga = ($jumlah * $harga);

        $request -> validate([
            'kodeproduk' => 'required',
            'kodepelanggan' => 'required',
            'tanggal' => 'required',
            'jumlah' => 'required',
            'user' => 'required',
        ]);

        $keranjang = Keranjang::create([
            'kodeproduk' => $request->kodeproduk,
            'kodepelanggan' => $request->kodepelanggan,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
            'totalharga' => $totalharga,
            'user' => $request->user,
        ]);

        // dd($keranjang);
        Alert::success('Sukses!', 'Silahkan Cek Produk Di Keranjang!');
        return redirect()->route('cart.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
