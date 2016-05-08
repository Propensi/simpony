<!DOCTYPE html>
    <!--
    This is a starter template page. Use this page to start your new project from
    scratch. This page gets rid of all links and provides the needed markup only.
    -->
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Simponi | Dashboard</title>
        <!-- Magnific Popup core CSS file -->
<link rel="stylesheet" href="magnific-popup/magnific-popup.css">

<!-- jQuery 1.7.2+ or Zepto.js 1.0+ -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<!-- Magnific Popup core JS file -->
<script src="magnific-popup/jquery.magnific-popup.js"></script>

        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="{{ asset("/bower_components/adminlte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="{{ asset("/bower_components/adminlte/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect.
        -->
        <link href="{{ asset("/bower_components/adminlte/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->


        <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
          
          <link rel="stylesheet" href="{{ asset("/bower_components/adminlte/dist/css/skins/_all-skins.min.css")}}">
  
          <!-- iCheck -->
          <link rel="stylesheet" href="{{ asset("/bower_components/adminlte/plugins/iCheck/flat/blue.css")}}">
          <!-- Morris chart -->
          <link rel="stylesheet" href="{{ asset("/bower_components/adminlte/plugins/morris/morris.css")}}">
          <!-- jvectormap -->
          <link rel="stylesheet" href="{{ asset("/bower_components/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.css")}}">
          <!-- Date Picker -->
          <link rel="stylesheet" href="{{ asset("/bower_components/adminlte/plugins/datepicker/datepicker3.css")}}">
          <!-- Daterange picker -->
          <link rel="stylesheet" href="{{ asset("/bower_components/adminlte/plugins/daterangepicker/daterangepicker-bs3.css")}}">
          <!-- bootstrap wysihtml5 - text editor -->
          <link rel="stylesheet" href="{{ asset("/bower_components/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css")}}">

    </head>
    <body class="skin-blue sidebar-mini">
    <div class="wrapper">

    <!-- Main Header -->

    <!-- Header -->
    @include('layouts.header')

    <!-- Sidebar -->
    @include('layouts.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="judul">
          @yield('titles')
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->


    @include('layouts.footer')
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.3 -->
    <script src="{{ asset ("/bower_components/adminlte/plugins/jQuery/jQuery-2.2.0.min.js") }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset ("/bower_components/adminlte/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset ("/bower_components/adminlte/dist/js/app.min.js") }}" type="text/javascript"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
          Both of these plugins are recommended to enhance the
          user experience -->
    </body>
</html>

