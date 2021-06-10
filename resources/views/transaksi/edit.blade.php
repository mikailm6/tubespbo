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
                  <h3 class="box-title">Edit Transaksi</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" method="post" action="{{ route('transaksi.update', $transaksi->id_transaksi) }}" enctype="multipart/form-data">
                  @csrf
                  @method('PATCH')
                  <div class="box-body">
                     <div class="form-group">
                        <label for="name">ID Jas:</label>
                        <input type="text" class="form-control" name="id_jas" value="{{ $transaksi->id_jas }}"/>
                     </div>
                     <div class="form-group">
                        <label for="price">ID Penyewa :</label>
                        <input type="text" class="form-control" name="id_user" value="{{ $transaksi->id_user }}"/>
                     </div>
                     <div class="form-group">
                        <label for="quantity">ID PJ :</label>
                        <input type="text" class="form-control" name="id_pj" value="{{ $pj_id[0]->id_pj }}" readonly=""/>
                     </div>
                     <div class="form-group">
                        <label for="quantity">Jumlah Hari</label>
                        <input type="number" class="form-control" name="jumlah_hari" value="{{ $transaksi->jumlah_hari }}"/>
                     </div>
                     <div class="form-group">
                        <label for="price">Tanggal Sewa :</label>
                        <input type="date" class="form-control" name="tgl_sewa" value="{{ $transaksi->tgl_sewa }}"/>
                     </div>
                     <div class="form-group">
                        <label for="price">Status Transaksi</label>
                        <select class="form-control" name="status_transaksi">
                           <option value="0">Belum Bayar</option>
                           <option value="1">Proses</option>
                           <option value="2">Selesai (Akan masuk ke riwayat dan tidak akan muncul di table list)</option>
                        </select>
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