@extends('layouts.master')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Shows
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('transaksi.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Id Jas:</label>
              <input type="text" class="form-control" name="id_jas"/>
          </div>
          <div class="form-group">
              <label for="price">Id Penyewa :</label>
              <input type="text" class="form-control" name="id_user"/>
          </div>
          <div class="form-group">
              <label for="price">Id PJ :</label>
              <input type="text" class="form-control" name="id_pj"/>
          </div>
          <div class="form-group">
              <label for="price">Jumlah Hari :</label>
              <input type="text" class="form-control" name="jumlah_hari"/>
          </div>
          <div class="form-group">
              <label for="quantity">Tanggal Sewa :</label>
              <input type="date" class="form-control" name="tgl_sewa"/>
          </div>
          <button type="submit" class="btn btn-primary">Tambah Transaksi</button>
      </form>
  </div>
</div>
@endsection