<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = Karyawan::latest()->paginate(15);
        return view('karyawan.index', compact('karyawan'))->with('i', (request()->input('page', 1) -1) *15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karyawan.create');
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
            'jkel' => 'required',
            'telepon' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'jabatan' => 'required',
            'gaji' => 'required',
            'pwd' => 'required',
        ]);

        $karyawan = Karyawan::create([
            'nama' => $request->nama,
            'jkel' => $request->jkel,
            'telepon' => $request->telepon,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'jabatan' => $request->jabatan,
            'gaji' => $request->gaji,
            'pwd' => Hash::make($request->pwd),
        ]);


        Alert::success('Sukses!', 'Data Berhasil Di Tambahkan!');
        return redirect()->route('karyawan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        return view('karyawan.show', compact('karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
        return view('karyawan.edit', compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $request -> validate([
            'nama' => 'required',
            'jkel' => 'required',
            'telepon' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'jabatan' => 'required',
            'gaji' => 'required',
            'pwd' => 'required',
        ]);

        $datakar = [
            'nama' => $request->nama,
            'jkel' => $request->jkel,
            'telepon' => $request->telepon,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'jabatan' => $request->jabatan,
            'gaji' => $request->gaji,
            'pwd' => Hash::make($request->pwd),
        ];

        $karyawan->update($datakar);

        Alert::success('Sukses!', 'Data Berhasil Di Edit!');
        return redirect()->route('karyawan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $karyawan = Karyawan::find($id);
        $karyawan -> delete();

        Alert::success('Sukses!', 'Data Berhasil Di Hapus!');
        return redirect()->route('karyawan.index'); 
    }
}
