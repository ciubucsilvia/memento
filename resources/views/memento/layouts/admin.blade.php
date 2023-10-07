<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset(config('settings.theme')) }}/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset(config('settings.theme')) }}/admin/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="{{ asset(config('settings.theme')) }}/admin/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <link href="{{ asset(config('settings.theme')) }}/admin/mystyle.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
  <body class="skin-blue fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
      
      @yield('navigation')

      <!-- =============================================== -->
	
		<!-- Left side column. contains the sidebar -->
      @yield('sidebar')

      <!-- =============================================== -->

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            @yield('title')
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">

               @yield('alert')
                <!-- Default box -->
                <div class="box">
                  @yield('content')  
                </div><!-- /.box -->   

            </div>
          </div>
        </section><!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      @yield('footer')
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="{{ asset(config('settings.theme')) }}/admin/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <script src="{{ asset(config('settings.theme')) }}/admin/js/jquery-ui.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset(config('settings.theme')) }}/admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="{{ asset(config('settings.theme')) }}/admin/plugins/slimScroll/jquery.slimScroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="{{ asset(config('settings.theme')) }}/admin/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset(config('settings.theme')) }}/admin/dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="{{ asset(config('settings.theme')) }}/admin/dist/js/demo.js" type="text/javascript"></script> -->

    <script src="{{ asset(config('settings.theme')) }}/admin/js/ckeditor/ckeditor.js" type="text/javascript"></script>

    <script src="{{ asset(config('settings.theme')) }}/admin/js/myscripts.js"></script>
    <!-- <script src="{{ asset(config('settings.theme')) }}/js/myscrypts.js" type="text/javascript"></script>
 -->
  </body>
</html>
