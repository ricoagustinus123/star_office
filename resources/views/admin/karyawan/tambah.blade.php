@extends('admin.karyawan.base')
@section('action-content')
  <!-- Modal -->
  
            <div class="panel panel-default" >
                <div class="panel-heading" style="overflow: hidden">
                    <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif; ">Tambah Karyawan</h5>
                </div>
                <div class="panel-body">
                    
            @if(Session::get('fail'))
            <div class="alert alert-danger">
                {{Session::get('fail')}}
            </div>
           

        @endif
                    {{-- <form class="form-horizontal" role="form" method="POST" action="{{ route('employee-management.store') }}" enctype="multipart/form-data"> --}}
                        <form class="form-horizontal" role="form" method="POST" action="{{route('proses.tambah')}}" enctype="multipart/form-data">
                       @csrf
                        
                        <div class="form-row">
                            <div class="col-md-4">
                                <input id="name" type="text" class="form-control" name="nama"  required autofocus placeholder="Name">
                               
                        </div>

                        <div class="col-md-4">
                            <input id="nik" type="text" class="form-control" name="nik"  placeholder="NIK">

                           
                    </div>
                    <div class="col-md-4">
                        <input id="tanggal_lahir" type="date" class="form-control" name="tanggal_lahir"  required autofocus placeholder="Tanggal_lahir">
                       
                </div>
                            <div class="col-md-4">
                                <input id="no_telp" type="text" class="form-control" name="no_telp"  required placeholder="No Handphone">

                               
                        </div>
                           
                            <br><br>
                            <div class="col-md-4">
                                <select class="form-control js-country" name="wilayah_id">
                                    <option value="-1" selected disabled>Silahkan Pilih Wilayah</option>
                                    @foreach ($wilayahs as $wilayah)
                                        <option value="{{$wilayah->id}}"> {{$wilayah->wilayah}}</option>
                                        @endforeach
                                </select>
                        </div>
                            <div class="col-md-4">
                                <select class="form-control js-states" name="unit_kerja_id">
                                    <option value="-1" selected disabled>Silahkan Pilih Unit Kerja</option>
             
                                    @foreach ($units as $unit)
                                        <option value="{{$unit->id}}">{{$unit->unit_kerja}}</option>
                                    @endforeach
                                 
                            
                                </select>
                        </div>
                            <div class="col-md-4">
                                <input id="bidang_tugas" type="text" class="form-control" name="bidang_tugas" required placeholder="Bidang Tugas">

                               
                        </div>
                        <br><br>
                            <div class="col-md-4">
                                <input id="honor" type="number" class="form-control" name="honor"  required placeholder="Honor">

                               
                        </div>
                        
                       
                            <div class="col-md-4">
                                <select class="form-control js-country" name="perjanjian_kerja">
                                    <option value="-1" selected disabled>Perjanjian Kerja</option>
                                   
                                        <option value="ada">Ada Kontrak</option>
                                        <option value="tidak ada">Tidak Ada Kontrak</option>
                                   
                                </select>
                        </div>
                        
                        <div class="col-md-4">
                            <select class="form-control js-country" name="vaksin">
                                <option value="-1" selected disabled>Vaksin</option>
                               
                                    <option value="sudah">sudah vaksin</option>
                                    <option value="belum">belum vaksin</option>
                               
                            </select>
                    </div>
                            
                    </div>
                           
                      
                        <div class="col-md-12">
                            <textarea id="alamat" type="text" class="form-control" name="alamat"  placeholder="Address"></textarea>


                    </div>
                    </div>
                </div>
           
        <div class="modal-footer">
          <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
      </div>
    </div>
  </div>

  @endsection