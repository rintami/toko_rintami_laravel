<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Checkout;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checkout = Checkout::latest()->paginate(15);
        return view('checkout.index', compact('checkout'))->with('i', (request()->input('page', 1) -1) *15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('checkout.create');
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
            'kodeproduk' => 'required',
            'kodepelanggan' => 'required',
            'jumlah' => 'required',
            'totalharga' => 'required',
            'tanggal' => 'required',
            'metodebayar' => 'required',
            'status' => 'required',
            'buktif' => 'required',
        ]);

        Checkout::create($request->all());

        return redirect()->route('checkout.index')->with('succes', 'Data berhasil di input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Checkout $checkout)
    {
        return view('checkout.show', compact('checkout'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkout $checkout)
    {
        return view('checkout.edit', compact('checkout'));
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
            'jumlah' => 'required',
            'totalharga' => 'required',
            'tanggal' => 'required',
            'metodebayar' => 'required',
            'status' => 'required',
            'buktif' => 'required',
        ]);

        $checkout -> update($request->all());

        return redirect()->route('checkout.index')->with('succes', 'Data berhasil di input');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $checkout = Checkout::find($id);
        $checkout -> delete();

        return redirect()->route('checkout.index')->with('succes', 'Jenis Simpanan berhasil di hapus'); 
    }
}
