@extends('layouts.app')
@section('title', 'Karyawan')
@section('karyawan', 'active')

@section('section_header')
<h1>Edit Karyawan</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="{{ route('karyawan.index') }}">Back</a></div>
</div>
@endsection

@section('wrap_content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Edit Karyawan</h4>
      </div>
      <div class="card-body">
        <form class="needs-validation" action="{{ route('karyawan.update', $karyawan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if(session('failed'))
              <div class="alert alert-danger">{{ session('failed') }}</div>
            @endif
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" value="{{ $karyawan->nama }}">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Kelamin</label>
              <div class="col-sm-12 col-md-7">
                <select class="form-control" name="jkel">
                        <option value="" holder> -- Pilih Jenis Kelamin -- </option>
                        <option value="Laki-Laki" @if( $karyawan->jenisKelamin == "Laki-Laki") selected @endif>Laki-Laki</option>
                        <option value="Perempuan" @if( $karyawan->jenisKelamin == "Perempuan") selected @endif>Perempuan</option>
                </select>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No. Telepon</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="telepon" placeholder="Masukkan No. Telepon" value="{{ $karyawan->telepon }}">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
              <div class="col-sm-12 col-md-7">
                <input type="email" class="form-control" name="email" placeholder="Masukkan Email" value="{{ $karyawan->email }}">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
              <div class="col-sm-12 col-md-7">
                <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat">{{ $karyawan->alamat }}</textarea>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kota</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="kota" placeholder="Masukkan Kota" value="{{ $karyawan->kota }}">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jabatan</label>
              <div class="col-sm-12 col-md-7">
                <select class="form-control" name="jabatan">
                        <option value="" holder> -- Pilih Jabatan -- </option>
                        <option value="HRD" @if($karyawan->jabatan == "HRD") selected @endif>HRD</option>
                        <option value="Manager" @if( $karyawan->jabatan == "Manager") selected @endif>Manager</option>
                        <option value="Kasir" @if( $karyawan->jabatan == "Kasir") selected @endif>Kasir</option>
                        <option value="Admin" @if( $karyawan->jabatan == "Admin") selected @endif>Admin</option>
                </select>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gaji</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="gaji" placeholder="Masukkan Gaji" value="{{ $karyawan->gaji }}">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="pwd" placeholder="Masukkan Password" value="{{ $karyawan->pwd }}">
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
