@extends('layouts.app')
@section('title', 'Pesanan Pelanggan')
@section('cokaryawan', 'active')
<form class="needs-validation" action="{{ route('cokaryawan.update', [($checkout->id)]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="kodeproduk" value="{{$checkout->kodeproduk}}">
    <input type="text" name="kodepelanggan" value="{{$checkout->kodepelanggan}}">
    <input type="date" name="tanggal" value="{{$checkout->tanggal}}">
    <input type="text" name="jumlah" value="{{$checkout->jumlah}}">
    <input type="text" name="harga" value="{{$checkout->harga}}">
    <input type="text" name="totalharga" value="{{$checkout->totalharga}}">
    <input type="text" name="metodebayar" value="{{$checkout->metodebayar}}">
    <input type="text" name="buktitf" value="{{$checkout->buktitf}}">
    <input type="text" name="status" value="Pesanan Diproses">
    <input type="text" name="user" value="{{$checkout->user}}">
    <button type="submit" class="btn btn-success btn-sm">Setujui Pesanan</button>
</form>
@endsection