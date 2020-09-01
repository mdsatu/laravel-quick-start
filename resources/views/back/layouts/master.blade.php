<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{__('info.short_title')}} - @yield('title')</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="{{__('info.favicon')}}" type="image/x-icon" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <meta name="author" content="MD Satu" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <link href="{{asset('css/app.css')}}" rel="stylesheet">

  @yield('head')
</head>
<body class="hold-transition skin-blue sidebar-mini">

<form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
    @csrf
</form>

<div class="wrapper" id="app">
  <header class="main-header">

    <!-- Logo -->
    <a href="{{route('homepage')}}" target="_blank" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">{{__('info.short_title')}}</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">{{__('info.title')}}</span>
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
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{auth('back')->user()->image ? asset('uploads/admin/' . auth('back')->user()->image) : asset('img/user-img.png')}}" style="width:20px;">
              <span class="hidden-xs">{{Auth::user('admin')->Name()}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{auth('back')->user()->image ? asset('uploads/admin/' . auth('back')->user()->image) : asset('img/user-img.png')}}">

                <p>
                  {{Auth::user('admin')->Name()}}
                  <small>{{Auth::user('admin')->Name()}}</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{route('back.profile')}}" class="btn btn-default btn-flat">Profile</a>
                </div>

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
          <img src="{{auth('back')->user()->image ? asset('uploads/admin/' . auth('back')->user()->image) : asset('img/user-img.png')}}" class="img-circle" >
        </div>
        <div class="pull-left info">
          <p>{{Auth::user('admin')->Name()}}</p>
          <span>{{auth('back')->user()->title}}</span>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="{{(\Request::route()->getName() == 'back.dashboard') ? 'active' : ''}}">
          <a href="{{route('back.dashboard')}}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        @can('isAdmin')
        <li class="{{(\Request::route()->getName() == 'back.users.index') ? 'active' : ''}}">
          <a href="{{route('back.users.index')}}">
          <i class="fa fa-users"></i> <span>Users</span>
          </a>
        </li>
        <li class="treeview">
          <a href="{{route('back.info')}}">
            <i class="fa fa-gear"></i>
            <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ (\Request::route()->getName() == 'back.info') ? 'active' : '' }}">
              <a href="{{route('back.info')}}"><i class="fa fa-circle-o"></i> General Info</a>
            </li>
          </ul>
        </li>
        @endcan
        @can('isSuperAdmin')
        <li class="{{(\Request::route()->getName() == 'back.admins.index') ? 'active' : ''}}">
          <a href="{{route('back.admins.index')}}">
          <i class="fa fa-user-secret"></i> <span>Admins</span>
          </a>
        </li>
        @endcan
        <li class="{{(\Request::route()->getName() == 'back.profile') ? 'active' : ''}}">
          <a href="{{route('back.profile')}}">
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
        <li><a href="{{route('back.dashboard')}}"><i class="fa fa-dashboard"></i> {{__('info.short_title')}}</a></li>
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

        <!-- Custom Loader -->
        <div class="loader" style="display: none">
          <i class="fa fa-spinner fa-spin"></i>
        </div>

        @yield('master')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>{{__('info.copyright')}} | Developed by <a href="https://mdsatu.com">MD Satu</a>
  </footer>
</div>
<!-- ./wrapper -->

<script src="{{asset('js/app.js')}}"></script>

@yield('footer')
</body>
</html>
