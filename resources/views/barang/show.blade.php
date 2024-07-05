<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>ID :</strong>
            {{ $barang->id }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nama Toko :</strong>
            {{ $barang->namatoko }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Kategori :</strong>
            {{ $barang->keterangan }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nama :</strong>
            {{ $barang->nama }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Stok :</strong>
            {{ $barang->stok }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Harga :</strong>
            {{ $barang->harga }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Daerah :</strong>
            {{ $barang->daerah }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Deskripsi :</strong>
            {{ $barang->deskripsi }}
        </div>
    </div><div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Gambar 1 :</strong>
                <img src="{{asset('gambarproduk/'.$barang->gambar1)}}" alt="" style="width: 50px">
        </div>
    </div><div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Gambar 2 :</strong>
                <img src="{{asset('gambarproduk/'.$barang->gambar2)}}" alt="" style="width: 50px">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Gambar 3 :</strong>
                <img src="{{asset('gambarproduk/'.$barang->gambar3)}}" alt="" style="width: 50px">
        </div>
    </div>
</div>