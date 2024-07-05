<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Love-Shop!</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">LS</a>
        </div>
        <ul class="sidebar-menu">
            <li class=@yield('dash')><a class="nav-link" href="{{ route('dash.index') }}"><i class="fa fa-tachometer" aria-hidden="true"></i> <span>Dashboard</span></a></li>   
            <li class=@yield('kategori')><a class="nav-link" href="{{ route('kategori.index') }}"><i class="fa fa-tasks" aria-hidden="true"></i> <span>Kategori</span></a></li>   
            <li class=@yield('toko')><a class="nav-link" href="{{ route('toko.index') }}"><i class="fa fa-building" aria-hidden="true"></i> <span>Toko</span></a></li>  
            <li class=@yield('produk')><a class="nav-link" href="{{ route('produk.index') }}"><i class="fas fa-th-large"></i> <span>Produk</span></a></li>  
            <li class=@yield('karyawan')><a class="nav-link" href="{{ route('karyawan.index') }}"><i class="fa fa-users" aria-hidden="true"></i> <span>Karyawan</span></a></li>
            <li class=@yield('cokaryawan')><a class="nav-link" href="{{ route('cokaryawan.index') }}"><i class="fa fa-credit-card" aria-hidden="true"></i><span>Pesanan Pelanggan</span></a></li>
          </ul>

            {{-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                    <i class="fas fa-rocket"></i> Documentation
                </a>
            </div> --}}
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
