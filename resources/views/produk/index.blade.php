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
        <a href="{{ route('produk.create')}}" class="btn btn-lg btn-primary text-white rounded"><i class="fas fa-plus"></i>Tambah Produk</a>
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
                <th class="text-center">Kode Toko</th>
                <th class="text-center">Kode Kategori</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Stok</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Daerah</th>
                <th class="text-center">Deskripsi</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($produk as $product)
              <tr>
                <td class="text-center">{{ ++$i }}</td>
                <td>{{$product->kodetoko}}</td>
                <td>{{$product->kodekategori}}</td>
                <td>{{$product->nama}}</td>
                <td>{{$product->stok}}</td>
                <td>{{$product->harga}}</td>
                <td>{{$product->daerah}}</td>
                <td>{{$product->deskripsi}}</td>
                <td class="text-center">
                    <form action="{{ route('produk.destroy',$product->id) }}" method="POST">
                        <a class="btn btn-info btn-sm" href="{{ route('produk.show', $product->id) }}"><i class="fas fa-eye"></i></a>
                        <a class="btn btn-primary btn-sm" href="{{ route('produk.edit', $product->id) }}"><i class="fas fa-pencil-alt"></i></a>
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
