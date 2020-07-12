@extends('back.auth.master')

@section('master')
<p class="login-box-msg">{{ __('Reset Password') }}</p>

<form action="{{ route('back.password.request') }}" method="post">
  @csrf
  <input type="hidden" name="token" value="{{ $token }}">

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="form-group has-feedback">
    <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $email ?? old('email') }}" required readonly>
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>

    <div class="form-group has-feedback">
    <input type="password" name="password" class="form-control" placeholder="New Password" required>
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>

    <div class="form-group has-feedback">
    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
    @error('password_confirmation')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>

  <button type="submit" class="btn btn-primary btn-block btn-flat">Reset Password</button>
</form>
@endsection