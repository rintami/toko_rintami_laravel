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
        // $data = Pelanggan::where('email', $request->email) 
        // ->where('jkel', $request->jkel)
        // ->where('telepon', $request->telepon) 
        // ->where('email', $request->email)
        // ->where('alamat', $request->alamat)
        // ->where('kota', $request->kota)
        // ->where('status', $request->status)
        // ->where('pwd', $request->pwd)
        // ->first();
        //dd($data->user_id);

        $data = Pelanggan::where('email', $request->email)->first();
        if ($data) {
            if ($request->pwd == $data->pwd) {
                session::put('email',$data->email);
                session::put('status',$data->status);
                session(['berhasil_login'=> true]);
                return redirect('/');
            }
        }
        Alert::warning('Ups!', 'Data yang Anda Masukkan Salah!');
        return view('loginuser.index');
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
