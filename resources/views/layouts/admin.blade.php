<!DOCTYPE html>
<html lang="en" class="perfect-scrollbar-on">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Lab Perancangan Mesin @yield('title')
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  <!-- CSS Files -->

  <link href="{{ asset('assets/css/material-dashboard.css?v=2.1.2') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">

   @include('include.script')
</head>

<body class="">
  @include('sweetalert::alert')

  <div class="wrapper ">

    <div class="sidebar" data-color="orange" data-background-color="black">
      @include('include.sidebar')
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      @include('include.navbar')
      <!-- End Navbar -->
      <div class="main-content">
        @yield('content')
      </div>
  
      <footer class="footer">
        <div class="container-fluid">
          <div class="copyright float-right">
            
          </div>
        </div>
      </footer>

    </div>
  </div>
 
  <?php if(Auth::User()->hak_akses == "User"): ?>
    <script>
      $(function(){
        $('.admin').addClass("nones");
      });
    </script>
  <?php endif; ?>
 <?php if(Auth::User()->hak_akses == "User"): ?>
    <script>
      $(function(){
        $('.btn-admin').addClass("none");
      });
    </script>
  <?php endif; ?>
</body>

</html>
