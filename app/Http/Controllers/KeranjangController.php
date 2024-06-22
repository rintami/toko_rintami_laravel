<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Keranjang;
use Illuminate\Support\Facades\Hash;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keranjang = Keranjang::latest()->paginate(15);
        return view('keranjang.index', compact('keranjang'))->with('i', (request()->input('page', 1) -1) *15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('keranjang.create');
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
            'tanggal' => 'required',
            'jumlah' => 'required',
            'totalharga' => 'required',
        ]);

        Keranjang::create($request->all());

        return redirect()->route('keranjang.index')->with('succes', 'Data berhasil di input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Keranjang $keranjang)
    {
        return view('keranjang.show', compact('keranjang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Keranjang $keranjang)
    {
        return view('keranjang.edit', compact('keranjang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keranjang $keranjang)
    {
        $request -> validate([
            'kodeproduk' => 'required',
            'kodepelanggan' => 'required',
            'tanggal' => 'required',
            'jumlah' => 'required',
            'totalharga' => 'required',
        ]);

        $keranjang -> update($request->all());

        return redirect()->route('keranjang.index')->with('succes', 'Data berhasil di input');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $keranjang = Keranjang::find($id);
        $keranjang -> delete();

        return redirect()->route('keranjang.index')->with('succes', 'Jenis Simpanan berhasil di hapus'); 
    }
}
