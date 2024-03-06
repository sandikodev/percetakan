<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr" data-theme="theme-default" data-assets-path="{{asset('assets/')}}" data-template="vertical-menu-template">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php
    $nama_dan_logo       = App\Models\Website::first();
    @endphp

    <title>{{ $nama_dan_logo->nama_web }}</title>

    <meta name="description" content="Membership produk digital" />
    <meta name="keywords" content="membership, membership produk digital, jual produk digital, produk digital terlengkap">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('images/'.$nama_dan_logo->icon)}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/tabler-icons.css')}}"/>
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css')}}" />


    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css')}}" />
    
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/node-waves/node-waves.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead.css')}}" /> 
    <!-- Vendor -->
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/%40form-validation/umd/styles/index.min.css')}}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">

    <!-- Helpers -->
    <script src="{{asset('assets/vendor/js/helpers.js')}}"></script>
    <script src="{{asset('assets/vendor/js/template-customizer.js')}}"></script>
    <script src="{{asset('assets/js/config.js')}}"></script>
    
    
</head>

<body>

  <!-- Content -->

<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">
      <!-- Login -->
      <div class="card">
        <div class="card-body">

          <div class="col-12">
            @if(Session::has('warning'))
            <div class="alert alert-warning">
                {{session('warning')}}
            </div>
        @endif
        </div>

          <!-- Logo -->
          <div class="app-brand justify-content-center mb-4 mt-2">
            <a class="app-brand-link gap-2">
              <span class="app-brand-text demo text-body fw-bold ms-1">LOGIN</span>
            </a>
          </div>
          <!-- /Logo -->
          <form id="formAuthentication" class="mb-3"  method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
                <a href="{{URL::to('forgot-password')}}">
                  <small>Forgot Password?</small>
                </a>
              </div>
              <div class="input-group input-group-merge">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"/>
                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            </div>
            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember-me">
                  Remember Me
                </label>
              </div>
            </div>
            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
            </div>
          </form>

          <p class="text-center">
            <span>Belum memiliki akun?</span>
            <a href="{{route('register')}}">
              <span>DAFTAR</span>
            </a>
          </p>

        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
</div>

<!-- / Content -->

  
  <script src="{{asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/popper/popper.js')}}"></script>
  <script src="{{asset('assets/vendor/js/bootstrap.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/node-waves/node-waves.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/hammer/hammer.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/i18n/i18n.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
  <script src="{{asset('assets/vendor/js/menu.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/%40form-validation/umd/bundle/popular.min.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/%40form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
  <script src="{{asset('assets/vendor/libs/%40form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>
  <script src="{{asset('assets/js/main.js')}}"></script>
  <script src="{{asset('assets/js/pages-auth.js')}}"></script>
  
</body>

</html>


