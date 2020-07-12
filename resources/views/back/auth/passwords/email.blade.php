@extends('back.auth.master')

@section('master')
<p class="login-box-msg">{{ __('Reset Password') }}</p>

<form action="{{ route('back.password.email') }}" method="post">
  @csrf
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    
  <div class="form-group has-feedback">
    <input type="text" name="email" class="form-control" placeholder="Email" value="{{old('email')}}" required>
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>

  <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Send Password Reset Link') }}</button>
</form>
@endsection