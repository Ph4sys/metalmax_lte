<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--link rel="stylesheet" type="text/css" media="screen" href="lib/main.css" /-->
    <link rel="stylesheet" href="{{ asset('lib/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/bower_components/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/bower_components/admin-lte/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/bower_components/admin-lte/dist/css/skins/_all-skins.min.css') }}">
    <!-- App CSS Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
    
    <div class="wrapper">
      <header class="main-header">
        @include('layouts._admin._nav')
      </header>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">


          <!-- Main content -->
          <section class="content">
            <main>
              @if(Session::has('mensagem'))
                <div class="container">
                  <div class="row">
                    <div class=" card {{ Session::get('mensagem')['class'] }}">
                      <button class="close" type="button" data-dismiss='alert' aria-hidden="true">x</button>
                      <div align="center">
                        {{ Session::get('mensagem')['msg'] }}
                      </div>
                    </div>
                  </div>
                </div>
              @endif
         
              @yield('content')
            </main>
          </section>
          <!-- /.content -->
        </div>
        <!-- /.container -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        @include('layouts._admin._footer')
      </footer>
    </div>
    <!-- ./wrapper -->
    
    <!-- REQUIRED JS SCRIPTS -->
    <!-- jQuery 3.2.1 -->
    <script src="{{ asset('lib/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('lib/jquery/dist/jquery.mask.min.js')}}"></script>
    <script src="{{ asset('lib/jquery/dist/mask.js')}}"></script>
    <script src="{{ asset('lib/jquery/dist/jquery.maskMoney.js')}}"></script> 
    <script src="{{ asset('js/functions.js')}}"></script>
     
    <!--script src="{{ asset ('lib/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset ('lib/bower_components/jquery/dist/jquery.mask.min.js') }}"></script>
    <script src="{{ asset ('lib/bower_components/jquery/dist/mask.min.js') }}"></script>
    <script src="{{ asset ('lib/bower_components/jquery/dist/maskMoney.js') }}"></script-->
    <script src="{{ asset ('lib/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset ('lib/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset ('lib/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset ('lib/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset ('lib/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <script src="{{ asset ('lib/bower_components/admin-lte/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset ('lib/bower_components/admin-lte/dist/js/demo.js') }}"></script>

</body>
</html>
