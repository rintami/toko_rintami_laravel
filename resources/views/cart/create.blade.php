<form class="needs-validation" action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(session('failed'))
              <div class="alert alert-danger">{{ session('failed') }}</div>
            @endif
            <div class="form-group row mb-4">
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="kodeproduk">
                <input type="text" class="form-control" name="kodepelanggan" value="{{Session::get('id')}}">
                <input type="date" class="form-control" name="tanggal" value="<?php echo date('Y-m-d')?>">
                <input type="text" name="jumlah">
                <input type="text" name="harga">
                <input type="text" name="user" value="{{Session::get('email')}}">
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
