@extends('layouts.app')
@section('title', 'Produk')
@section('produk', 'active')

@section('section_header')
<h1>Produk</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="#">Produk</a></div>
  <div class="breadcrumb-item">List Produk</div>
</div>
@endsection

@section('wrap_content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <a href="#" class="btn btn-lg btn-primary text-white rounded" data-toggle="modal" data-target="#createmodal"><i class="fas fa-plus"></i>Tambah Produk</a>
      </div>
      <div class="card-body">
        @if(session('failed'))
        <div class="alert alert-danger">{{session('failed')}}</div>
        @endif
        @if(session('success'))
        <div class="container alert alert-success alert-dismissible" role="alert">
          {{session('success')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        <div class="table-responsive">
          <table class="table table-striped" id="table-1">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Gambar 1</th>
                <th class="text-center">Gambar 2</th>
                <th class="text-center">Gambar 3</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Stok</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($produk as $product)
              <tr>
                <td class="text-center">{{ ++$i }}</td>
                <td>
                  <img src="{{asset('gambarproduk/'.$product->gambar1)}}" alt="" style="width: 50px">
                </td>
                <td>
                  <img src="{{asset('gambarproduk/'.$product->gambar2)}}" alt="" style="width: 50px">
                </td>
                <td>
                  <img src="{{asset('gambarproduk/'.$product->gambar3)}}" alt="" style="width: 50px">
                </td>
                <td>{{$product->namaproduk}}</td>
                <td>{{$product->stok}}</td>
                <td>Rp.{{number_format($product->harga, 0,',','.')}}</td>
                <td class="text-center">
                    <form action="{{ route('produk.destroy',$product->id) }}" method="POST">
                        <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#showmodal_{{$product->id}}"><i class="fas fa-eye"></i></a>
                        <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#editmodal_{{$product->id}}"><i class="fas fa-pencil-alt"></i></a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick = "return confirm
                    ('Apakah Anda Yakin Ingin Menghapus Data Ini?')"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

{!! $produk->links() !!}

@endsection

{{-- create modal --}}
<div class="modal" tabindex="-1" role="dialog" id="createmodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create Produk</h5>
        <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-12">
              <div class="card">
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
                          @foreach ($toko as $initoko)
                            <option value="{{ $initoko->kota }}" @if(old('daerah') == $initoko->kota) {{ 'selected' }} @endif>
                              {{ $initoko->namatoko}} - {{ $initoko->kota}}
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@foreach($produk as $produk)
{{-- edit modal --}}
<div class="modal" tabindex="-1" role="dialog" id="editmodal_{{ $produk->id }}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Produk</h5>
        <button type="button" class="btn-close" aria-label="Close" data-dismiss="modal"></button>
      </div>
      <div class="modal-body">
          <div class="row">
            <div class="col-12">
              <div class="card">
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
                            <option value="{{ $initoko->id }}" @if($initoko->id == $initoko->id) selected @endif>{{$initoko->id}} - {{ $initoko->namatoko}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Kategori</label>
                        <div class="col-sm-12 col-md-7">
                          <select class="form-control" name="kodekategori">
                            @foreach ($kategori as $inikategori)
                            <option value="{{ $inikategori->id }}" @if($inikategori->id == $inikategori->id) selected @endif>{{$initoko->id}}- {{ $inikategori->keterangan}}</option>
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
                          <input type="file" class="form-control" name="gambar1" placeholder="Masukkan Gambar 1" value="{{ $produk->gambar1 }}" accept="{{$produk->gambar1}}">
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar 2</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="file" class="form-control" name="gambar2" placeholder="Masukkan Gambar 2" value="{{ $produk->gambar2 }}" accept="{{$produk->gambar1}}">
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar 3</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="file" class="form-control" name="gambar3" placeholder="Masukkan Gambar 3" value="{{ $produk->gambar3 }}" accept="{{$produk->gambar1}}">
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

{{-- show modal --}}
<div class="modal" tabindex="-1" role="dialog" id="showmodal_{{ $produk->id }}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Produk</h5>
        <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>ID :</strong>
                      {{ $produk->id }}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Kode Toko :</strong>
                      {{ $produk->kodetoko }}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Kode Kategori :</strong>
                      {{ $produk->kodekategori }}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Nama :</strong>
                      {{ $produk->nama }}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Stok :</strong>
                      {{ $produk->stok }}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Harga :</strong>
                      {{ $produk->harga }}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Daerah :</strong>
                      {{ $produk->daerah }}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Deskripsi :</strong>
                      {{ $produk->deskripsi }}
                  </div>
              </div><div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Gambar 1 :</strong>
                          <img src="{{asset('gambarproduk/'.$produk->gambar1)}}" alt="" style="width: 50px">
                  </div>
              </div><div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Gambar 2 :</strong>
                          <img src="{{asset('gambarproduk/'.$produk->gambar2)}}" alt="" style="width: 50px">
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Gambar 3 :</strong>
                          <img src="{{asset('gambarproduk/'.$produk->gambar3)}}" alt="" style="width: 50px">
                  </div>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach