<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\detailproduk;
use App\Models\produk;
use Illuminate\Support\Facades\Hash;

class DetailprodukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detailproduk = detailproduk::latest()->paginate(15);
        return view('detailproduk.index', compact('detailproduk'))->with('i', (request()->input('page', 1) -1) *15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Produk::all();
        return view('detailproduk.create', compact('produk'));
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
            'gambar1' => 'required|mimes:jpeg,jpg,png,gif',
            'gambar2' => 'required|mimes:jpeg,jpg,png,gif',
            'gambar3' => 'required|mimes:jpeg,jpg,png,gif',
        ]);

        $gambar1 = $request->file('gambar1');
        $gambar2 = $request->file('gambar2');
        $gambar3 = $request->file('gambar3');

        if ($gambar1) {
            $nama1 = $gambar1->getClientOriginalName();
            $gambar1->move('gambarproduk/', $nama1);
        }

        if ($gambar2) {
            $nama2 = $gambar2->getClientOriginalName();
            $gambar2->move('gambarproduk/', $nama2);
        }

        if ($gambar3) {
            $nama3 = $gambar3->getClientOriginalName();
            $gambar3->move('gambarproduk/', $nama3);
        }

        $detailproduk = detailproduk::create([
            'kodeproduk' => $request->kodeproduk,
            'gambar1' => $nama1,
            'gambar2' => $nama2,
            'gambar3' => $nama3
        ]);

        // detailproduk::create($request->all());

        return redirect()->route('detailproduk.index')->with('succes', 'Data berhasil di input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(detailproduk $detailproduk)
    {
        return view('detailproduk.show', compact('detailproduk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(detailproduk $detailproduk)
    {
        return view('detailproduk.edit', compact('detailproduk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, detailproduk $detailproduk)
    {
        $request -> validate([
            'kodeproduk' => 'required',
            'gambar1' => 'required|mimes:jpeg,jpg,png,gif',
            'gambar2' => 'required|mimes:jpeg,jpg,png,gif',
            'gambar3' => 'required|mimes:jpeg,jpg,png,gif',
        ]);

        $gambar1 = $request->file('gambar1');
        $gambar2 = $request->file('gambar2');
        $gambar3 = $request->file('gambar3');

        if ($gambar1) {
            $nama1 = $gambar1->getClientOriginalName();
            $gambar1->move('gambarproduk/', $nama1);
        }

        if ($gambar2) {
            $nama2 = $gambar2->getClientOriginalName();
            $gambar2->move('gambarproduk/', $nama2);
        }

        if ($gambar3) {
            $nama3 = $gambar3->getClientOriginalName();
            $gambar3->move('gambarproduk/', $nama3);
        }

        $detailproduk -> update ([
            'kodeproduk' => $request->kodeproduk,
            'gambar1' => $nama1,
            'gambar2' => $nama2,
            'gambar3' => $nama3
        ]);

        return redirect()->route('detailproduk.index')->with('succes', 'Data berhasil di input');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detailproduk = detailproduk::find($id);
        $detailproduk -> delete();

        return redirect()->route('detailproduk.index')->with('succes', 'Jenis Simpanan berhasil di hapus'); 
    }
}
