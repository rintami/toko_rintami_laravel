<form class="needs-validation" action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="kodeproduk">
        <input type="text" name="kodepelanggan" value="{{Session::get('id')}}">
        <input type="date" name="kodeproduk" value="<?php echo date('Y-m-d')?>">
        <input type="number" min="1" name="jumlah">
        <input type="number" value="" name="harga">
        <input type="text" name="user" value="{{Session::get('email')}}">
        <button type="submit" class="btn btn-primary">Masukkan Keranjang</button>
    </form>