<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Love-Shop!</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">LS</a>
        </div>
        <ul class="sidebar-menu">
            <li class=><a class="nav-link" href=""><i class="far fa-square"></i> <span>Blank Page</span></a></li> 
            <li class=@yield('kategori')><a class="nav-link" href="kategori"><i class="fa fa-tasks" aria-hidden="true"></i> <span>Kategori</span></a></li>   
            <li class=@yield('toko')><a class="nav-link" href="toko"><i class="fa fa-building" aria-hidden="true"></i> <span>Toko</span></a></li>  
            <li class=@yield('produk')><a class="nav-link" href="produk"><i class="fas fa-th-large"></i> <span>Produk</span></a></li> 
            <li class=@yield('detailproduk')><a class="nav-link" href="detailproduk"><i class="fa fa-shopping-basket" aria-hidden="true"></i> <span>Detail Produk</span></a></li>    
            <li class=@yield('karyawan')><a class="nav-link" href="karyawan"><i class="fa fa-users" aria-hidden="true"></i> <span>Karyawan</span></a></li> 
            <li class=@yield('home')><a class="nav-link" href="pelanggan"><i class="fa fa-address-book" aria-hidden="true"></i> <span>Pelanggan</span></a></li>
            <li class=@yield('keranjang')><a class="nav-link" href="keranjang"><i class="fa fa-credit-card" aria-hidden="true"></i> <span>Keranjang</span></a></li>
            <li class=@yield('checkout')><a class="nav-link" href="checkout"><i class="fa fa-tasks" aria-hidden="true"></i> <span>Checkout</span></a></li>
            <li class=@yield('detailco')><a class="nav-link" href="detailco"><i class="fa fa-file" aria-hidden="true"></i> <span>Detail Checkout</span></a></li>
          </ul>

            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                    <i class="fas fa-rocket"></i> Documentation
                </a>
            </div>
        </ul>
    </aside>
</div>

@section('script_page')
    <script>
      $(document).ready(function () {

        $('.wrap-menu').each(function(idx,item) {
          var count_menu = $(item).find('.submenu').length;
          if (count_menu === 0) {
            $(item).css({"display":"none"});
          }

          var active_menu = $(item).find('.active');
          if (active_menu.length > 0) {
            $(item).addClass('active');
            $(item).find('.dropdown-menu').addClass('d-block');
          }
          console.log(active_menu);
        });
        

      });

    </script>
@endsection
