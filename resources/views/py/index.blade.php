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
            <h3 class="box-title">List Penyewa</h3>
            <div class="box-tools">
              <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                <a href="{{ route('py.create')}}" class="btn btn-primary">Create</a>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr>
                <th>ID Penyewa</th>
                <th>ID User</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No Hp</th>
                <th>Email</th>
                <th colspan="2">Action</th>
              </tr>
                @foreach($py as $py)
              <tr>
                <td>{{$py->id_penyewa}}</td>
                <td>{{$py->id_user}}</td>
                <td>{{$py->nama_penyewa}}</td>
                <td>{{$py->alamat_penyewa}}</td>
                <td>{{$py->no_hp}}</td>
                <td>{{$py->email_penyewa}}</td>
                <td><a href="{{ route('py.edit', $py->id_penyewa)}}" class="btn btn-primary">Edit</a></td>
                <td>
                  <form action="{{ route('py.destroy', $py->id_penyewa)}}" method="post">
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