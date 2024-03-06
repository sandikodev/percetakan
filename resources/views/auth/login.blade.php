<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
@php
$nama_dan_logo       = App\Models\Website::first();
@endphp

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>{{ $nama_dan_logo->nama_web }}</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('percetakan/css/plugin.min.css') }}">
<link rel="stylesheet" href="{{ asset('percetakan/style.css') }}">

<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('percetakan/img/'.$nama_dan_logo->icon) }}">

<link rel="stylesheet" href="{{ asset('percetakan/css/line.min.css') }}">
</head>
<body>
<main class="main-content">
    <div class="admin">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xxl-3 col-xl-4 col-md-6 col-sm-8">
                    <div class="edit-profile">
                    <div class="edit-profile__logos">
                        <a href="index.html">
                        <img class="dark" src="img/logo-dark.png" alt>
                        <img class="light" src="img/logo-white.png" alt>
                        </a>
                    </div>
                    <div class="card border-0">
                    <div class="card-header">
                        <div class="edit-profile__title">
                            <center>
                         <img src="{{ asset('percetakan/img/'.$nama_dan_logo->icon) }}" alt="source code website percetakan">
                          <h6> Silakan Masuk</h6>
                            </center>
                         
                    </div>
                    </div>
                    <div class="card-body">

                        <div class="col-12">
                            @if(Session::has('warning'))
                            <div class="alert alert-warning">
                                {{session('warning')}}
                            </div><br>
                        @endif
                        </div>


        <form id="formAuthentication" class="mb-3"  method="POST" action="{{ route('login') }}">
            @csrf
                    <div class="edit-profile__body">
                        <div class="form-group mb-25">
                            <label for="username">Email Address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                    <div class="form-group mb-15">
                        <label for="password-field">password</label>
                        <div class="position-relative">
                            <input id="password-field" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <div class="uil uil-eye-slash text-lighten fs-15 field-icon toggle-password2"></div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="admin-condition">
                        <div class="checkbox-theme-default custom-checkbox ">
                            <input class="checkbox" type="checkbox" id="check-1" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="check-1">
                            <span class="checkbox-text">Keep me logged in</span>
                            </label>
                        </div>
                        <a href="{{URL::to('forgot-password')}}">forget password?</a>
                    </div>
                    <div class="admin__button-group button-group d-flex pt-1 justify-content-md-start justify-content-center">
                        <button class="btn btn-primary btn-default w-100 btn-squared text-capitalize lh-normal px-50 signIn-createBtn ">
                        sign in
                        </button>
                    </div>
                    </div>
        </form>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<div id="overlayer">
    <div class="loader-overlay">
        <div class="dm-spin-dots spin-lg">
            <span class="spin-dot badge-dot dot-primary"></span>
            <span class="spin-dot badge-dot dot-primary"></span>
            <span class="spin-dot badge-dot dot-primary"></span>
            <span class="spin-dot badge-dot dot-primary"></span>
        </div>
    </div>
</div>

<script src="{{ asset('percetakan/js/plugins.min.js') }}"></script>
<script src="{{ asset('percetakan/js/script.min.js') }}"></script>

</body>
</html>