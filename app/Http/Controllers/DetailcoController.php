<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\detailco;
use Illuminate\Support\Facades\Hash;

class DetailcoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detailco = detailco::latest()->paginate(15);
        return view('detailco.index', compact('detailco'))->with('i', (request()->input('page', 1) -1) *15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('detailco.create');
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
            'kodeco' => 'required',
            'kodeproduk' => 'required',
            'harga' => 'required',
        ]);

        detailco::create($request->all());

        return redirect()->route('detailco.index')->with('succes', 'Data berhasil di input');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(detailco $detailco)
    {
        return view('detailco.show', compact('detailco'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(detailco $detailco)
    {
        return view('detailco.edit', compact('detailco'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, detailco $detailco)
    {
        $request -> validate([
            'kodeco' => 'required',
            'kodeproduk' => 'required',
            'harga' => 'required',
        ]);

        $detailco -> update($request->all());

        return redirect()->route('detailco.index')->with('succes', 'Data berhasil di input');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detailco = detailco::find($id);
        $detailco -> delete();

        return redirect()->route('detailco.index')->with('succes', 'Jenis Simpanan berhasil di hapus'); 
    }
}
