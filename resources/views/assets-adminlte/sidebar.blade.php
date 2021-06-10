<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/admin-lte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->username }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cart-plus"></i> <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('transaksi-penyewa') }}"><i class="fa fa-circle-o"></i> List Transaksi</a></li>
            @if(Auth::user()->level != 1)
            <li><a href="{{ route('transaksi-proses') }}"><i class="fa fa-circle-o"></i> List Transaksi Proses</a></li>
            <li><a href="{{ route('transaksi.create') }}"><i class="fa fa-circle-o"></i> Tambah Transaksi</a></li>
            @endif
            @if(Auth::user()->level == 3)
            <li><a href="{{ route('transaksi.index') }}"><i class="fa fa-circle-o"></i> Riwayat Transaksi</a></li>
            @endif
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-tags"></i> <span>Produk</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('produk-penyewa') }}"><i class="fa fa-circle-o"></i> List Produk</a></li>
            @if(Auth::user()->level != 1)
            <li><a href="{{ route('jas.index') }}"><i class="fa fa-circle-o"></i> Data Produk</a></li>
            <li><a href="{{ route('jas.create') }}"><i class="fa fa-circle-o"></i> Tambah Produk</a></li>
            @endif
          </ul>
        </li>
        @if(Auth::user()->level == 3)
        <li class="treeview">
          <a href="#">
            <i class="fa fa-group"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('py.index') }}"><i class="fa fa-circle-o"></i> List Penyewa</a></li>
            <li><a href="{{ route('pj.index') }}"><i class="fa fa-circle-o"></i> List Penanggung Jawab</a></li>
            <li><a href="{{ route('py.create') }}"><i class="fa fa-circle-o"></i> Tambah Penyewa</a></li>
            <li><a href="{{ route('pj.index') }}"><i class="fa fa-circle-o"></i> Tambah Penanggung Jawab</a></li>
          </ul>
        </li>
        @endif
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>