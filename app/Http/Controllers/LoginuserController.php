<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class LoginuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('loginuser.index');
    }

    public function logincus(Request $request)
    {
        //dd($request->all());
        $data = Pelanggan::where('email', $request->email) 
        ->first();
        //dd($data->user_id);

        // $data = Pelanggan::where('email', $request->email)->first();

        if ($data) {
            if (Hash::check($request->pwd, $data->pwd)) {
                session::put('id',$data->id);
                session::put('email',$data->email);
                session::put('jkel',$data->jkel);
                session::put('telepon',$data->telepon);
                session::put('alamat',$data->alamat);
                session::put('kota',$data->kota);
                session::put('status',$data->status);
                session::put('pwd',$data->pwd);
                session(['berhasil_login'=> true]);
                return redirect('/');
            }
            else {
                Alert::warning('Ups!', 'Password yang Anda Masukkan Salah!');
                return view('loginuser.index');
            }
        } else {
        Alert::warning('Ups!', 'Email tidak ditemukan!');
        return view('loginuser.index');
        }
    }

    public function logoutuser(Request $request){
        $request->session()->flush();
        return redirect('loginuser');
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
        $request -> validate([
            'nama' => 'required',
            'jkel' => 'required',
            'telepon' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'status' => 'required',
            'pwd' => 'required',
        ]);

        $pelanggan = Pelanggan::create([
            'nama' => $request->nama,
            'jkel' => $request->jkel,
            'telepon' => $request->telepon,
            'email' => $request->email,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'status' => $request->status,
            'pwd' => Hash::make($request->pwd),
        ]);

        Alert::success('Register Berhasil!', 'Silahkan Login Untuk Masuk Ke Halaman!');
        return redirect()->route('loginuser.index');
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
