@extends('layouts.app')
@section('title', 'Detail Produk')
@section('detailproduk', 'active')

@section('section_header')
<h1>Detail Produk</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="#">Detail Produk</a></div>
  <div class="breadcrumb-item">List Detail Produk</div>
</div>
@endsection

@section('wrap_content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <a href="{{ route('detailproduk.create')}}" class="btn btn-lg btn-primary text-white rounded"><i class="fas fa-plus"></i>Tambah Detail Produk</a>
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
                <th class="text-center">Kode Produk</th>
                <th class="text-center">Gambar 1</th>
                <th class="text-center">Gambar 2</th>
                <th class="text-center">Gambar 3</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($detailproduk as $detail)
              <tr>
                <td class="text-center">{{ ++$i }}</td>
                <td>{{$detail->kodeproduk}}</td>
                <td>
                  <img src="{{asset('gambarproduk/'.$detail->gambar1)}}" alt="" style="width: 50px">
                </td>
                <td>
                  <img src="{{asset('gambarproduk/'.$detail->gambar2)}}" alt="" style="width: 50px">
                </td>
                <td>
                  <img src="{{asset('gambarproduk/'.$detail->gambar3)}}" alt="" style="width: 50px">
                </td>
                <td class="text-center">
                    <form action="{{ route('detailproduk.destroy',$detail->id) }}" method="POST">
                        <a class="btn btn-info btn-sm" href="{{ route('detailproduk.show', $detail->id) }}"><i class="fas fa-eye"></i></a>
                        <a class="btn btn-primary btn-sm" href="{{ route('detailproduk.edit', $detail->id) }}"><i class="fas fa-pencil-alt"></i></a>
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

{!! $detailproduk->links() !!}

@endsection
