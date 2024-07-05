@extends('layouts.app')
@section('title', 'Produk')
@section('produk', 'active')

@section('section_header')
<h1>Tambah Produk</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="{{ route('produk.index') }}">Back</a></div>
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
          <form class="needs-validation" action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(session('failed'))
              <div class="alert alert-danger">{{ session('failed') }}</div>
            @endif
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Toko</label>
              <div class="col-sm-12 col-md-7">
                <select class="form-control" name="kodetoko">
                  @foreach ($toko as $initoko)
                  <option value="{{ $initoko->kodetoko }}">{{ $initoko->kodetoko}} {{ $initoko->namatoko}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Kategori</label>
              <div class="col-sm-12 col-md-7">
                <select class="form-control" name="kodekategori">
                  @foreach ($kategori as $inikategori)
                  <option value="{{ $inikategori->kodekategori }}">{{ $inikategori->kodekategori}} {{ $inikategori->keterangan}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="namaproduk" placeholder="Masukkan Nama">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Stok</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="stok" placeholder="Masukkan Stok">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="harga" placeholder="Masukkan Harga">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Daerah</label>
              <div class="col-sm-12 col-md-7">
                <select class="form-control" name="daerah">
                  @foreach ($toko as $toko)
                    <option value="{{ $toko->kota }}">{{ $toko->namatoko}} - {{ $toko->kota}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
              <div class="col-sm-12 col-md-7">
                <textarea class="form-control" name="deskripsi" placeholder="Masukkan Deskripsi"></textarea>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar 1</label>
              <div class="col-sm-12 col-md-7">
                <input type="file" class="form-control" name="gambar1" placeholder="Masukkan Gambar 1">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar 2</label>
              <div class="col-sm-12 col-md-7">
                <input type="file" class="form-control" name="gambar2" placeholder="Masukkan Gambar 2">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar 3</label>
              <div class="col-sm-12 col-md-7">
                <input type="file" class="form-control" name="gambar3" placeholder="Masukkan Gambar 3">
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