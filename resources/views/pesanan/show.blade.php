<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Produk</title>
</head>
<body>
    <p>Nama Produk : {{$data->namaproduk}}</p>
    <p>Nama Toko : {{$data->namatoko}}</p>
    <p>Kategori : {{$data->keterangan}}</p>
    <p>Stok : {{$data->stok}}</p>
    <p>Harga : {{$data->harga}}</p>
    <p>Daerah : {{$data->daerah}}</p>
    <p>Deskripsi : {{$data->deskripsi}}</p>
    <p>Gambar1 : {{$data->gambar1}}</p>
    <p>Gambar2 : {{$data->gambar2}}</p>
    <p>Gambar3 : {{$data->gambar3}}</p>
    <form class="needs-validation" action="{{ route('pesanan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(session('failed'))
              <div class="alert alert-danger">{{ session('failed') }}</div>
            @endif
            <div class="form-group row mb-4">
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="kodeproduk" value="{{$data->kodeproduk}}" readonly>
                <input type="text" class="form-control" name="kodepelanggan" value="{{Session::get('id')}}" readonly>
                <input type="date" class="form-control" name="tanggal" value="<?php echo date('Y-m-d')?>" readonly>
                <input type="number" min="1" name="jumlah">
                <input type="number" name="harga" value="{{$data->harga}}" readonly>
                <select name="metodebayar" id="">
                    <option value="Transfer Bank BRI">Transfer Bank BRI</option>
                    <option value="Transfer Bank BCA">Transfer Bank BCA</option>
                    <option value="Transfer Bank BNI">Transfer Bank BNI</option>
                    <option value="Gopay">Gopay</option>
                    <option value="OVO">OVO</option>
                    <option value="DANA">DANA</option>
                </select>
                <input type="text" name="status" value="Dipesan" readonly>
                <input type="file" name="buktitf" id="">
                <input type="text" name="user" value="{{Session::get('email')}}" readonly>
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

</body>
</html>