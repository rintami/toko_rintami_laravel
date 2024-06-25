<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class LoginkaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('logkaryawan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function loginkar(Request $request)
    {
        //dd($request->all());
        $data = Karyawan::where('email', $request->email) 
        ->first();
        //dd($data->user_id);

        // $data = Pelanggan::where('email', $request->email)->first();

        if ($data) {
            if (Hash::check($request->pwd, $data->pwd)) {
                session::put('id',$data->id);
                session::put('nama',$data->nama);
                session::put('email',$data->email);
                session::put('jkel',$data->jkel);
                session::put('telepon',$data->telepon);
                session::put('alamat',$data->alamat);
                session::put('kota',$data->kota);
                session::put('status',$data->status);
                session::put('jabatan',$data->jabatan);
                session::put('gaji',$data->gaji);
                session::put('pwd',$data->pwd);
                session(['berhasillogin'=> true]);
                Alert::success('Berhasil Login!', 'Selamat Datang Admin!');
                return redirect('kategori');
            }
            else {
                Alert::warning('Ups!', 'Password yang Anda Masukkan Salah!');
                return view('logkaryawan.index');
            }
        } else {
        Alert::warning('Ups!', 'Email tidak ditemukan!');
        return view('logkaryawan.index');
        }
    }

    public function logoutkaryawan(Request $request){
        $request->session()->flush();
        return redirect('logkaryawan');
    }

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
        //
    }
}
