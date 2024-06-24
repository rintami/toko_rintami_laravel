<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Produk</title>
</head>
<body>
    <form class="needs-validation" action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
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
        <input type="text" name="kodeproduk" value="{{$data->kodeproduk}}" readonly>
        <input type="text" name="kodepelanggan" value="{{Session::get('id')}}" readonly>
        <input type="date" name="kodeproduk" value="<?php echo date('Y-m-d')?>" readonly>
        <input type="number" min="1" name="jumlah">
        <input type="number" value="{{$data->harga}}" readonly name="harga">
        <input type="text" name="user" value="{{Session::get('email')}}" readonly>
        <button type="submit" class="btn btn-primary">Masukkan Keranjang</button>
    </form>
    <a href="#" onclick="event.preventDefault(); return @redirect('pesanan.create')">Buat Pesanan</a>
</body>
</html>