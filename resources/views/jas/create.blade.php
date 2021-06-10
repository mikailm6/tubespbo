@extends('layouts.master')

@section('content')

<div class="content-wrapper">
   <section class="content">
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
      <div class="row">
         <div class="col-xs-12">
            <div class="box box-primary">
               <div class="box-header with-border">
                  <h3 class="box-title">Tambah Jas</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" method="post" action="{{ route('jas.store') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="box-body">
                     <div class="form-group">
                        <label for="exampleInputEmail1">Nama Jas</label>
                        <input type="text" class="form-control" placeholder="Nama Jas" name="nama_jas">
                     </div>
                     <div class="form-group">
                        <label for="exampleInputPassword1">Model Jas</label>
                        <input type="text" class="form-control" placeholder="Model Jas" name="model_jas">
                     </div>
                     <div class="form-group">
                        <label for="exampleInputPassword1">Warna Jas</label>
                        <input type="text" class="form-control" placeholder="Warna Jas" name="warna_jas">
                     </div>
                     <div class="form-group">
                        <label for="exampleInputPassword1">Ukuran Jas</label>
                        <input type="text" class="form-control" placeholder="Ukuran Jas" name="ukuran_jas">
                     </div>
                     <div class="form-group">
                        <label for="exampleInputPassword1">Harga Per hari Jas</label>
                        <input type="text" class="form-control" placeholder="Harga Jas" name="hargaPerHari">
                     </div>
                     <div class="form-group">
                        <label for="exampleInputFile">Gambar jas</label>
                        <input type="file" name="gambar">
                        <p class="help-block">Pastikan format file nya adalah format gambar (.jpg , .png, dll)</p>
                     </div>
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