<div class="table-responsive">
          <table class="table table-striped" id="table-1">
            <thead>
              <tr>
                <th class="text-center">Gambar 1</th>
                <th class="text-center">Gambar 2</th>
                <th class="text-center">Gambar 3</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Stok</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($barang as $product)
              <tr>
                <td>
                  <img src="{{asset('gambarproduk/'.$product->gambar1)}}" alt="" style="width: 50px">
                </td>
                <td>
                  <img src="{{asset('gambarproduk/'.$product->gambar2)}}" alt="" style="width: 50px">
                </td>
                <td>
                  <img src="{{asset('gambarproduk/'.$product->gambar3)}}" alt="" style="width: 50px">
                </td>
                <td>{{$product->namaproduk}}</td>
                <td>{{$product->stok}}</td>
                <td>Rp.{{number_format($product->harga, 0,',','.')}}</td>
                <td class="text-center">
                    <form action="{{ route('produk.destroy',$product->id) }}" method="POST">
                        <a class="btn btn-info btn-sm" href="{{ route('barang.show', $product->id) }}"><i class="fas fa-eye">cart</i></a>
                        <a class="btn btn-primary btn-sm" href="{{ route('barang.edit', $product->id) }}"><i class="fas fa-pencil-alt"></i></a>
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