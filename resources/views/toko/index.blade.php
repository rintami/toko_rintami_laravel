@extends('layouts.app')
@section('title', 'Toko')
@section('toko', 'active')

@section('section_header')
<h1>Toko</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="#">Toko</a></div>
  <div class="breadcrumb-item">List Toko</div>
</div>
@endsection

@section('wrap_content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <a href="#" class="btn btn-lg btn-primary text-white rounded" data-toggle="modal" data-target="#createmodal"><i class="fas fa-plus"></i>Tambah Toko</a>
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
                <th class="text-center">Nama</th>
                <th class="text-center">Telepon</th>
                <th class="text-center">Email</th>
                <th class="text-center">Alamat</th>
                <th class="text-center">Kota</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($toko as $store)
              <tr>
                <td class="text-center">{{ ++$i }}</td>
                <td>{{$store->namatoko}}</td>
                <td>{{$store->telepon}}</td>
                <td>{{$store->email}}</td>
                <td>{{$store->alamat}}</td>
                <td>{{$store->kota}}</td>
                <td class="text-center">
                    <form action="{{ route('toko.destroy',$store->id) }}" method="POST">
                        <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#showmodal{{$store->id}}"><i class="fas fa-eye"></i></a>
                        <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#editmodal{{$store->id}}"><i class="fas fa-pencil-alt"></i></a>
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

{!! $toko->links() !!}

@endsection

{{-- create modal --}}
<div class="modal" tabindex="-1" role="dialog" id="createmodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create Toko</h5>
        <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <form class="needs-validation" action="{{ route('toko.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(session('failed'))
                      <div class="alert alert-danger">{{ session('failed') }}</div>
                    @endif
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="namatoko" placeholder="Masukkan Nama">
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

{{-- edit modal --}}
@foreach($toko as $toko)
<div class="modal" tabindex="-1" role="dialog" id="editmodal{{$toko->id}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Toko</h5>
        <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>

      </div>
      <div class="modal-body">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <form class="needs-validation" action="{{ route('toko.update', $toko->id) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      @if(session('failed'))
                        <div class="alert alert-danger">{{ session('failed') }}</div>
                      @endif
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control" name="namatoko" placeholder="Masukkan Nama" value="{{ $toko->namatoko }}">
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No. Telepon</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control" name="telepon" placeholder="Masukkan No. Telepon" value="{{ $toko->telepon }}">
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="email" class="form-control" name="email" placeholder="Masukkan Email" value="{{ $toko->email }}">
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                        <div class="col-sm-12 col-md-7">
                          <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat">{{ $toko->alamat }}</textarea>
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kota</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control" name="kota" placeholder="Masukkan Kota" value="{{ $toko->kota }}">
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
<div class="modal" tabindex="-1" role="dialog" id="showmodal{{$toko->id}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Toko</h5>
        <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>

      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ID :</strong>
                    {{ $toko->id }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama :</strong>
                    {{ $toko->nama }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Telepon :</strong>
                    {{ $toko->telepon }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email :</strong>
                    {{ $toko->email }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Alamat :</strong>
                    {{ $toko->alamat }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kota :</strong>
                    {{ $toko->kota }}
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