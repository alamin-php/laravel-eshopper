<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title') | {{ config('app.name', 'NASSA') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Favicon  -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('backend/dist/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('backend/dist/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/dist/img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('backend/dist/img/favicon/site.webmanifest') }}">
  <!-- jQuery 3 -->
  <script src="{{ asset('backend/bower_components/jquery/dist/jquery.min.js') }}"></script>
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('backend/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('backend/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('backend/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('backend/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('backend/dist/css/skins/_all-skins.min.css') }}">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- Toastr Style -->
  <link rel="stylesheet" href="{{ asset('backend/dist/css/toastr.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/dist/css/custom.css') }}">
  @stack('styles')
</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">


    <!-- TOP Header -->
    @include('layouts.backend.partials.header')

    <!-- Left side column. contains the sidebar -->
    @include('layouts.backend.partials.aside')
    
    <!-- Content Wrapper. Contains page content -->
    @yield('content')

    <!-- Left side column. contains the sidebar -->
    @include('layouts.backend.partials.footer')
    
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('backend/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('backend/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('backend/dist/js/demo.js') }}"></script>
<!-- Toaster JS -->
<script src="{{ asset('backend/dist/js/toastr.min.js') }}"></script>
{!! Toastr::message() !!}
<script src="{{ asset('backend/dist/js/sweetalert.min.js') }}"></script>
<script>  
        $(document).on("click", "#delete", function(e){
            e.preventDefault();
            var link = $(this).attr("href");
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    window.location.href = link;
                }
            })
        });
    </script>
@stack('scripts')
</body>
</html>
