<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name') }}</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="sidebar-mini layout-fixed accent-navy control-sidebar-slide-open">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-purple">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- SEARCH FORM 
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>-->

    
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 sidebar-dark-indigo">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link navbar-purple">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          <a class="brand-text font-weight-light" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
               <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-plus-square"></i>
                  <p>
                    Gestion Empleados
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('Empleados/create')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Crear Empleado</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('Empleados/')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Consultar Empleados</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('TipoRetiros/create')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Crear Motivo de Retiro</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('TipoRetiros/')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Consultar Motivos Retiro</p>
                    </a>
                  </li> 
                  <li class="nav-item">
                    <a href="{{url('TipoContratos/create')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Crear Tipos de Contrato</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('TipoContratos/')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Consultar Tipos de Contrato</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('TipoCargos/create')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Crear Cargos</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('TipoContratos/')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Consultar Cargos</p>
                    </a>
                  </li>                                             
                </ul>
              </li>  
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-chart-pie"></i>
                  <p>
                    Gestion Novedades
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('Novedades/create')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Crear Novedad</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('Novedades/')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Consultar Novedades</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('TipoNovedad/create')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Crear Tipo Novedad</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('TipoNovedad/')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Consultar Tipos de novedades</p>
                    </a>
                  </li>
                  
                </ul>
              </li>
         
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Gestion Horas Extras
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('HoraExtras/create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear Hora Extra</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('HoraExtras/')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Consultar Hora Extra</p>
                </a>
              </li>     
              <li class="nav-item">
                <a href="{{url('TipoHoras/create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear Tipo Hora Extra</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('TipoHoras/')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Consultar Tipo Hora Extra</p>
                </a>
              </li>
                       
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Gestion Tiendas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('Tiendas/create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear Tienda</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('Tiendas/')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Consultar Tiendas</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      @if (session('status'))
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="alert alert-success alert-dismissible text-center">
                                <button  class="close" data-dismiss="alert" aria-label="close">&times</button>
                            <strong> {{ session('status') }}</strong> 
                            </div>
                        </div>
                    </div>
                </div>
              @endif
              @if (session('info'))
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="alert alert-success alert-dismissible text-center">
                                <button  class="close" data-dismiss="alert" aria-label="close">&times</button>
                            <strong> {{ session('info') }}</strong> 
                            </div>
                        </div>
                    </div>
                </div>
              @endif
              @if (session('error'))
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="alert alert-danger alert-dismissible text-center">
                                <button  class="close" data-dismiss="alert" aria-label="close">&times</button>
                            <strong> {{ session('error') }}</strong> 
                            </div>
                        </div>
                    </div>
                </div>
              @endif
  
              @if (count($errors))
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="alert alert-danger alert-dismissable text-center ">
                            <button  class="close" data-dismiss="alert" aria-label="close">&times</button>

                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $error )
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            </div>
                        </div>
                    </div>
                </div>
              @endif
      <div class="container-fluid">


          
          @yield('content')

          {!! Html::script('js/jQuery-2.1.4.min.js')!!}
          {!! Html::script('js/dropdown.js')!!}
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Specialized Colombia</strong>    
    <div class="float-right d-none d-sm-inline-block">
      
    </div>
  </footer>

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
</body>
</html>