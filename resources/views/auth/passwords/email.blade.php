@extends('layouts.login')

@section('content')
<div class="login-holder">
    <h1 class="form-top text-center">Forget Password</h1>
    <div class="panel panel-default -no-radius-top">
      <div class="panel-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form role="form" method="POST" action="{{ url('/password/email') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                <input id="email" type="email" placeholder="E-Mail Address" class="form-control -nop" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">
                    Send Link
                </button>
            </div>
        </form>
      </div>
    </div>
</div>
@endsection
