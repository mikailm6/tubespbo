@extends('layouts.master')
@section('content')
<div class="content-wrapper">
   <section class="content">
      <div class="row">
         @if(session()->get('success'))
         <div class="alert alert-success">
            {{ session()->get('success') }}  
         </div>
         <br />
         @endif
         <div class="col-xs-12">
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">List Transaksi</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                     <tr>
                        <th>ID</th>
                        <th>Username Penyewa</th>
                        <th>Nama Jas</th>
                        <th>Warna Jas</th>
                        <th>Ukuran Jas</th>
                        <th>Harga/Hari</th>
                        <th>Hari Sewa</th>
                        <th>Total Harga</th>
                        <th>Tanggal Sewa</th>
                        <th>Nama PJ</th>
                        <th>Status Transaksi</th>
                        <th colspan="2">Action</th>
                     </tr>
                     @foreach($transaksi as $t)
                     <tr>
                        <td>{{$t->id_transaksi}}</td>
                        <td>{{$t->dari_user->username}}</td>
                        <td>{{$t->dari_jas->nama_jas}}</td>
                        <td>{{$t->dari_jas->warna_jas}}</td>
                        <td>{{$t->dari_jas->ukuran_jas}}</td>
                        <td>{{number_format($t->dari_jas->hargaPerHari, 2)}}</td>
                        <td>{{$t->jumlah_hari}}</td>
                        <td>{{number_format(($t->jumlah_hari * $t->dari_jas->hargaPerHari),2)}}</td>
                        <td>{{$t->tgl_sewa}}</td>
                        <td>{{$t->dari_pj->nama_pj}}</td>
                        @if($t->status_transaksi == 0)
                        <td><span class="badge bg-red">Belum Konfirmasi</span> </td>
                        @elseif($t->status_transaksi == 1)
                        <td><span class="badge bg-yellow">Sedang Proses</span> </td>
                        @elseif($t->status_transaksi == 2)
                        <td><span class="badge bg-green">Selesai</span> </td>
                        @endif
                        @if(Auth::user()->level != 1)
                        <td>
                           <a href="{{ route('transaksi.edit', $t->id_transaksi)}}" class="btn btn-primary">Edit</a>
                        </td>
                        @endif
                        <td>
                           <form action="{{ route('transaksi.destroy', $t->id_transaksi)}}" method="post">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-sm btn-danger" type="submit">Cancel</button>
                           </form>
                        </td>
                     </tr>
                     @endforeach
                  </table>
               </div>
               <!-- <div class="box-footer">
                 <a href="{{ route('transaksi.create')}}" class="btn btn-primary">Create</a>
               </div> -->
               <!-- /.box-body -->
            </div>
            <!-- /.box -->
         </div>
      </div>
   </section>
</div>
@endsection