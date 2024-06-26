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
    public function index(Checkout $cokaryawan)
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
    public function edit(Checkout $cokaryawan)
    {
        return view('cokaryawan.edit', ['checkout' => $cokaryawan], compact('cokaryawan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkout $cokaryawan)
    {
        $request -> validate([
            'kodeproduk' => 'required',
            'kodepelanggan' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            'totalharga' => 'required',
            'tanggal' => 'required',
            'metodebayar' => 'required',
            'buktitf' => 'required',
            'status' => 'required',
            'user' => 'required',
        ]);

        $cokaryawan -> update($request->all());

        Alert::success('Sukses!', 'Pesanan Disetujui!');
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
