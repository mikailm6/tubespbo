@extends('layouts.app')

@section('content')

<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new account</p>

    <form action="{{ route('register') }}" method="post">
        @csrf
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group has-feedback">
        <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_penyewa">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="No Hp." name="no_hp">
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email_penyewa">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <textarea class="form-control" placeholder="Alamat Lengkap" name="alamat_penyewa"></textarea>
        <span class="glyphicon glyphicon-flag form-control-feedback"></span>
      </div>
      <input type="hidden" name="level" value="1">
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <a href="{{ url('/login') }}" class="text-center">I already have an account</a>
  </div>
  <!-- /.form-box -->
</div>
@endsection
