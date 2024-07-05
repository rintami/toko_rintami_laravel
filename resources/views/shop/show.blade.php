@extends('template.index')
@section('title', 'Product')
@section('shop', 'active-menu')
@section('main')
<br>
<br>
<br>
<br>
<center>
<div class="card text-center border-primary mb-3" style="width: 50%;">
  <div class="card-header">
    Detail Produk
  </div>
  <div class="card-body">
    <center>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width:30%;">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="{{asset('gambarproduk/'.$shop->gambar1)}}" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('gambarproduk/'.$shop->gambar2)}}" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('gambarproduk/'.$shop->gambar3)}}" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      </center>
<br>
<br>
    <p class="card-title">Nama Produk : {{$shop->namaproduk}}</p>
    <p class="card-text">Nama Toko : {{$shop->namatoko}}</p>
    <p class="card-text">Kategori : {{$shop->keterangan}}</p>
    <p class="card-text">Stok : {{$shop->stok}}</p>
    <p class="card-text">Harga : {{$shop->harga}}</p>
    <p class="card-text">Daerah : {{$shop->kota}}</p>
    <p class="card-text">Deskripsi : {{$shop->deskripsi}}</p>

    <form class="form-group" action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(session('failed'))
              <div class="alert alert-danger">{{ session('failed') }}</div>
            @endif
                <input type="text" class="form-control" name="kodeproduk" value="{{$shop->id}}" readonly hidden>
                <input type="text" class="form-control" name="kodepelanggan" value="{{Session::get('id')}}" readonly hidden>
                <input type="date" class="form-control" name="tanggal" value="<?php echo date('Y-m-d')?>" readonly hidden>
                <center>
                  
                <table>
                  <tr>
                    <td><label for="" class="card-text" for="exampleInputPassword1">Jumlah Barang</label></td>
                    <td>:</td>
                    <td>
                      <div class="wrap-num-product flex-w m-l-auto m-r-0">
                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                          <i class="fs-16 zmdi zmdi-minus"></i>
                        </div>

                        <input class="mtext-104 cl3 txt-center num-product" type="number" name="jumlah">

                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                          <i class="fs-16 zmdi zmdi-plus"></i>
                        </div>
                      </div>
                    </td>
                  </tr>
                </table>
                </center>
                </div>
                <input type="number" name="harga" value="{{$shop->harga}}" readonly hidden>
                <input type="text" name="user" value="{{Session::get('email')}}" readonly hidden>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
              <div class="col-sm-12 col-md-7">
                <button type="reset" class="btn btn-secondary">Cancel</button>
                <button type="submit" class="btn btn-primary">Masukkan Keranjang</button>
              </div>
            </div>
    </form>
  </div>

</div>
</center>
    
@endsection