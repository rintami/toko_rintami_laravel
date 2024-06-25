<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Checkout;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class PesananController extends Controller
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
        $pesanan = DB::table('checkouts')
        ->join('produks', 'checkouts.kodeproduk', '=', 'produks.id')
        ->join('pelanggans', 'checkouts.kodepelanggan', '=', 'pelanggans.id')
        ->select('checkouts.*', 'produks.*', 'pelanggans.*', 'checkouts.status AS statusco', 'produks.id AS idproduk', 'pelanggans.id AS idpelanggan', 'checkouts.id AS idco')
        ->where('checkouts.user', $user)
        ->get();

        // dd($co);

        return view('pesanan.index', compact('pesanan'))->with('i', (request()->input('page', 1) -1) *15);
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
    public function store(Request $request, Produk $produk)
    {
        $jumlah = $request['jumlah'];
        $harga = $request['harga'];
        $kodeproduk = $request['kodeproduk'];
        $totalharga = ($jumlah * $harga);

        $request -> validate([
            'kodeproduk' => 'required',
            'kodepelanggan' => 'required',
            'tanggal' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            'metodebayar' => 'required',
            'status' => 'required',
            'buktitf' => 'required|mimes:jpeg,jpg,png,gif',
            'user' => 'required',
        ]);

        $buktitf = $request->file('buktitf');
        $namafile = $buktitf->getClientOriginalName();
        $buktitf->move('buktitf/', $namafile);

        // Checkout::create($request->all());

        $pesanan = Checkout::create([
            'kodeproduk' => $request->kodeproduk,
            'kodepelanggan' => $request->kodepelanggan,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'totalharga' => $totalharga,
            'metodebayar' => $request->metodebayar,
            'status' => $request->status,
            'buktitf' => $request->buktitf,
            'user' => $request->user,
        ]);

       $produk->where('id', $request->kodeproduk)->decrement('stok', $jumlah);
        // dd($keranjang);
        Alert::success('Sukses!', 'Pesanan Dibuat!');
        return redirect()->route('pesanan.index');
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
        return view('pesanan.show', compact('data'));
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
    public function destroy($id, Produk $produk)
    {
        // $data = Checkout::find($id);
        // $data->delete();

        $id = Checkout::all();
        // DB::table("checkouts")->where("id", $id)->delete();


        // $id = $request['id'];
        $pesanan = DB::table('checkouts')
        ->join('produks', 'checkouts.kodeproduk', '=', 'produks.id')
        ->join('pelanggans', 'checkouts.kodepelanggan', '=', 'pelanggans.id')
        ->select('checkouts.*', 'produks.*', 'pelanggans.*', 'checkouts.status AS statusco', 'produks.id AS idproduk', 'pelanggans.id AS idpelanggan', 'checkouts.id AS idco')
        ->where('checkouts.user', $user)
        ->where('checkouts.id', $id)
        ->delete();


        $produk->where('id', $request->kodeproduk)->increment('stok', $jumlah);
        return redirect()->route('pesanan.index')->with('succes', 'Jenis Simpanan berhasil di hapus'); 
    }
}
