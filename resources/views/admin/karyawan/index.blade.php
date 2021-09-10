@extends('admin.karyawan.base')
@section('action-content')
    <!-- Main content -->
    <head>
      <link href="{{asset('css/layout.css')}}" rel="stylesheet"/>
    </head>
    <section class="content">
      <div class="box" style="height: auto; padding:5px; overflow-x:hidden;  width="auto">
  <div class="box-header">
    @include('admin.flash_message')
    <a href="{{url('admin/karyawan/tambah')}}" class="btn btn-info pull-right" data-toggle="modal" >
      <i class="fa fa-plus"></i> Tambah Karyawan
    </a>
  <!-- /.box-header -->
  <div class="box-body" style=" width:80vw; height:100vh;  padding:0 5px;">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      {{-- <form method="POST" action="{{ route('employee-management.search') }}"> --}}
        <div>
          
        <form method="GET" action="{{route('search.karyawan')}}" style="position: sticky; left:0;top:0;">
        @csrf
          <label>Search</label>
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          <input class="form-control" style="width: 30%" type="search" name="search"/>
          <button type="submit" class="btn btn-info">Search</button>
        </div>
        </form><br/>
    <div id="example2_wrapper"  class="dataTables_wrapper form-inline dt-bootstrap" style="width: auto; margin:0 10px; ">
      <div class="row" style=" width:auto; overflow-x:scroll; margin-right:20px;   ">
        <div class="col-sm-12">
          <table  class="table table-bordered table-dark">
            <thead>
            
              <tr class="title-table" style=" width:auto;">
                <th  >Nama</th>
                <th  >NIK</th>
                <th  >No.NPWP</th>
                <th  >No.BPJS_ketenagkerjaan </th>
                <th  >No.BPJS_Kesehatan</th>
                <th  >Tanggal_Lahir</th>
                <th  >Wilayah</th>
                <th  >Unit_Kerja</th>
                <th  >Bidang_Tugas</th>
                <th  >Honor</th>
                <th  >No_Telpon</th>
                <th  >Pendidikan</th></th>
                <th  >Alamat_domisili</th>
                <th  >Alamat_KTP</th>
                <th  >Perjanjian_Kerja</th>
                <th  >Vaksin</th>
                <th  >Foto_KTP</th>
                <th  >Foto_Karyawan</th>
                <th  >Action </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($karyawans as $karyawan)
                <tr role="row" class="odd" >
                  <td>{{$karyawan->nama }}</td> 
                  <td>{{ $karyawan->nik }}</td>
                  <td>{{ $karyawan->no_npwp }}</td>
                  <td>{{ $karyawan->no_bpjs_ketenagakerjaan }}</td>
                  <td>{{ $karyawan->no_bpjs_kesehatan }}</td>
                  <td>{{ date('d-m-Y', strtotime($karyawan->tanggal_lahir)) }}</td>
                  @foreach ($wilayahs as $wilayah)
                  @if ($wilayah->id == $karyawan->wilayah_id)
                  <td>{{ $wilayah->wilayah }}</td>
                  @else
                 
                  @endif
                  
                  @endforeach
                  
                  @foreach($units as $unit)
                  @if ($unit->id == $karyawan->unit_kerja_id)
                  
                  <td style="width: 200px">
                    {{ $unit->unit_kerja }}</td>
                    @else
                   
                  @endif
                  @endforeach
                  <td>{{ $karyawan->bidang_tugas }}</td>
                  <td>{{ $karyawan->honor }}</td>
                  <td>{{ $karyawan->no_telp }}</td>
                  <td>{{$karyawan->pendidikan_formal}}</td>
                  <td>{{ $karyawan->alamat_domisili }}</td>
                  <td>{{ $karyawan->alamat_ktp }}</td>
                  <td>{{ $karyawan->perjanjian_kerja }}</td>
                  <td>{{ $karyawan->vaksin }}</td>
                  <td><img src="{{url('uploads/'.$karyawan->foto_karyawan)}}" alt="gagal"></td>
                  <td>{{ $karyawan->foto_ktp }}</td>
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