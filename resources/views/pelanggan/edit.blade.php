@extends('layouts.app')
@section('title', 'Pelanggan')
@section('pelanggan', 'active')

@section('section_header')
<h1>Edit Pelanggan</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="{{ route('pelanggan.index') }}">Back</a></div>
</div>
@endsection

@section('wrap_content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Edit Pelanggan</h4>
      </div>
      <div class="card-body">
        <form class="needs-validation" action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if(session('failed'))
              <div class="alert alert-danger">{{ session('failed') }}</div>
            @endif
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" value="{{ $pelanggan->nama }}">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Kelamin</label>
              <div class="col-sm-12 col-md-7">
                <select class="form-control" name="jkel">
                        <option value="" holder> -- Pilih Jenis Kelamin -- </option>
                        <option value="Laki-Laki" @if( $pelanggan->jenisKelamin == "Laki-Laki") selected @endif>Laki-Laki</option>
                        <option value="Perempuan" @if( $pelanggan->jenisKelamin == "Perempuan") selected @endif>Perempuan</option>
                </select>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No. Telepon</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="telepon" placeholder="Masukkan No. Telepon" value="{{ $pelanggan->telepon }}">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
              <div class="col-sm-12 col-md-7">
                <input type="email" class="form-control" name="email" placeholder="Masukkan Email" value="{{ $pelanggan->email }}">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
              <div class="col-sm-12 col-md-7">
                <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat">{{ $pelanggan->alamat }}</textarea>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kota</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="kota" placeholder="Masukkan Kota" value="{{ $pelanggan->kota }}">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="status" placeholder="Masukkan Status" value="{{ $pelanggan->status }}">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="pwd" placeholder="Masukkan Password" value="{{ $pelanggan->pwd }}">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
              <div class="col-sm-12 col-md-7">
                <button type="submit" class="btn btn-primary">Update</button>
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
