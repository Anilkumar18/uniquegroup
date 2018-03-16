@extends('layouts.login')

@section('content')
<div class="login-holder">
  <h1 class="form-top text-center">Forget Password</h1>
  <div class="panel panel-default -no-radius-top" style="width: 20%;margin-left: 40%;">

    <div class="panel-body">
      <form role="form" method="POST" action="{{ url('/password/reset') }}">
        {{ csrf_field() }}

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
          <input id="email" placeholder="E-mail" type="email" class="form-control -nop" name="email" value="{{ $email or old('email') }}" required autofocus>

          @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
          <input id="password" type="password" placeholder="New password" class="form-control -nop" name="password" required>

          @if ($errors->has('password'))
              <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
          <input id="password-confirm" placeholder="New password confirmation" type="password" class="form-control -nop" name="password_confirmation" required>

          @if ($errors->has('password_confirmation'))
              <span class="help-block">
                  <strong>{{ $errors->first('password_confirmation') }}</strong>
              </span>
          @endif
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">
              Reset Password
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
