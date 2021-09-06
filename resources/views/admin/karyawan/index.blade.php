@extends('admin.karyawan.base')
@section('action-content')
    <!-- Main content -->
    <head>
      <link href="{{asset('css/layout.css')}}" rel="stylesheet"/>
    </head>
    <section class="content">
      <div class="box" style="height: auto; padding:5px; overflow-x:hidden;>
  <div class="box-header">
    @include('admin.flash_message')
    <a href="{{url('admin/karyawan/tambah')}}" class="btn btn-info pull-right" data-toggle="modal" >
      <i class="fa fa-plus"></i> Tambah Karyawan
    </a>
  <!-- /.box-header -->
  <div class="box-body" style="overflow-x:scroll; width:80vw; height:100vh; overflow-y:scroll;  padding:0 5px;">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      {{-- <form method="POST" action="{{ route('employee-management.search') }}"> --}}
        <div>
          
        <form method="GET" action="{{route('search.karyawan')}}">
        @csrf
          <label>Search</label>
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          <input class="form-control" style="width: 30%" type="search" name="search"/>
          <button type="submit" class="btn btn-info">Search</button>
        </div>
        </form><br/>
    <div id="example2_wrapper"  class="dataTables_wrapper form-inline dt-bootstrap" style="width: 100%; margin:0 10px; ">
      <div class="row" style=" width:100%;  ">
        <div class="col-sm-12">
          <table  class="table table-bordered table-dark">
            <thead>
            
              <tr class="title-table">
                <th scope="col">Nama</th>
                <th scope="col">NIK</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Wilayah</th>
      
                <th scope="col">Unit Kerja</th>
                <th scope="col">Bidang Tugas</th>
                <th scope="col">Honor</th>
                <th scope="col">No Telpon</th>
                <th scope="col">Pendidikan</th></th>
                <th scope="col">Alamat</th>
                <th scope="col">Perjanjian Kerja</th>
                <th scope="col">Vaksin</th>
                <th scope="col">Action </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($karyawans as $karyawan)
             
                <tr role="row" class="odd" >
                  <td>{{$karyawan->nama }}</td> 
                  <td>{{ $karyawan->nik }}</td>
                  <td>{{ date('d-m-Y', strtotime($karyawan->tanggal_lahir)) }}</td>
                  @foreach ($wilayahs as $wilayah)
                  @if ($wilayah->id == $karyawan->wilayah_id)
                  <td>{{ $wilayah->wilayah }}</td>
                      
                  @endif
                  
                  @endforeach

                  @foreach($units as $unit)
                  @if ($unit->id == $karyawan->unit_kerja_id)
                  
                  <td style="width: 200px">
                    {{ $unit->unit_kerja }}</td>
                  @endif
                  @endforeach
                  <td>{{ $karyawan->bidang_tugas }}</td>
                  <td>{{ $karyawan->honor }}</td>
                  <td>{{ $karyawan->no_telp }}</td>
                  <td></td>
                  <td>{{ $karyawan->alamat }}</td>
                  <td>{{ $karyawan->perjanjian_kerja }}</td>
                  <td>{{ $karyawan->vaksin }}</td>
                  <td style="z-index:100; paddingZ:">
                
                      <form method="POST" action="{{route('delete.karyawan',['id' => $karyawan->id]) }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('edit.karyawan', ['id' => $karyawan->id]) }}" class="btn btn-info">
                          <i class="fa fa-edit "></i>
                        </a>
                        <a href="{{ route('cetak.karyawan', ['id' => $karyawan->id]) }}" class="btn btn-primary">
                          <i class="fa fa-print "></i>
                        </a>
                         <button type="submit" class="btn btn-danger">
                          <i class="fa fa-trash "></i>
                        </button>
                    </form>
                  </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
      
      <div class="d-flex justify-content-center">
            {!! $karyawans->appends(['sort' => 'science-stream'])->links() !!}
        </div>  
    </div>
  </div>
  <!-- /.box-body -->
</div>
    </section>
    <!-- /.content -->
  {{-- </div> --}}
@endsection