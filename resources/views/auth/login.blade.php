@extends('layouts.app')

@section('content')

<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="{{ route('login') }}" method="post">
        @csrf
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="rowa">
        <div class="col-xs-8"></div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <!-- /.social-auth-links -->
    <a href="{{ url('/register') }}" class="text-center">Register a new account</a>

  </div>
  <!-- /.login-box-body -->
</div>
@endsection