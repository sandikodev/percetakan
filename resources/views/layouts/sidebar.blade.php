@php
$nama_dan_logo             = App\Models\Website::first();

$paid       = App\Models\Transaksi::where('status_pembayaran','=','PAID')->count();
$postpaid       = App\Models\Transaksi::where('status_pembayaran','=','POSTPAID')->count();
$total_order_pending       = $paid + $postpaid;

$total_order_proses        = App\Models\Transaksi::where('status_order','=','PROSES')->count();
$total_order_selesai       = App\Models\Transaksi::where('status_order','=','SELESAI')->count();

$unpaid_belum_lunas = App\Models\Transaksi::where('status_pembayaran','=','UNPAID')->count();
$postpaid_belum_lunas = App\Models\Transaksi::where('status_pembayaran','=','POSTPAID')->count();
$total_tagihan_belum_lunas = $unpaid_belum_lunas + $postpaid_belum_lunas;

$total_tagihan_lunas       = App\Models\Transaksi::where('status_pembayaran','=','PAID')->count();


@endphp

   <body class="layout-light side-menu">
      <div class="mobile-author-actions"></div>
      <header class="header-top">
         <nav class="navbar navbar-light">
            <div class="navbar-left">
               <div class="logo-area">
                  <img src="{{asset('percetakan/img/'.$nama_dan_logo->icon)}}" width="45px" height="45px">
                  <a class="navbar-brand" href="{{ URL::to('dashboard') }}">
                    {{ $nama_dan_logo->nama_web }}
                  </a>
                  <a href="#" class="sidebar-toggle">
                  <img class="svg" src="{{ asset('percetakan/img/svg/align-center-alt.svg') }}" alt="img"></a>
               </div>
            </div>
            <div class="navbar-right">
               <ul class="navbar-right__menu">

                  <li class="nav-author">
                     <div class="dropdown-custom">
                        <a href="javascript:;" class="nav-item-toggle"><img src="{{ asset('percetakan/img/user-profile.png') }}" alt class="rounded-circle">
                        <span class="nav-item__title">{{ Auth::user()->name}}<i class="las la-angle-down nav-item__arrow"></i></span>
                        </a>
                        <div class="dropdown-parent-wrapper">
                           <div class="dropdown-wrapper">
                              <div class="nav-author__info">
                                 <div class="author-img">
                                    <img src="{{ asset('percetakan/img/user-profile.png') }}" alt class="rounded-circle">
                                 </div>
                                 <div>
                                    <h6>{{ Auth::user()->name}}</h6>
                                    <span>{{ Auth::user()->email}}</span>
                                 </div>
                              </div>
                              <div class="nav-author__options">
                                 <ul>
                                    <li>
                                       <a href="{{URL::to('profile')}}">
                                       <i class="uil uil-user"></i> Profile</a>
                                    </li>
                                 </ul>
                                 <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" target="_blank" class="nav-author__signout">
                                 <i class="uil uil-sign-out-alt"></i>Keluar</a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                                    @csrf
                
                                </form> 
                              </div>
                           </div>
                        </div>
                     </div>
                  </li>
               </ul>
               <div class="navbar-right__mobileAction d-md-none">
                  <a href="#" class="btn-author-action">
                  <img class="svg" src="{{ asset('percetakan/img/svg/more-vertical.svg') }}" alt="more-vertical"></a>
               </div>
            </div>
         </nav>
      </header>
      <main class="main-content">
         <div class="sidebar-wrapper">
            <div class="sidebar sidebar-collapse" id="sidebar">
               <div class="sidebar__menu-group">
                  <ul class="sidebar_nav">

        @role(['Admin','Superadmin'])

                     <li class=" {{ Request::segment(1) == 'dashboard'  ? 'active' : ''}}">
                        <a href="{{ URL::to('dashboard') }}" class>
                        <span class="nav-icon uil uil-create-dashboard"></span>
                        <span class="menu-text">Dashboard</span>
                        </a>
                     </li>
                     <li class="has-child {{ Request::segment(2) == 'semua-pesanan' || Request::segment(2) == 'pending-pesanan' || Request::segment(2) == 'unpaid-pesanan' || Request::segment(2) == 'proses-pesanan' || Request::segment(2) == 'selesai-pesanan'   ? 'open' : ''}}">
                        <a href="#" class="has-child {{ Request::segment(2) == 'semua-pesanan' || Request::segment(2) == 'pending-pesanan' || Request::segment(2) == 'proses-pesanan' || Request::segment(2) == 'selesai-pesanan'  ? 'active' : ''}}">
                        <span class="nav-icon uil uil-shopping-cart"></span>
                        <span class="menu-text">Orders</span>
                        <span class="toggle-icon"></span>
                        </a>
                        <ul>
                           <li class="{{ Request::segment(2) == 'semua-pesanan'  ? 'active' : ''}}">
                              <a href="{{ URL::to('admin/semua-pesanan')}}">Semua Pesanan</a>
                           </li>
                           <li class="{{ Request::segment(2) == 'unpaid-pesanan'  ? 'active' : ''}}">
                              <a href="{{ URL::to('admin/unpaid-pesanan')}}">Unpaid  @if($total_tagihan_belum_lunas <> 0)  <span class="badge badge-warning menuItem rounded-circle">{{$total_tagihan_belum_lunas}}</span>@endif</a> 
                           </li>
                           <li class="{{ Request::segment(2) == 'pending-pesanan'  ? 'active' : ''}}">
                              <a href="{{ URL::to('admin/pending-pesanan')}}">Pending  @if($total_order_pending <> 0)  <span class="badge badge-warning menuItem rounded-circle">{{$total_order_pending}}</span>@endif</a> 
                           </li>
                           <li class="{{ Request::segment(2) == 'proses-pesanan'  ? 'active' : ''}}">
                              <a href="{{ URL::to('admin/proses-pesanan')}}">Proses  @if($total_order_proses <> 0)  <span class="badge badge-info menuItem rounded-circle">{{$total_order_proses}}</span>@endif</a>
                           </li>
                           <li class="{{ Request::segment(2) == 'selesai-pesanan'  ? 'active' : ''}}">
                              <a href="{{ URL::to('admin/selesai-pesanan')}}">Selesai  @if($total_order_selesai <> 0)  <span class="badge badge-success menuItem rounded-circle">{{$total_order_selesai}}</span>@endif</a>
                           </li>
                        </ul>
                     </li>
                     <li class=" {{ Request::segment(3) == 'pengambilan-item'  ? 'active' : ''}}">
                        <a href="{{ URL::to('admin/item/pengambilan-item') }}" class>
                        <span class="nav-icon uil uil-box"></span>
                        <span class="menu-text">Pengambilan Item</span>
                        </a>
                     </li>
                     <li class="has-child {{ Request::segment(2) == 'tagihan'   ? 'open' : ''}}">
                        <a href="#" class="has-child {{ Request::segment(2) == 'tagihan' ? 'active' : ''}}">
                        <span class="nav-icon uil uil-bill"></span>
                        <span class="menu-text">Tagihan Pelanggan</span>
                        <span class="toggle-icon"></span>
                        </a>
                        <ul>
                           <li class="{{ Request::segment(3) == 'semua-tagihan'  ? 'active' : ''}}">
                              <a href="{{ URL::to('admin/tagihan/semua-tagihan')}}" >Semua Tagihan</a>
                           </li>
                           <li class="{{ Request::segment(3) == 'belum-lunas'  ? 'active' : ''}}">
                              <a href="{{ URL::to('admin/tagihan/belum-lunas')}}">Belum Lunas @if($total_tagihan_belum_lunas <> 0)  <span class="badge badge-warning menuItem rounded-circle">{{$total_tagihan_belum_lunas}}</span>@endif</a>
                           </li>
                           <li class="{{ Request::segment(3) == 'lunas'  ? 'active' : ''}}">
                              <a href="{{ URL::to('admin/tagihan/lunas')}}">Lunas  @if($total_tagihan_lunas <> 0)  <span class="badge badge-success menuItem rounded-circle">{{$total_tagihan_lunas}}</span>@endif</a>
                           </li>
                        </ul>
                     </li>
                     @role('Superadmin')
                     <li class=" {{ Request::segment(2) == 'layanan'  ? 'active' : ''}}">
                        <a href="{{ URL::to('admin/layanan') }}" class>
                        <span class="nav-icon uil uil-clipboard"></span>
                        <span class="menu-text">Layanan</span>
                        </a>
                     </li>
                     <li class=" {{ Request::segment(2) == 'limit'  ? 'active' : ''}}">
                        <a href="{{ URL::to('admin/limit') }}" class>
                        <span class="nav-icon uil uil-file-lock-alt"></span>
                        <span class="menu-text">Limit Orders</span>
                        </a>
                     </li>
                     <li class=" {{ Request::segment(2) == 'users'  ? 'active' : ''}}">
                        <a href="{{ URL::to('admin/users') }}" class>
                        <span class="nav-icon uil uil-users-alt"></span>
                        <span class="menu-text">Users</span>
                        </a>
                     </li>
                     <li class="has-child {{ Request::segment(2) == 'settings'   ? 'open' : ''}}">
                        <a href="#" class="has-child {{ Request::segment(2) == 'settings' ? 'active' : ''}}">
                        <span class="nav-icon uil uil-setting"></span>
                        <span class="menu-text">Settings</span>
                        <span class="toggle-icon"></span>
                        </a>
                        <ul>
                           <li class="{{ Request::segment(3) == 'web-settings'  ? 'active' : ''}}">
                              <a href="{{ URL::to('admin/settings/web-settings') }}">Website</a>
                           </li>
                           <li class="{{ Request::segment(3) == 'payment-gateway'  ? 'active' : ''}}">
                              <a href="{{ URL::to('admin/settings/payment-gateway') }}">Payment Gateway</a>
                           </li>
                           <li class="{{ Request::segment(3) == 'whatsapp-gateway'  ? 'active' : ''}}">
                              <a href="{{ URL::to('admin/settings/whatsapp-gateway') }}">Whatsapp Gateway</a>
                           </li>
                           <li class="{{ Request::segment(3) == 'telegram-gateway'  ? 'active' : ''}}">
                              <a href="{{ URL::to('admin/settings/telegram-gateway') }}">Telegram Gateway</a>
                           </li>
                        </ul>
                     </li>
                     @endrole

        @endrole

        @role('Customer')

                    <li class=" {{ Request::segment(1) == 'dashboard'  ? 'active' : ''}}">
                        <a href="{{ URL::to('dashboard') }}" class>
                        <span class="nav-icon uil uil-create-dashboard"></span>
                        <span class="menu-text">Dashboard</span>
                        </a>
                    </li>

                    <li class=" {{ Request::segment(2) == 'buat-pesanan'  ? 'active' : ''}}">
                        <a href="{{ URL::to('customer/buat-pesanan') }}" class>
                        <span class="nav-icon uil uil-file-edit-alt"></span>
                        <span class="menu-text">Buat Pesanan</span>
                        </a>
                    </li>

                    <li class=" {{ Request::segment(2) == 'history-pesanan'  ? 'active' : ''}}">
                        <a href="{{ URL::to('customer/history-pesanan') }}" class>
                        <span class="nav-icon uil uil-box"></span>
                        <span class="menu-text">History Pesanan</span>
                        </a>
                    </li>

                    <li class=" {{ Request::segment(2) == 'layanan-kami'  ? 'active' : ''}}">
                        <a href="{{ URL::to('customer/layanan-kami') }}" class>
                        <span class="nav-icon uil uil-clipboard"></span>
                        <span class="menu-text">Layanan</span>
                        </a>
                     </li>

        @endrole

        @role('Reseller')

        <li class=" {{ Request::segment(1) == 'dashboard'  ? 'active' : ''}}">
            <a href="{{ URL::to('dashboard') }}" class>
            <span class="nav-icon uil uil-create-dashboard"></span>
            <span class="menu-text">Dashboard</span>
            </a>
        </li>

        <li class=" {{ Request::segment(2) == 'buat-pesanan'  ? 'active' : ''}}">
            <a href="{{ URL::to('customer/buat-pesanan') }}" class>
            <span class="nav-icon uil uil-file-edit-alt"></span>
            <span class="menu-text">Buat Pesanan</span>
            </a>
        </li>

        <li class=" {{ Request::segment(2) == 'history-pesanan'  ? 'active' : ''}}">
            <a href="{{ URL::to('customer/history-pesanan') }}" class>
            <span class="nav-icon uil uil-box"></span>
            <span class="menu-text">History Pesanan</span>
            </a>
        </li>

        <li class=" {{ Request::segment(2) == 'layanan-kami'  ? 'active' : ''}}">
            <a href="{{ URL::to('customer/layanan-kami') }}" class>
            <span class="nav-icon uil uil-clipboard"></span>
            <span class="menu-text">Layanan</span>
            </a>
         </li>

@endrole

        
                  </ul>
               </div>
            </div>
         </div>