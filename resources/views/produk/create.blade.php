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
                <select name="kodetoko" class="form-control @error('kodetoko')is-invalid @enderror">
                  @foreach ($toko as $initoko)
                  <option value="{{ $initoko->id }}" @if(old('kodetoko') == $initoko->id) {{ 'selected' }} @endif {{old('kodetoko')}}>
                    {{ $initoko->id}} {{ $initoko->namatoko}}
                  </option>
                  @endforeach
                </select>
                @error('kodetoko')
                  <div class="invalid-feedback">{{$message}}</div>
                @enderror
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Kategori</label>
              <div class="col-sm-12 col-md-7">
                <select name="kodekategori" class="form-control @error('kodekategori')is-invalid @enderror">
                  @foreach ($kategori as $inikategori)
                  <option value="{{ $inikategori->id }}" @if(old('kodekategori') == $initoko->id) {{ 'selected' }} @endif>
                    {{ $inikategori->id}} {{ $inikategori->keterangan}}
                  </option>
                  @endforeach
                </select>
                @error('kodekategori')
                  <div class="invalid-feedback">{{$message}}</div>
                @enderror
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" name="namaproduk" 
                  class="form-control @error('namaproduk')is-invalid @enderror" 
                  value="{{ old('namaproduk') }}"
                  placeholder="Masukkan Nama">
                @error('namaproduk')
                  <div class="invalid-feedback">{{$message}}</div>
                @enderror
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Stok</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" name="stok"  
                  class="form-control @error('stok')is-invalid @enderror" 
                  value="{{ old('stok') }}"
                  placeholder="Masukkan Stok">
                @error('stok')
                  <div class="invalid-feedback">{{$message}}</div>
                @enderror
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" name="harga" 
                  class="form-control @error('harga')is-invalid @enderror" 
                  value="{{ old('harga') }}"
                  placeholder="Masukkan Harga">
                @error('harga')
                  <div class="invalid-feedback">{{$message}}</div>
                @enderror
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Daerah</label>
              <div class="col-sm-12 col-md-7">
                <select name="daerah" class="form-control @error('daerah')is-invalid @enderror">
                  @foreach ($toko as $toko)
                    <option value="{{ $toko->kota }}" @if(old('daerah') == $initoko->kota) {{ 'selected' }} @endif>
                      {{ $toko->namatoko}} - {{ $toko->kota}}
                    </option>
                  @endforeach
                </select>
                @error('daerah')
                  <div class="invalid-feedback">{{$message}}</div>
                @enderror
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
              <div class="col-sm-12 col-md-7">
                <textarea name="deskripsi" class="form-control @error('deskripsi')is-invalid @enderror" placeholder="Masukkan Deskripsi">
                  {{ old('deskripsi') }}
                </textarea>
                @error('deskripsi')
                  <div class="invalid-feedback">{{$message}}</div>
                @enderror
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar 1</label>
              <div class="col-sm-12 col-md-7">
                <input type="file" name="gambar1" class="form-control @error('gambar1')is-invalid @enderror" placeholder="Masukkan Gambar 1">
                @error('gambar1')
                  <div class="invalid-feedback">{{$message}}</div>
                @enderror
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar 2</label>
              <div class="col-sm-12 col-md-7">
                <input type="file" name="gambar2" class="form-control @error('gambar2')is-invalid @enderror" placeholder="Masukkan Gambar 2">
                @error('gambar2')
                  <div class="invalid-feedback">{{$message}}</div>
                @enderror
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar 3</label>
              <div class="col-sm-12 col-md-7">
                <input type="file" name="gambar3" class="form-control @error('gambar3')is-invalid @enderror" placeholder="Masukkan Gambar 3">
                @error('gambar3')
                  <div class="invalid-feedback">{{$message}}</div>
                @enderror
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