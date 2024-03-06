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

      <meta name="description" content="Percetakan" />
      <meta name="keywords" content="website percetakan dibuat oleh bikinweeb.com, bikinweeb.com, source code percetakan php laravel, source code percetakan php laravel dibuat oleh bikinweeb.com">


      <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('percetakan/css/plugin.min.css') }}">
      <link rel="stylesheet" href="{{ asset('percetakan/style.css') }}">
      <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('percetakan/img/percetakan_logo.png') }}">
      <link rel="stylesheet" href="{{ asset('percetakan/css/line.min.css') }}">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
      
      <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

      <link rel="stylesheet" href="{{ asset('percetakan/sweetalert2/sweetalert2.css')}}" />
      <link rel="stylesheet" href="{{ asset('percetakan/select2/select2.css')}}" />

      @php
      $midtrans       = App\Models\Midtrans_setting::first();
      @endphp
  
      <script type="text/javascript" src="{{$midtrans->snap_url}}" data-client-key="{{$midtrans->client_key}}"></script>
      
      @notifyCss
  
      <style>
        .notify{
          top: 10%;
          z-index: 9999;
        }

        @media print {
          #button1 {
            display: none;
          }
          #button2 {
            display: none;
          }
          #pay-button {
            display: none;
          }
        }

      </style>

</head>