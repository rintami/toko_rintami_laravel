<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Checkout;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CokaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Checkout $checkout)
    {
        // $pesanan = DB::table('checkouts')
        // ->join('produks', 'checkouts.kodeproduk', '=', 'produks.id')
        // ->join('pelanggans', 'checkouts.kodepelanggan', '=', 'pelanggans.id')
        // ->select('checkouts.*', 'produks.*', 'pelanggans.*', 'checkouts.status AS statusco', 'produks.id AS idproduk', 'pelanggans.id AS idpelanggan', 'checkouts.id AS idco')
        // ->get();

        $pesanan = Checkout::latest()->paginate(15);
        $checkout = Checkout::first();

        return view('cokaryawan.index', compact('pesanan', 'checkout'))->with('i', (request()->input('page', 1) -1) *15);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkout $checkout)
    {
        return view('cokaryawan.edit', compact('checkout'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkout $checkout)
    {
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
            'totalharga' => $request->totalharga,
            'metodebayar' => $request->metodebayar,
            'status' => $request->status,
            'buktitf' => $request->buktitf,
            'user' => $request->user,
        ]);

        $checkout->update($request->all());

        Alert::success('Sukses!', 'Data Berhasil Di Edit!');
        return redirect()->route('cokaryawan.index');
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
