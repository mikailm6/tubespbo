@extends('layouts.master')
@section('content')
<div class="content-wrapper">
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
            @if ($errors->any())
               <div class="alert alert-danger">
                  <ul>
            @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
            @endforeach
                  </ul>
               </div>
            @endif
               <br />
            <div class="box box-primary">
               <div class="box-header with-border">
                  <h3 class="box-title">Edit Penyewa</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" method="post" action="{{ route('py.update', $py->id_penyewa) }}" enctype="multipart/form-data">
                  @csrf
                  @method('PATCH')
                  <div class="box-body">
                     <div class="form-group">
                        <label for="name">Username:</label>
                        <input type="text" class="form-control" name="username" value="{{ $py->dari_user->username }}"/>
                     </div>
                     <div class="form-group">
                        <label for="name">Password:</label>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"/>
                     </div>
                     <div class="form-group">
                        <label for="name">Confirm Password:</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"/>
                     </div>
                     @if ($errors->has('password'))
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('password') }}</strong>
                     </span>
                     @endif
                     <div class="form-group">
                        <label for="price">Nama :</label>
                        <input type="text" class="form-control" name="nama_penyewa" value="{{ $py->nama_penyewa }}"/>
                     </div>
                     <div class="form-group">
                        <label for="quantity">Alamat :</label>
                        <input type="text" class="form-control" name="alamat_penyewa" value="{{ $py->alamat_penyewa }}"/>
                     </div>
                     <div class="form-group">
                        <label for="quantity">No Hp :</label>
                        <input type="text" class="form-control" name="no_hp" value="{{ $py->no_hp }}"/>
                     </div>
                     <div class="form-group">
                        <label for="price">Email :</label>
                        <input type="text" class="form-control" name="email_penyewa" value="{{ $py->email_penyewa }}"/>
                     </div>
                     <input type="hidden" name="id_user" value="{{ $py->id_user }}">
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </section>
</div>
@endsection