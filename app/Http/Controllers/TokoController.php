<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Toko;
use Illuminate\Support\Facades\Hash;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toko = Toko::latest()->paginate(15);
        return view('toko.index', compact('toko'))->with('i', (request()->input('page', 1) -1) *15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('toko.create');
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
            'nama' => 'required',
            'telepon' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
        ]);

        Toko::create($request->all());

        return redirect()->route('toko.index')->with('succes', 'Data berhasil di input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Toko $toko)
    {
        return view('toko.show', compact('toko'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Toko $toko)
    {
        return view('toko.edit', compact('toko'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Toko $toko)
    {
        $request -> validate([
            'nama' => 'required',
            'telepon' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
        ]);

        $toko -> update($request->all());

        return redirect()->route('toko.index')->with('succes', 'Data berhasil di input');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $toko = Toko::find($id);
        $toko -> delete();

        return redirect()->route('toko.index')->with('succes', 'Jenis Simpanan berhasil di hapus'); 
    }
}
