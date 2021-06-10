@extends('layouts.master')

@section('content')
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        @if(session()->get('success'))
          <div class="alert alert-success">
            {{ session()->get('success') }}  
          </div>
          <br />
        @endif
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">List Penanggung Jawab</h3>
            <div class="box-tools">
              <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                <a href="{{ route('pj.create')}}" class="btn btn-primary">Create</a>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr>
                <th>ID PJ</th>
                <th>ID User</th>
                <th>Nama</th>
                <th>Email</th>
                <th colspan="2">Action</th>
              </tr>
                @foreach($pj as $pj)
              <tr>
                <td>{{$pj->id_pj}}</td>
                <td>{{$pj->id_user}}</td>                
                <td>{{$pj->nama_pj}}</td>
                <td>{{$pj->email_pj}}</td>
                <td><a href="{{ route('pj.edit', $pj->id_pj)}}" class="btn btn-primary">Edit</a></td>
                <td>
                  <form action="{{ route('pj.destroy', $pj->id_pj)}}" method="post">
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