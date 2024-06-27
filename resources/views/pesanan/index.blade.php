@extends('template.page')
@section('title', 'Pesanan')
@section('pesanan', 'active-menu')
@section('main')
<br>
<br>
<br>
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="/" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Pesanan
			</span>
		</div>
	</div>

	


    	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Produk</th>
									<th class="column-2"></th>
									<th class="column-3">Harga</th>
									<th class="column-4">Jumlah</th>
									<th class="column-5">Total</th>
									<th class="column-6">Status</th>
									<th class="column-7">Bukti TF</th>
									<th class="column-8"></th>
								</tr>

                                @foreach($pesanan as $data)
								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="{{asset('gambarproduk/'.$data->gambar1)}}" alt="IMG" width="100px">
										</div>
									</td>
									<td class="column-2">{{$data->namaproduk}}</td>
									<td class="column-3">Rp.{{number_format($data->harga, 0,',','.')}}</td>
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="{{$data->jumlah}}">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>
									<td class="column-5">Rp.{{number_format($data->totalharga, 0,',','.')}}</td>
									<td class="column-6">{{$data->statusco}}</td>
									<td class="column-7">
										<div class="how-itemcart1">
											<img src="{{asset('buktitf/'.$data->buktitf)}}" alt="IMG" width="100px">
										</div>
									</td>

									{{-- @if($data->statusco == "Dipesan") --}}
										<td class="column-8">
											<form action="{{ route('pesanan.destroy',$data->idco) }}" method="POST">
												@csrf
												@method('DELETE')
												<button type="submit" class="btn btn-danger btn-sm" onclick = "return confirm
												('Apakah Anda Yakin Ingin Membatalkan Pesanan Ini?')">Batalkan Pesanan</button>
											</form>
										</td>
									{{-- @endif --}}
										
									
									
								</tr>
                                @endforeach
							</table>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection