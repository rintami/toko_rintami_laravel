@extends('layouts.app')
@section('title', 'Detail Produk')
@section('detailproduk', 'active')

@section('section_header')
<h1>Edit Detail Produk</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="{{ route('detailproduk.index') }}">Back</a></div>
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
        <form class="needs-validation" action="{{ route('detailproduk.update', $detailproduk->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if(session('failed'))
              <div class="alert alert-danger">{{ session('failed') }}</div>
            @endif
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Produk</label>
              <div class="col-sm-12 col-md-7">
                <select class="form-control" name="kodeproduk">
                  @foreach ($produk as $iniproduk)
                  <option value="{{ $iniproduk->kodeproduk }}" @if($iniproduk->kodeproduk == $iniproduk->kodeproduk) selected @endif>{{ $iniproduk->nama}}</option>
                  @endforeach
               </select>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar 1</label>
              <div class="col-sm-12 col-md-7">
                <input type="file" class="form-control" name="gambar1" placeholder="Masukkan Gambar 1" value="{{ $detailproduk->nama1 }}">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar 2</label>
              <div class="col-sm-12 col-md-7">
                <input type="file" class="form-control" name="gambar2" placeholder="Masukkan Gambar 2" value="{{ $detailproduk->nama2 }}">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar 3</label>
              <div class="col-sm-12 col-md-7">
                <input type="file" class="form-control" name="gambar3" placeholder="Masukkan Gambar 3" value="{{ $detailproduk->nama3 }}">
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
