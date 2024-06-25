@extends('layouts.app')
@section('title', 'Pesanan Pelanggan')
@section('cokaryawan', 'active')

@section('section_header')
<h1>Pesanan</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="#">Pesanan</a></div>
  <div class="breadcrumb-item">Pesanan Pelanggan</div>
</div>
@endsection

@section('wrap_content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <a href="{{ route('karyawan.create')}}" class="btn btn-lg btn-primary text-white rounded"><i class="fas fa-plus"></i>Tambah Karyawan</a>
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
                <th class="text-center">Kode Pelanggan</th>
                <th class="text-center">Tanggal</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Jumlah</th>
                <th class="text-center">Total</th>
                <th class="text-center">Status</th>
                <th class="text-center">Bukti TF</th>
                <th class="text-center">User</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($pesanan as $data)
              <tr>
                <td class="text-center">{{ ++$i }}</td>
                <td>{{$data->kodeproduk}}</td>
                <td>{{$data->kodepelanggan}}</td>
                <td>{{$data->tanggal}}</td>
                <td>{{$data->harga}}</td>
                <td>{{$data->jumlah}}</td>
                <td>{{$data->totalharga}}</td>
                <td>{{$data->status}}</td>
                <td>
					<img src="{{asset('buktitf/'.$data->buktitf)}}" alt="IMG" width="100px">
                </td>
                <td>{{$data->user}}</td>
                <td class="text-center">
                    <form action="{{ route('karyawan.destroy',$data->id) }}" method="POST">
                        <a class="btn btn-info btn-sm" href="{{ route('karyawan.show', $data->id) }}"><i class="fas fa-eye"></i></a>
                        <a class="btn btn-primary btn-sm" href="{{ route('cokaryawan.edit', $data->id) }}"><i class="fas fa-pencil-alt"></i></a>
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

{{-- {!! $karyawan->links() !!} --}}

@endsection
