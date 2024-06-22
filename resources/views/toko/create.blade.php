@extends('layouts.app')
@section('title', 'Toko')
@section('toko', 'active')

@section('section_header')
<h1>Tambah Toko</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="{{ route('toko.index') }}">Back</a></div>
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
          <form class="needs-validation" action="{{ route('toko.store') }}" method="POST" enctype="multipart/form-data">
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