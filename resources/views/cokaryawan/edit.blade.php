@extends('layouts.app')
@section('title', 'Pesanan Pelanggan')
@section('cokaryawan', 'active')

@section('section_header')
<h1>Edit Detail Produk</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="{{ route('cokaryawan.index') }}">Back</a></div>
</div>
@endsection

@section('wrap_content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Edit Detail Produk</h4>
      </div>
      <div class="card-body">
        <form class="needs-validation" action="{{ route('cokaryawan.update', $cokaryawan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if(session('failed'))
              <div class="alert alert-danger">{{ session('failed') }}</div>
            @endif
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Produk</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="kodeproduk" value="{{$cokaryawan->kodeproduk}}" >
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Pelanggan</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="kodepelanggan" value="{{$cokaryawan->kodepelanggan}}" readonly>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jumlah Barang</label>
              <div class="col-sm-12 col-md-7">
                <input type="number" class="form-control" name="jumlah" value="{{$cokaryawan->jumlah}}" readonly>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Pemesanan</label>
              <div class="col-sm-12 col-md-7">
                <input type="date" class="form-control" name="tanggal" value="{{$cokaryawan->tanggal}}" readonly>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga Barang Satuan</label>
              <div class="col-sm-12 col-md-7">
                <input type="number" class="form-control" name="harga" value="{{$cokaryawan->harga}}" readonly>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Total Harga</label>
              <div class="col-sm-12 col-md-7">
                <input type="number" class="form-control" name="totalharga" value="{{$cokaryawan->totalharga}}" readonly>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Metode Pembayaran</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="metodebayar" value="{{$cokaryawan->metodebayar}}" readonly>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bukti TF</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="buktitf" value="{{$cokaryawan->buktitf}}" readonly>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="status" value="Pesanan Diproses" readonly>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pembeli</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="user" value="{{$cokaryawan->user}}" readonly>
              </div>
            </div>

            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
              <div class="col-sm-12 col-md-7">
                <button type="submit" class="btn btn-primary">Setujui Pesanan!</button>
              </div>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script_page')
<!-- <script src="{{ asset('stisla/assets/js/page/features-post-create.js') }}"></script> -->
@endsection
