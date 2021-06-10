@extends('layouts.master')

@section('content')
<div class="content-wrapper">
  <section class="content">
    @if(session()->get('success'))
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
          {{ session()->get('success') }}  
      </div>
      <br />
    @endif
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">List Produk</h3>
            <div class="box-tools">
              <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                <a href="{{ route('jas.create')}}" class="btn btn-primary">Create</a>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr>
                <th>ID Jas</th>
                <th>Nama Jas</th>
                <th>Model Jas</th>
                <th>Warna Jas</th>
                <th>Ukuran Jas</th>
                <th>Harga Per Hari</th>
                <th>Gambar</th>
                <th colspan="2">Action</th>
              </tr>
                @foreach($jas as $j)
              <tr>
                <td>{{$j->id_jas}}</td>
                <td>{{$j->nama_jas}}</td>
                <td>{{$j->model_jas}}</td>
                <td>{{$j->warna_jas}}</td>
                <td>{{$j->ukuran_jas}}</td>
                <td>{{number_format($j->hargaPerHari,2)}}</td>
                <td><img width="50px" height="50px" src="/gambar/{{ $j->gambar }}"></td>
                <td><a href="{{ route('jas.edit', $j->id_jas)}}" class="btn btn-primary">Edit</a></td>
                <td>
                  <form action="{{ route('jas.destroy', $j->id_jas)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
                </td>
              </tr>
                @endforeach
              
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
  </section>
</div>

@endsection