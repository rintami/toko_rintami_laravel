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
  @include('sweetalert::alert')


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
                        {{-- <a class="btn btn-info btn-sm" href="{{ route('karyawan.show', $data->id) }}"><i class="fas fa-eye"></i></a> --}}
                        <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#editmodal{{$data->id}}"><i class="fas fa-pencil-alt">Setujui Pesanan</i></a>
                    @csrf
                    @method('DELETE')
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

{{-- {!! $pesanan->links() !!} --}}

@endsection

@foreach($cokaryawan as $cokaryawan)
{{-- update data co --}}
<div class="modal" tabindex="-1" role="dialog" id="editmodal{{$cokaryawan->id}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Konfirmasi Pesanan Pelanggan</h5>
        <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Edit Detail Produk</h4>
                </div>
                <div class="card-body">
                  <form class="needs-validation" action="{{ route('cokaryawan.update', $cokaryawan->id) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      @if(session('failed'))
                        <div class="alert alert-danger">{{ session('failed') }}</div>
                      @endif
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Produk</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control" name="kodeproduk" value="{{$cokaryawan->kodeproduk}}" >
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Pelanggan</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control" name="kodepelanggan" value="{{$cokaryawan->kodepelanggan}}" readonly>
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jumlah Barang</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="number" class="form-control" name="jumlah" value="{{$cokaryawan->jumlah}}" readonly>
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Pemesanan</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="date" class="form-control" name="tanggal" value="{{$cokaryawan->tanggal}}" readonly>
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga Barang Satuan</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="number" class="form-control" name="harga" value="{{$cokaryawan->harga}}" readonly>
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Total Harga</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="number" class="form-control" name="totalharga" value="{{$cokaryawan->totalharga}}" readonly>
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Metode Pembayaran</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control" name="metodebayar" value="{{$cokaryawan->metodebayar}}" readonly>
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bukti TF</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control" name="buktitf" value="{{$cokaryawan->buktitf}}" readonly>
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control" name="status" value="Pesanan Diproses" readonly>
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pembeli</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control" name="user" value="{{$cokaryawan->user}}" readonly>
                        </div>
                      </div>

                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                          <button type="submit" class="btn btn-primary">Setujui Pesanan!</button>
                        </div>
                      </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach