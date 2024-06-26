@extends('template.page')
@section('title', 'Pesanan')
@section('pesanan', 'active-menu')
@section('main')
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
            <img class="d-block w-100" src="{{asset('gambarproduk/'.$data->gambar1)}}" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('gambarproduk/'.$data->gambar1)}}" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('gambarproduk/'.$data->gambar1)}}" alt="Third slide">
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
    <p class="card-title">Nama Produk : {{$data->namaproduk}}</p>
    <p class="card-text">Nama Toko : {{$data->namatoko}}</p>
    <p class="card-text">Kategori : {{$data->keterangan}}</p>
    <p class="card-text">Stok : {{$data->stok}}</p>
    <p class="card-text">Harga : {{$data->harga}}</p>
    <p class="card-text">Daerah : {{$data->daerah}}</p>
    <p class="card-text">Deskripsi : {{$data->deskripsi}}</p>

    <form class="form-group" action="{{ route('pesanan.store') }}" method="POST" enctype="multipart/form-data">
      
            @csrf
            @if(session('failed'))
              <div class="alert alert-danger">{{ session('failed') }}</div>
            @endif
                <input type="text" class="form-control" name="kodeproduk" value="{{$data->kodeproduk}}" readonly hidden>
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
                  <tr>
                    <td><label for="" class="card-text" for="exampleInputPassword1">Metode Pembayaran</label></td>
                    <td>:</td>
                    <td>
                      <select name="metodebayar" id="" class="form-control">
                        <option value="Transfer Bank BRI">Transfer Bank BRI</option>
                        <option value="Transfer Bank BCA">Transfer Bank BCA</option>
                        <option value="Transfer Bank BNI">Transfer Bank BNI</option>
                        <option value="Gopay">Gopay</option>
                        <option value="OVO">OVO</option>
                        <option value="DANA">DANA</option>
                    </select>
                    </td>
                  </tr>
                  <tr>
                    <td><label for="" class="card-text" for="exampleInputPassword1">Bukti Transfer Pembayaran</label></td>
                    <td>:</td>
                    <td>
                      <input type="file" name="buktitf" id="" class="form-control">
                    </td>
                  </tr>
                </table>
                </center>
                <input type="number" name="harga" value="{{$data->harga}}" readonly hidden>
                
                <input type="text" name="status" value="Dipesan" readonly hidden>
                
                <input type="text" name="user" value="{{Session::get('email')}}" readonly hidden>

                <br>
                <br>
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
</center>

