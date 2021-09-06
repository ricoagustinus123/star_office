@extends('layouts.app-template')
@section('content')
  <div class="content-wrapper" style="overflow:hidden">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">
        MANAJEMEN KARYAWAN
      </h1>
      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">SIstem Manajemen Karyawan/li>
      </ol>
    </section>
    @yield('action-content')
    <!-- /.content -->
  </div>
@endsection