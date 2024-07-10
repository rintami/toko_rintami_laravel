@extends('layouts.app')
@section('title', 'Karyawan')
@section('karyawan', 'active')

@section('section_header')
<h1>Karyawan</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="#">Karyawan</a></div>
  <div class="breadcrumb-item">List Karyawan</div>
</div>
@endsection

@section('wrap_content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <a href="#" class="btn btn-lg btn-primary text-white rounded" data-toggle="modal" data-target="#createmodal"><i class="fas fa-plus"></i>Tambah Karyawan</a>
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
                <th class="text-center">Jenis Kelamin</th>
                <th class="text-center">Email</th>
                <th class="text-center">Jabatan</th>
                <th class="text-center">Gaji</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($karyawan as $employee)
              <tr>
                <td class="text-center">{{ ++$i }}</td>
                <td>{{$employee->nama}}</td>
                <td>{{$employee->jkel}}</td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->jabatan}}</td>
                <td>Rp.{{number_format($employee->gaji, 0,',','.')}}</td>
                <td class="text-center">
                    <form action="{{ route('karyawan.destroy',$employee->id) }}" method="POST">
                        <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#showmodal{{$employee->id}}"><i class="fas fa-eye"></i></a>
                        <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#editmodal{{$employee->id}}"><i class="fas fa-pencil-alt"></i></a>
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

{!! $karyawan->links() !!}

@endsection

{{-- create modal --}}
<div class="modal" tabindex="-1" role="dialog" id="createmodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create Karyawan</h5>
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
                  <form class="needs-validation" action="{{ route('karyawan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(session('failed'))
                      <div class="alert alert-danger">{{ session('failed') }}</div>
                    @endif
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Kelamin</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control" name="jkel">
                                <option value="" holder> -- Pilih Jenis Kelamin -- </option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                        </select>
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
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jabatan</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control" name="jabatan">
                                <option value="" holder> -- Pilih Jabatan -- </option>
                                <option value="HRD">HRD</option>
                                <option value="Manager">Manager</option>
                                <option value="Kasir">Kasir</option>
                                <option value="Admin">Admin</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gaji</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="gaji" placeholder="Masukkan Gaji">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="pwd" placeholder="Masukkan Password">
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
@foreach($karyawan as $karyawan)
<div class="modal" tabindex="-1" role="dialog" id="editmodal{{$karyawan->id}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Karyawan</h5>
        <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>

      </div>
      <div class="modal-body">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <form class="needs-validation" action="{{ route('karyawan.update', $karyawan->id) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      @if(session('failed'))
                        <div class="alert alert-danger">{{ session('failed') }}</div>
                      @endif
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" value="{{ $karyawan->nama }}">
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Kelamin</label>
                        <div class="col-sm-12 col-md-7">
                          <select class="form-control" name="jkel">
                                  <option value="" holder> -- Pilih Jenis Kelamin -- </option>
                                  <option value="Laki-Laki" @if( $karyawan->jkel == "Laki-Laki") selected @endif>Laki-Laki</option>
                                  <option value="Perempuan" @if( $karyawan->jkel == "Perempuan") selected @endif>Perempuan</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No. Telepon</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control" name="telepon" placeholder="Masukkan No. Telepon" value="{{ $karyawan->telepon }}">
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="email" class="form-control" name="email" placeholder="Masukkan Email" value="{{ $karyawan->email }}">
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                        <div class="col-sm-12 col-md-7">
                          <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat">{{ $karyawan->alamat }}</textarea>
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kota</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control" name="kota" placeholder="Masukkan Kota" value="{{ $karyawan->kota }}">
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jabatan</label>
                        <div class="col-sm-12 col-md-7">
                          <select class="form-control" name="jabatan">
                                  <option value="" holder> -- Pilih Jabatan -- </option>
                                  <option value="HRD" @if($karyawan->jabatan == "HRD") selected @endif>HRD</option>
                                  <option value="Manager" @if( $karyawan->jabatan == "Manager") selected @endif>Manager</option>
                                  <option value="Kasir" @if( $karyawan->jabatan == "Kasir") selected @endif>Kasir</option>
                                  <option value="Admin" @if( $karyawan->jabatan == "Admin") selected @endif>Admin</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gaji</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control" name="gaji" placeholder="Masukkan Gaji" value="{{ $karyawan->gaji }}">
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control" name="pwd" placeholder="Masukkan Password" value="{{ $karyawan->pwd }}">
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
<div class="modal" tabindex="-1" role="dialog" id="showmodal{{$karyawan->id}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Karyawan</h5>
        <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>ID :</strong>
                      {{ $karyawan->id }}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Nama :</strong>
                      {{ $karyawan->nama }}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Jenis Kelamin :</strong>
                      {{ $karyawan->jkel }}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Telepon :</strong>
                      {{ $karyawan->telepon }}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Email :</strong>
                      {{ $karyawan->email }}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Alamat :</strong>
                      {{ $karyawan->alamat }}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Kota :</strong>
                      {{ $karyawan->kota }}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Jabatan :</strong>
                      {{ $karyawan->jabatan }}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Gaji :</strong>
                      {{ $karyawan->gaji }}
                  </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Password :</strong>
                      {{ $karyawan->pwd }}
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