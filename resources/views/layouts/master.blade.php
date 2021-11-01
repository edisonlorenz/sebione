<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SEBI One</title>

  <!-- STYLE -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
</head>
<body class="hold-transition sidebar-mini">
@auth
  @include('layouts.navbar')
  @include('layouts.sidebar')
  @endauth
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(Session::has('status'))
    <div class="alert alert-success">
      {{ Session::get('status')}}
    </div>
    @endif
    </div>
    <!-- Main content -->
    <div class="content">
       @yield('content')
    </div>
    <!-- /.content -->
  </div>


<!-- ./wrapper -->


<!-- jQuery -->
<script src="{{ asset('/js/app.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js" defer></script>

@yield('script')
</body>
</html>
