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
        $carts = DB::table('keranjangs')
        ->join('produks', 'keranjangs.kodeproduk', '=', 'produks.id')
        ->select('keranjangs.*', 'produks.namaproduk', 'produks.harga', 'produks.gambar1')
        ->where('keranjangs.user', $user)
        ->get();

        $jumlahco = Keranjang::where('user', $user)->count();

        $totalsemua = Keranjang::where('user', $user)->sum('totalharga');

        // dd($user, $carts);

        return view('cart.index', compact('carts', 'jumlahco', 'totalsemua'))->with('i', (request()->input('page', 1) -1) *15);
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
            'harga' => 'required',
        ]);

        $keranjang = Keranjang::create([
            'kodeproduk' => $request->kodeproduk,
            'kodepelanggan' => $request->kodepelanggan,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
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
        $data = Keranjang::find($id);
        // dd($data, Keranjang::all());
        $data->delete();
        
        Alert::success('Sukses!', 'Berhasil menghapus data produk di keranjang');
        return redirect()->route('cart.index'); 

    }
}
