<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Welcome to {{__('info.short_title')}}</title>

  <meta name="author" content="MD Satu" />

  <link rel="shortcut icon" href="{{__('info.favicon')}}" type="image/x-icon" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- Styles -->
  <link href="{{asset('back/css/app.css')}}" rel="stylesheet">
  <link href="{{asset('back/css/style.css')}}" rel="stylesheet">

  <link rel="icon" sizes="192x192" href="{{__('info.favicon')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{route('homepage')}}">Welcome to {{__('info.short_title')}}</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    @yield('master')

    <!-- <a href="#">I forgot my password</a><br> -->
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<div class="conterner copyright">
    <div class="text-center" style="margin-bottom: 25px;">
        <strong>{!! __('info.copyright') !!} | Developed by <a target="_blank" href="https://mdsatu.github.io">MD Satu</a></strong>
    </div>
</div>

<script src="{{asset('back/js/app.js')}}"></script>
</body>
</html>
