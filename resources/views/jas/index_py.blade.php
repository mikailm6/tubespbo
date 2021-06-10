@extends('layouts.master')

@section('content')
<div class="content-wrapper">
  <section class="content">
    
      <div class="row">
        @if(session()->get('success'))
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
          {{ session()->get('success') }}  
      </div>
      <br />
    @endif
        @foreach ($jas as $j)
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <div class="box">
            <center>
        <div class="box-header with-border">
          <h3 class="box-title">{{ $j->nama_jas }}</h3><br><br>
          <img width="95px" height="95px" src="/gambar/{{ $j->gambar }}">
        </div>
        </center>
        <div class="box-body">
          <p>Model      : {{ $j->model_jas }}</p>
          <p>Warna      : {{ $j->warna_jas }}</p>
          <p>Ukuran     : {{ $j->ukuran_jas }}</p>
          <p>Harga/hari : {{ $j->hargaPerHari }}</p>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <form action="{{ route('addTransaksi') }}" enctype="multipart/form-data" method="post">
            @csrf
            <input type="number" name="jumlah_hari" placeholder="Jumlah Hari Sewa" required>
            <input type="hidden" name="id_jas" value="{{ $j->id_jas }}"><br><br>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        <!-- /.box-footer-->
      </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        @endforeach
        <!-- /.col -->
    </div>
  </section>
</div>

@endsection