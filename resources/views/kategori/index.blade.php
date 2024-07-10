@extends('layouts.app')
@section('title', 'Kategori')
@section('kategori', 'active')

@section('section_header')
<h1>Kategori Produk</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="#">Kategori Produk</a></div>
  <div class="breadcrumb-item">List Kategori</div>
</div>
@endsection

@section('wrap_content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <a href="#" class="btn btn-lg btn-primary text-white rounded" data-toggle="modal" data-target="#modal"><i class="fas fa-plus"></i> Tambah Kategori</a>
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
                <th class="text-center">Keterangan</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($kategori as $kate)
              <tr>
                <td class="text-center">{{ ++$i }}</td>
                <td>{{$kate->keterangan}}</td>
                <td class="text-center">
                    <form action="{{ route('kategori.destroy',$kate->id) }}" method="POST">
                        <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#modalshow{{$kate->id}}"><i class="fas fa-eye"></i></a>
                        <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#modaledit{{$kate->id}}"><i class="fas fa-pencil-alt"></i></a>
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

{!! $kategori->links() !!}

@endsection

<!-- create modal -->
<div class="modal" tabindex="-1" role="dialog" id="modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Kategori</h5>
        <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              {{-- <div class="card-header">
                <h4>Make Schedule</h4>
              </div> --}}
              <div class="card-body">
                <form class="needs-validation" action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @if(session('failed'))
                    <div class="alert alert-danger">{{ session('failed') }}</div>
                  @endif
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" class="form-control" name="keterangan" placeholder="Masukkan Keterangan">
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
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


{{-- edit modal --}}
@foreach($kategori as $kategori)
<div class="modal lg" tabindex="-1" role="dialog" id="modaledit{{$kategori->id}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Kategori</h5>
        <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <form class="needs-validation" action="{{ route('kategori.update', $kategori->id) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      @if(session('failed'))
                        <div class="alert alert-danger">{{ session('failed') }}</div>
                      @endif
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control" name="keterangan" placeholder="Masukkan Keterangan" value="{{ $kategori->keterangan }}">
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

{{-- showmodal --}}
<div class="modal" tabindex="-1" role="dialog" id="modalshow{{$kategori->id}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Kategori</h5>
        <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>

      </div>
      <div class="modal-body">
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>ID :</strong>
                      {{ $kategori->id }}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Keterangan :</strong>
                      {{ $kategori->keterangan }}
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

{{-- <div class="modal" tabindex="-1" role="dialog" id="modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Kategori</h5>
        <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>

      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> --}}