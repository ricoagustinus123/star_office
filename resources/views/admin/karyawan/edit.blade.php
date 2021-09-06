@extends('admin.karyawan.base')

@section('action-content')
<div class="container" style="width: 85vw">
    <div class="row">
        <div class="col-md-11 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif; color:red">UPDATE KARYAWAN</h3>
                    </div>
                <div class="panel-body"> @foreach ($karyawans as $karyawan)
                    <form class="form-horizontal" role="form" method="post" action="{{route('proses.update')}}" enctype="multipart/form-data">
                
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                       
                    
                            
                      
                            <div class="col-md-4">
                                <label>nama</label>
                                <input id="nama" type="text" class="form-control" name="nama" value="{{ $karyawan->nama }}" required autofocus placeholder="First Name">

                            </div>
                            <div class="col-md-4">
                                <label>nik</label>

                                <input id="nik" type="text" class="form-control" name="nik" value="{{ $karyawan->nik }}" required placeholder="Middle Name">

                                @if ($errors->has('nik'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nik') }}</strong>
                                    </span>
                                @endif
                            </div>
                        
                            <div class="col-md-4">
                                <label>tanggal lahir</label>
                                <input id="tanggal_lahir" type="date" class="form-control" name="tanggal_lahir" value="{{ $karyawan->tanggal_lahir }}" required>

                                @if ($errors->has('tanggal_lahir'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                                    </span>
                                @endif
                        </div>
                           <br><br><br>

                           <div class="col-md-4">
                               <label>Wilayah</label>
                            <select class="form-control" name="wilayah_id">
                                @foreach ($wilayahs as $wilayah)
                                    <option {{$karyawan->wilayah_id == $wilayah->id ? 'selected' : ''}} value="{{$wilayah->id}}">{{$wilayah->wilayah}}</option>
                                @endforeach
                            </select>
                            </div>

                            <div class="col-md-4">
                                <label>unit kerja </label>
                                <select class="form-control" name="unit_kerja_id">
                                    @foreach ($units as $unit)
                                        <option {{$karyawan->unit_kerja_id == $unit->id ? 'selected' : ''}} value="{{$unit->id}}">{{$unit->unit_kerja}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <br/>
  
                            <div class="col-md-4">
                                <label>bidang tugas</label>
                                <input id="bidang_tugas" type="text" name="bidang_tugas" value="{{$karyawan->bidang_tugas}}"/>
                                
                                @if ($errors->has('bidang_tugas'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('bidang_tugas') }}</strong>
                                </span>
                            @endif
                        </div>

                        <br><br><br>
                            <div class="col-md-4">
                                <label>honor</label>
                                <input id="honor" type="number" class="form-control" name="honor" value="{{ $karyawan->honor }}" required>

                                @if ($errors->has('honor'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('honor') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4">
                              
                                    <label>no telpon</label>
                                    <input type="number" value="{{ $karyawan->no_telp }}" name="no_telp" class="form-control pull-right" id="birthDate" required>
                             
                        </div>

                            <div class="col-md-4">
                                    <label>perjanjian kerja</label>
                                    <input type="text" value="{{ $karyawan->perjanjian_kerja }}" name="perjanjian_kerja" class="form-control pull-right" id="hiredDate" required>
                                
                        </div>
                        <br><br><br>

                        <div class="col-md-4">
                                <label>Status Vaksin</label>
                                <input type="text" value="{{ $karyawan->vaksin }}" name="vaksin" class="form-control pull-right" id="hiredDate" required>
                            
                    </div>
                        <div class="col-md-8">
                            <label>Alamat</label>
                            <textarea id="alamat" type="text" class="form-control" name="alamat"  required>{{ $karyawan->alamat }}</textarea>

                            @if ($errors->has('alamat'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('alamat') }}</strong>
                                </span>
                            @endif
                    </div>
                    <br><br><br><br>
                        <div class="form-group pull-right">
                            <div class="col-md-6 ">
                                <button type="submit" class="btn btn-primary">
                                   <i class="fa fa-refresh"> Update karyawan</i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
