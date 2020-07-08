@extends('back.auth.master')

@section('master')
<p class="login-box-msg">Sign in to start your session</p>

    <form action="{{route('back.login')}}" method="post">
      @csrf
      @if(isset($errors))
          @include('back.extra.error-validation')
      @endif
      @if(session('success'))
          @include('back.extra.success')
      @endif
      @if(session('error'))
          @include('back.extra.error')
      @endif
      <div class="form-group has-feedback">
        <input type="text" name="email" class="form-control" placeholder="Email" value="{{old('email')}}" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="password" type="password" class="form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <p><a href="">Forgot your password?</a></p>

      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
@endsection