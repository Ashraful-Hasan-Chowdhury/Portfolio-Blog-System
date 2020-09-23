<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('mainTitle') Dashboard</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('public/js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> -->

    <!-- Styles -->
    <!-- <link href="{{ asset('public/css/app.css') }}" rel="stylesheet"> -->
    @include('admin/layouts/head')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper" >

      <!-- Navbar -->
      @include('admin/layouts/header')
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      @include('admin/layouts/sidebar')


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" id="app">
        <!-- /.content -->
        @yield('content')
      </div>
      <!-- /.content-wrapper -->
     @include('admin/layouts/footer')

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!--Toastr Notifier  -->
    <script src={{asset('public/admin/js/toastr.min.js')}}></script>
            <script>
              @if(Session::has('message'))
                var type = "{{ Session::get('alert-type', 'info') }}";
                switch(type){
                    case 'info':
                        toastr.info("{{ Session::get('message') }}");
                        break;

                    case 'warning':
                        toastr.warning("{{ Session::get('message') }}");
                        break;

                    case 'success':
                        toastr.success("{{ Session::get('message') }}");
                        break;

                    case 'error':
                        toastr.error("{{ Session::get('message') }}");
                        break;
                }
              @endif
            </script>
    <!--Toastr Notifier  -->
    <script src="{{asset('public/js/myscript.js')}}"></script>
<!-- jQuery -->
<script src="{{asset('public/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('public/admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('public/admin/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('public/admin/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('public/admin/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('public/admin/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('public/admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('public/admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('public/admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('public/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('public/admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('public/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('public/admin/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- table -->
<script src="{{asset('public/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('public/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/admin/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('public/admin/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/admin/dist/js/demo.js')}}"></script>
<script src={{asset('public/admin/js/sweetalert2.min.js')}}></script>
<script src={{asset('public/js/prism.js')}}></script>


</body>

</html>
