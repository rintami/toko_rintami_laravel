@extends('layouts.app')
@section('title', 'Karyawan')
@section('karyawan', 'active')

@section('section_header')
<h1>Tambah Karyawan</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="{{ route('karyawan.index') }}">Back</a></div>
</div>
@endsection

@section('wrap_content')
<div class="row">
    <div class="col-12">
      <div class="card">
        {{-- <div class="card-header">
          <h4>Make Schedule</h4>
        </div> --}}
        <div class="card-body">
          <form class="needs-validation" action="{{ route('karyawan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(session('failed'))
              <div class="alert alert-danger">{{ session('failed') }}</div>
            @endif
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Kelamin</label>
              <div class="col-sm-12 col-md-7">
                <select class="form-control" name="jkel">
                        <option value="" holder> -- Pilih Jenis Kelamin -- </option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                </select>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No. Telepon</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="telepon" placeholder="Masukkan No. Telepon">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
              <div class="col-sm-12 col-md-7">
                <input type="email" class="form-control" name="email" placeholder="Masukkan Email">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
              <div class="col-sm-12 col-md-7">
                <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat"></textarea>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kota</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="kota" placeholder="Masukkan Kota">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jabatan</label>
              <div class="col-sm-12 col-md-7">
                <select class="form-control" name="jabatan">
                        <option value="" holder> -- Pilih Jabatan -- </option>
                        <option value="HRD">HRD</option>
                        <option value="Manager">Manager</option>
                        <option value="Kasir">Kasir</option>
                        <option value="Admin">Admin</option>
                </select>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gaji</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="gaji" placeholder="Masukkan Gaji">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="pwd" placeholder="Masukkan Password">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
              <div class="col-sm-12 col-md-7">
                <button type="reset" class="btn btn-secondary">Cancel</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
@endsection

@section('script_page')
<script src="{{ asset('assets/js/page/features-post-create.js') }}"></script>
@endsection