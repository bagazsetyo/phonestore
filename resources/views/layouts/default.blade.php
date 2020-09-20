<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
        @stack('before-style')
        @include('includes.style')
        @stack('after-style')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
        @include('includes.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
       {{-- <livewire:sidebar></livewire:sidebar> --}}
       @include('includes.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
        @yield('content')
    <!-- /.content -->
  </div>

  <!-- /.control-sidebar -->
</div>

      @include('sweetalert::alert')
      
<!-- ./wrapper -->
         @stack('before-script')
        @include('includes.script')
        @stack('after-script')
</body>
</html>
