@extends('layouts.app')
@section('title', 'Pesanan Pelanggan')
@section('cokaryawan', 'active')

@section('wrap_content')

<form class="needs-validation" action="{{ route('cokaryawan.update', $checkout->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Kode Produk</label>
        <input type="text" 
            name="kodeproduk" 
            value="{{$checkout->kodeproduk}}" 
            class="form-control @error('kodeproduk')is-invalid @enderror">
        @error('kodeproduk')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    
    <div class="form-group">
        <label>Kode Pelanggan</label>
        <input type="text" 
            name="kodepelanggan" 
            value="{{$checkout->kodepelanggan}}" 
            class="form-control @error('kodepelanggan')is-invalid @enderror">
        @error('kodepelanggan')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    

    <input type="date" name="tanggal" value="{{$checkout->tanggal}}">
    @error('tanggal')
        <div class="invalid-feedback">{{$message}}</div>
    @enderror

    <input type="text" name="jumlah" value="{{$checkout->jumlah}}">
    @error('jumlah')
        <div class="invalid-feedback">{{$message}}</div>
    @enderror

    <input type="text" name="harga" value="{{$checkout->harga}}">
    <input type="text" name="totalharga" value="{{$checkout->totalharga}}">
    <input type="text" name="metodebayar" value="{{$checkout->metodebayar}}">
    <input type="text" name="buktitf" value="{{$checkout->buktitf}}">
    <input type="text" name="status" value="Pesanan Diproses">
    <input type="text" name="user" value="{{$checkout->user}}">
    <button type="submit" class="btn btn-success btn-sm">Setujui Pesanan</button>
</form>
@endsection