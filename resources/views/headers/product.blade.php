<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inbloom Group S.A.</title>
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/efectos.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/controles.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/default.css')}}">
  </head>
  <body>

  @include('implements.navigationbarproduct')

  @yield('body')

  </body>

  <script src="{{URL::asset('js/jquery-3.1.0.min.js')}}" charset="utf-8"></script>
  <script src="{{URL::asset('js/bootstrap.min.js')}}" charset="utf-8"></script>
  <script src="{{URL::asset('js/metodos.js')}}" charset="utf-8"></script>

  </html>

  @yield('modals')
