@extends('layouts.app')
@section('title', 'Produk')
@section('produk', 'active')

@section('section_header')
<h1>Edit Produk</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="{{ route('produk.index') }}">Back</a></div>
</div>
@endsection

@section('wrap_content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Edit Produk</h4>
      </div>
      <div class="card-body">
        <form class="needs-validation" action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if(session('failed'))
              <div class="alert alert-danger">{{ session('failed') }}</div>
            @endif
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Toko</label>
              <div class="col-sm-12 col-md-7">
                <select class="form-control" name="kodetoko">
                  @foreach ($toko as $initoko)
                  <option value="{{ $initoko->kodetoko }}" @if($initoko->kodetoko == $initoko->kodetoko) selected @endif>{{ $initoko->namatoko}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Kategori</label>
              <div class="col-sm-12 col-md-7">
                <select class="form-control" name="kodekategori">
                  @foreach ($kategori as $inikategori)
                  <option value="{{ $inikategori->kodekategori }}" @if($inikategori->kodekategori == $inikategori->kodekategori) selected @endif>{{ $inikategori->keterangan}}</option>
                  @endforeach
               </select>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="namaproduk" placeholder="Masukkan Nama" value="{{ $produk->namaproduk }}">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Stok</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="stok" placeholder="Masukkan Stok" value="{{ $produk->stok }}">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="harga" placeholder="Masukkan Harga" value="{{ $produk->harga }}">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Daerah</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="daerah" placeholder="Masukkan Daerah" value="{{ $produk->daerah }}">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
              <div class="col-sm-12 col-md-7">
                <textarea class="form-control" name="deskripsi" placeholder="Masukkan Deskripsi">{{ $produk->deskripsi }}</textarea>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar 1</label>
              <div class="col-sm-12 col-md-7">
                <input type="file" class="form-control" name="gambar1" placeholder="Masukkan Gambar 1" value="{{ $produk->nama1 }}" accept="{{$produk->nama1}}">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar 2</label>
              <div class="col-sm-12 col-md-7">
                <input type="file" class="form-control" name="gambar2" placeholder="Masukkan Gambar 2" value="{{ $produk->nama2 }}">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar 3</label>
              <div class="col-sm-12 col-md-7">
                <input type="file" class="form-control" name="gambar3" placeholder="Masukkan Gambar 3" value="{{ $produk->nama3 }}">
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
