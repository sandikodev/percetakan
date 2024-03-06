  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar  ">
    <div class="layout-container">
  
    
  
  <!-- Menu -->
  
  <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  
    
    <div class="app-brand demo ">
      <a href="#" class="app-brand-link">
        <span class="app-brand-logo demo">
          @php
          $nama_dan_logo       = App\Models\Website::first();
          @endphp
  <img src="{{asset('images/'.$nama_dan_logo->icon)}}" width="32" height="22">
  </span>
        <span class="app-brand-text demo menu-text fw-bold">{{ $nama_dan_logo->nama_web }}</span>
      </a>
  
      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
        <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
        <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
      </a>
    </div>
  
    <div class="menu-inner-shadow"></div>
    
    <ul class="menu-inner py-1">


      @role('Admin')
      <!-- Dashboards -->
      <li class="menu-item {{ Request::segment(1) == 'dashboard'  ? 'active' : ''}}">
        <a href="{{ route('dashboard')}}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-smart-home"></i>
          <div data-i18n="Dashboard">Dashboard</div>
        </a>
      </li>
      <li class="menu-item {{ Request::segment(2) == 'products' ||  Request::segment(2) == 'kategori' ||  Request::segment(2) == 'kupon'  ? 'active open' : ''}}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-box"></i>
          <div data-i18n="Products">Products</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ Request::segment(3) == 'products-list'  ? 'active' : ''}}">
            <a href="{{ URL::to('admin/products/products-list') }}" class="menu-link">
              <div data-i18n="Products List">Products List</div>
            </a>
          </li>
          <li class="menu-item {{ Request::segment(3) == 'kategori'  ? 'active' : ''}}">
            <a href="{{ URL::to('admin/products/kategori') }}" class="menu-link">
              <div data-i18n="Category">Category</div>
            </a>
          </li>
          <li class="menu-item {{ Request::segment(3) == 'lisensi'  ? 'active' : ''}}">
            <a href="{{ URL::to('admin/products/lisensi') }}" class="menu-link">
              <div data-i18n="Lisensi">Lisensi</div>
            </a>
          </li>
          <li class="menu-item {{ Request::segment(3) == 'kupon'  ? 'active' : ''}}">
            <a href="{{ URL::to('admin/products/kupon') }}" class="menu-link">
              <div data-i18n="Coupon Toko">Coupon Toko</div>
            </a>
          </li>
          <li class="menu-item {{ Request::segment(3) == 'kupon_produk'  ? 'active' : ''}}">
            <a href="{{ URL::to('admin/products/kupon_produk') }}" class="menu-link">
              <div data-i18n="Coupon Produk">Coupon Produk</div>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-item {{ Request::segment(2) == 'akses-produk'  ? 'active open' : ''}}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-box"></i>
          <div data-i18n="Akses Products">Akses Products</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ Request::segment(3) == 'create'  ? 'active' : ''}}">
            <a href="{{ URL::to('admin/akses-produk/create') }}" class="menu-link">
              <div data-i18n="Create Page">Create Page</div>
            </a>
          </li>
          <li class="menu-item {{ Request::segment(3) == ''  ? 'active' : ''}}">
            <a href="{{ URL::to('admin/akses-produk/') }}" class="menu-link">
              <div data-i18n="List Akses Pages">List Akses Pages</div>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-item {{ Request::segment(1) == 'daftar-lisensi' || Request::segment(1) == 'generate-lisensi'  || Request::segment(1) == 'daftar-lisensi-expired'  || Request::segment(1) == 'daftar-lisensi-registered' ? 'active open' : ''}}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-diamond"></i>
          <div data-i18n="License Key">License Key</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ Request::segment(1) == 'daftar-lisensi'  ? 'active' : ''}}">
            <a href="{{ URL::to('daftar-lisensi') }}" class="menu-link">
              <div data-i18n="Fresh License Key">Fresh License Key</div>
            </a>
          </li>
          <li class="menu-item {{ Request::segment(1) == 'generate-lisensi'  ? 'active' : ''}}">
            <a href="{{ URL::to('generate-lisensi') }}" class="menu-link">
              <div data-i18n="Generate License">Generate License</div>
            </a>
          </li>
          <li class="menu-item {{ Request::segment(1) == 'daftar-lisensi-registered'  ? 'active' : ''}}">
            <a href="{{ URL::to('daftar-lisensi-registered') }}" class="menu-link">
              <div data-i18n="Registered License">Registered License</div>
            </a>
          </li> 
          <li class="menu-item {{ Request::segment(1) == 'daftar-lisensi-expired'  ? 'active' : ''}}">
            <a href="{{ URL::to('daftar-lisensi-expired') }}" class="menu-link">
              <div data-i18n="Expired License">Expired License</div>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-item {{ Request::segment(1) == 'tambah-kategori' || Request::segment(1) == 'list-kategori'  ? 'active open' : ''}}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-diamond"></i>
          <div data-i18n="Kategori License">Kategori License</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ URL::to('tambah-kategori') }}" class="menu-link">
              <div data-i18n="Create Kategori">Create Kategori</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ URL::to('list-kategori') }}" class="menu-link">
              <div data-i18n="List Kategori">List Kategori</div>
            </a>
          </li>
        </ul>
      </li>
      <li class="menu-item {{ Request::segment(2) == 'sales-report'  ? 'active' : ''}}">
        <a href="{{ URL::to('admin/sales-report') }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-book"></i>
          <div data-i18n="Sales Report">Sales Report</div>
        </a>
      </li>
      <li class="menu-item {{ Request::segment(2) == 'broadcast'  ? 'active' : ''}}">
        <a href="{{ URL::to('admin/broadcast') }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-layout-kanban"></i>
          <div data-i18n="Broadcast">Broadcast</div>
        </a>
      </li>
      <li class="menu-item {{ Request::segment(2) == 'afiliasi'  ? 'active' : ''}}">
        <a href="{{ URL::to('admin/afiliasi') }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-users"></i>
          <div data-i18n="Affiliasi">Affiliasi</div>
        </a>
      </li>
      <li class="menu-item {{ Request::segment(2) == 'users'  ? 'active' : ''}}">
        <a href="{{ URL::to('admin/users') }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-settings"></i>
          <div data-i18n="Users">Users</div>
        </a>
      </li>
      <li class="menu-item {{ Request::segment(2) == 'settings' ? 'active open' : ''}}" style="">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-settings"></i>
          <div data-i18n="Settings">Settings</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ Request::segment(3) == 'web-settings'  ? 'active' : ''}}">
            <a href="{{ URL::to('admin/settings/web-settings') }}" class="menu-link">
              <div data-i18n="Website Settings">Website Settings</div>
            </a>
          </li>
          <li class="menu-item {{ Request::segment(3) == 'landingpage'  ? 'active' : ''}}">
            <a href="{{ URL::to('admin/settings/landingpage') }}" class="menu-link">
              <div data-i18n="Landing Page Settings">Landing Page Settings</div>
            </a>
          </li>
          <li class="menu-item {{ Request::segment(3) == 'payment-gateway'  ? 'active' : ''}}">
            <a href="{{ URL::to('admin/settings/payment-gateway') }}" class="menu-link">
              <div data-i18n="Payment Gateway">Payment Gateway</div>
            </a>
          </li>
          <li class="menu-item {{ Request::segment(3) == 'email'  ? 'active' : ''}}">
            <a href="{{ URL::to('admin/settings/email') }}" class="menu-link">
              <div data-i18n="Email Sender">Email Sender</div>
            </a>
          </li>
          <li class="menu-item {{ Request::segment(3) == 'whatsapp'  ? 'active' : ''}}">
            <a href="{{ URL::to('admin/settings/whatsapp') }}" class="menu-link">
              <div data-i18n="Whatsapp Sender">Whatsapp Sender</div>
            </a>
          </li>
        </ul>
      </li>
      @endrole

      @role('Member')
      <li class="menu-item {{ Request::segment(1) == 'dashboard'  ? 'active' : ''}}">
        <a href="{{ route('dashboard')}}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-smart-home"></i>
          <div data-i18n="Dashboard">Dashboard</div>
        </a>
      </li>
      <li class="menu-item {{ Request::segment(2) == 'produk'  ? 'active' : ''}}">
        <a href="{{route('produk.produk_dashboard')}}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-box"></i>
          <div data-i18n="Produk">Produk</div>
        </a>
      </li>
      <li class="menu-item {{ Request::segment(2) == 'orders'  ? 'active' : ''}}">
        <a href="{{route('orders.index')}}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-shopping-cart"></i>
          <div data-i18n="Orders">Orders</div>
        </a>
      </li>
      <li class="menu-item {{ Request::segment(2) == 'afiliasi'  ? 'active' : ''}}">
        <a href="{{route('afiliasi.afiliasi')}}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-users"></i>
          <div data-i18n="Affiliasi">Affiliasi</div>
        </a>
      </li>
      @endrole


    </ul>
    
  </aside>
  <!-- / Menu -->
  
    
  <!-- Layout container -->
  <div class="layout-page">

  <!-- Navbar -->
  <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
          <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="ti ti-menu-2 ti-sm"></i>
          </a>
        </div>
        
  
        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
  
          
          <!-- Search -->
          <div class="navbar-nav align-items-center">
            <div class="nav-item navbar-search-wrapper mb-0">
              <a class="nav-item nav-link search-toggler d-flex align-items-center px-0">
                Selamat datang, {{ Auth::user()->name }}!
              </a>
            </div>
          </div>
          <!-- /Search -->
          
          
  
          
  
          <ul class="navbar-nav flex-row align-items-center ms-auto">
          
  
            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
              <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                <div class="avatar avatar-online">
                  <img src="{{asset('images/avatar.png')}}" alt class="h-auto rounded-circle">
                </div>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <a class="dropdown-item" href="{{URL::to('profile')}}">
                    <div class="d-flex">
                      <div class="flex-shrink-0 me-3">
                        <div class="avatar avatar-online">
                          <img src="{{asset('images/avatar.png')}}" alt class="h-auto rounded-circle">
                        </div>
                      </div>
                      <div class="flex-grow-1">
                        <span class="fw-medium d-block">{{ Auth::user()->name}}</span>
                        <small class="text-muted">{{ Auth::user()->email}}</small>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <div class="dropdown-divider"></div>
                </li>
                <li>
                  <a class="dropdown-item" href="{{URL::to('profile')}}">
                    <i class="ti ti-user-check me-2 ti-sm"></i>
                    <span class="align-middle">My Profile</span>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" target="_blank">
                    <i class="ti ti-logout me-2 ti-sm"></i>
                    <span class="align-middle">Log Out</span>
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                    @csrf

                </form> 
                </li>
              </ul>
            </li>
            <!--/ User -->
            
  
  
          </ul>
        </div>
  
        
        <!-- Search Small Screens -->
        <div class="navbar-search-wrapper search-input-wrapper  d-none">
          <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..." aria-label="Search...">
          <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
        </div>
        
        
    
  </nav>
  <!-- / Navbar -->