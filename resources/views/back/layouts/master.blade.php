<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{__('info.short_name')}} - @yield('title')</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="{{asset('img/favicon.png')}}" type="image/x-icon" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('back/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('back/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('back/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('back/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('back/dist/css/skins/_all-skins.min.css')}}">
  <link rel="stylesheet" href="{{asset('back/css/style.css')}}">

  @yield('head')

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">

<form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
    @csrf
</form>

<div class="wrapper">
  <header class="main-header">

    <!-- Logo -->
    <a href="{{route('homepage')}}" target="_blank" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">{{__('info.short_name')}}</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">{{__('info.short_name')}}</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('img/user-img.png')}}" style="width:20px;">
              <span class="hidden-xs">{{auth('admin')->user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset('img/user-img.png')}}">

                <p>
                  {{auth('admin')->user()->name}}
                  <small>{{auth('admin')->user()->name}}</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel" style="margin-bottom:15px;">
        <div class="pull-left image">
          <img src="{{asset('img/user-img.png')}}" class="img-circle" >
        </div>
        <div class="pull-left info">
          <p>{{auth('admin')->user()->name}}</p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="{{(\Request::route()->getName() == 'admin.dashboard') ? 'active' : ''}}">
          <a href="{{route('admin.dashboard')}}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="{{(\Request::route()->getName() == 'admin.admins') ? 'active' : ''}}">
          <a href="">
          <i class="fa fa-users"></i> <span>Users</span>
          </a>
        </li>
        <li class="{{(\Request::route()->getName() == 'admin.admins') ? 'active' : ''}}">
          <a href="{{route('admin.admins')}}">
          <i class="fa fa-user-secret"></i> <span>Admins</span>
          </a>
        </li>
        <li class="{{(\Request::route()->getName() == 'admin.profile') ? 'active' : ''}}">
          <a href="{{route('admin.profile')}}">
          <i class="fa fa-user"></i> <span>Profile</span>
          </a>
        </li>
        <li>
          <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="fa fa-sign-out"></i> <span>Logout</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('title')
        <!-- <small>Version 2.0</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> {{__('info.short_name')}}</a></li>
        <li class="active">@yield('title')</li>
      </ol>
    </section>

    <!-- Main content -->
  <section class="content">
        @if(isset($errors))
            @include('back.extra.error-validation')
        @endif
        @if(session('success'))
            @include('back.extra.success')
        @endif
        @if(session('error'))
            @include('back.extra.error')
        @endif

        <div class="loader" style="display: none">
          <i class="fa fa-spinner fa-spin"></i>
        </div>

        @yield('master')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright &copy; {{date('Y')}} | Developed by <a href="https://mdsatu.com">MD Satu</a>
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('back/js/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('back/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('back/js/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('back/dist/js/adminlte.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('back/js/jquery.sparkline.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('back/js/jquery.slimscroll.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('back/dist/js/pages/dashboard2.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('back/dist/js/demo.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.3.0/dist/sweetalert2.all.min.js"></script>
<script src="{{asset('back/js/main.js')}}"></script>

@yield('footer')
</body>
</html>