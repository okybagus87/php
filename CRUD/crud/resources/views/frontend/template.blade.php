<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AdminLTE 3 | Dashboard</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="AdminLTE-3.2.0/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="AdminLTE-3.2.0/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="AdminLTE-3.2.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="AdminLTE-3.2.0/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="AdminLTE-3.2.0/plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('master.navbar')
        @include('master.sidebar')
        <div class="content-wrapper">
            @yield('content')
        </div>
        @include('master.footer')
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
    <script src="AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
    <script src="AdminLTE-3.2.0/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="AdminLTE-3.2.0/plugins/chart.js/Chart.min.js"></script>
    <script src="AdminLTE-3.2.0/plugins/sparklines/sparkline.js"></script>
    <script src="AdminLTE-3.2.0/plugins/jquery-knob/jquery.knob.min.js"></script>
    <script src="AdminLTE-3.2.0/plugins/moment/moment.min.js"></script>
    <script src="AdminLTE-3.2.0/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="AdminLTE-3.2.0/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="AdminLTE-3.2.0/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="AdminLTE-3.2.0/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="AdminLTE-3.2.0/dist/js/adminlte.js"></script>
    <script src="AdminLTE-3.2.0/plugins/toastr/toastr.min.js"></script>
</body>

</html>
