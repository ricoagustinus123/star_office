@extends('admin.karyawan.base')

@section('action-content')
<div  style="width: 85vw">
    <div class="row">
        <div class="col-md-11 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif; color:rgb(34, 10, 10)">UPDATE KARYAWAN</h3>
                    </div>
                <div class="panel-body"> @foreach ($karyawans as $karyawan)
                    <form class="form-horizontal" role="form" method="post" action="{{route('proses.update')}}" enctype="multipart/form-data">
                
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" value="{{$karyawan->id}}">
                       
                    
                            
                      
                            <div class="col-md-4">
                                <label>Nama</label>
                                <input id="nama" type="text" class="form-control" name="nama" value="{{ $karyawan->nama }}" required autofocus placeholder="First Name">

                            </div>
                            <div class="col-md-4">
                                <label>NIK</label>

                                <input id="nik" type="text" class="form-control" name="nik" value="{{ $karyawan->nik }}" required placeholder="NIK">

                                @if ($errors->has('nik'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nik') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label>No NPWP</label>

                                <input id="no_npwp" type="text" class="form-control" name="no_npwp" value="{{ $karyawan->no_npwp }}" required placeholder="No NPWP">

                                @if ($errors->has('no_npwp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_npwp') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label for="no_bpjs_ketenagakerjaan">No BPJS Ketenagkerjaan:</label>
                                <input id="no_bpjs_ketenagakerjaan" type="text" class="form-control" name="no_bpjs_ketenagakerjaan"  required autofocus placeholder="No BPJS Ketenagakerjaan" value="{{$karyawan->no_bpjs_ketenagakerjaan}}">
                               
                        </div>
                        
                        <div class="col-md-4">
                            <label for="no_bpjs_kesehatan">No BPJS Kesehatan:</label>
                            <input id="no_bpjs_kesehatan" type="text" class="form-control" name="no_bpjs_kesehatan"  required autofocus placeholder="No BPJS Kesehatan" value="{{$karyawan->no_bpjs_kesehatan}}">
                           
                    </div>
                        
                        
                            <div class="col-md-4">
                                <label>Tanggal Lahir</label>
                                <input id="tanggal_lahir" type="date" class="form-control" name="tanggal_lahir" value="{{ $karyawan->tanggal_lahir }}" required>

                                @if ($errors->has('tanggal_lahir'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="col-md-4">
                            <label>Jenis Kelamin</label>
                            <select class="form-control js-country" name="jenis_kelamin">
                                <option value="-1" selected disabled>Jenis Kelamin</option>
                                <option value="pria" {{$karyawan->jenis_kelamin === "pria" ? 'selected':""}}>Pria</option>
                                <option value="wanita" {{$karyawan->jenis_kelamin === "wanita" ? 'selected':""}}>Wanita</option>
                                
                            </select>

                            @if ($errors->has('tanggal_lahir'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                                </span>
                            @endif
                    </div>
                           

                           <div class="col-md-4">
                               <label>Wilayah</label>
                            <select class="form-control js-wilayah" name="wilayah_id">
                                @foreach ($wilayahs as $wilayah)
                                    <option {{$karyawan->wilayah_id == $wilayah->id ? 'selected' : ''}} value="{{$wilayah->id}}">{{$wilayah->wilayah}}</option>
                                @endforeach
                            </select>
                            </div>

                            <div class="col-md-4">
                                <label>Unit Kerja </label>
                                <select class="form-control js-units" name="unit_kerja_id">
                                    @foreach ($units as $unit)
                                        <option  {{$karyawan->unit_kerja_id == $unit->id ? 'selected' : ''}} value="{{$unit->id}}">{{$unit->unit_kerja}}</option>
                                    @endforeach
                                </select>
                        </div>
                       
  
                            <div class="col-md-4">
                                <label>Bidang Tugas</label>
                                <select class="form-control js-states" name="bidang_tugas">
                                    <option value="security" {{$karyawan->bidang_tugas === 'security' ? 'selected' : ''}} >security</option>
                                    <option value="driver" {{$karyawan->bidang_tugas === 'driver' ? 'selected' : ''}} >driver</option>
                                    <option value="office boy"{{$karyawan->bidang_tugas === 'office boy' ? 'selected' : ''}} >office boy</option>
                                    <option value="office girl" {{$karyawan->bidang_tugas === 'office girl' ? 'selected' : ''}} >office girl</option>
                                    <option value="cleaning service" {{$karyawan->bidang_tugas === 'cleaning service' ? 'selected' : ''}} >cleaning service</option>
                                    <option value="agendaris" {{$karyawan->bidang_tugas === 'agendaris' ? 'selected' : ''}} >agendaris</option>
                                    <option value="mechanical engineering" {{$karyawan->bidang_tugas === 'mechanical engineering' ? 'selected' : ''}} >mechanical engineering</option>
                                </select>
                                @if ($errors->has('bidang_tugas'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('bidang_tugas') }}</strong>
                                </span>
                            @endif
                        </div>

                        <br/><br/><br/>
                        <div class="col-md-4">
                            <label for="">Pendidikan Formal</label>
                            <select class="form-control js-states" name="pendidikan_formal">
                                <option value="S1"  selected disabled>Pilih Pendidikan</option>
                                <option value="S1" {{$karyawan->pendidikan_formal == 'S1' ? 'selected':''}} >Sarjana S1</option>
                                <option value="SMA" {{$karyawan->pendidikan_formal == 'SMA' ? 'selected':''}} >SMA</option>
                                <option value="SMK/STM" {{$karyawan->pendidikan_formal == 'SMK/STM' ? 'selected':''}} >SMK/STM</option>
                                <option value="SMP" {{$karyawan->pendidikan_formal == 'SMP' ? 'selected':''}} >SMP</option>
                                <option value="SD" {{$karyawan->pendidikan_formal == 'SD' ? 'selected':''}}>SD</option>
                            </select>
                                @if ($errors->has('pendidikan_formal'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('honor') }}</strong>
                                    </span>
                                @endif
                           
                    </div> 
                            <div class="col-md-4">
                                <label>Honor</label>
                                <input id="honor" type="number" class="form-control" name="honor" value="{{ $karyawan->honor }}" required>

                                @if ($errors->has('honor'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('honor') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label>No Rekening</label>
                                <input id="no_rekening" type="number" class="form-control" name="no_rekening" value="{{ $karyawan->no_rekening }}" required>

                                @if ($errors->has('no_rekening'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_rekening') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label>Nama Bank</label>
                                <select class="form-control js-states" name="nama_bank">
                                    <option value="-1" selected disabled>Nama Bank</option>
                                    <option value="mandiri" {{$karyawan->nama_bank === 'mandiri' ? 'selected' : ''}} >Mandiri</option>
                                    <option value="bca" {{$karyawan->nama_bank === 'bca' ? 'selected' : ''}} >BCA</option>
                                    <option value="bri"{{$karyawan->nama_bank === 'bri' ? 'selected' : ''}} >BRI</option>
                                    <option value="bni" {{$karyawan->nama_bank === 'bni' ? 'selected' : ''}} >BNI</option>
                                    <option value="cimb" {{$karyawan->nama_bank === 'cimb' ? 'selected' : ''}} >CIMB</option>
                                    
                                </select>
                                @if ($errors->has('nama_bank'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nama_bank') }}</strong>
                                </span>
                            @endif
                        </div>
                            <div class="col-md-4">
                              
                                    <label>No Telpon</label>
                                    <input type="number" value="{{ $karyawan->no_telp }}" name="no_telp" class="form-control pull-right" required>
                             
                        </div>

                            <div class="col-md-4">
                                    <label>Perjanjian Kerja</label>
                                    <select class="form-control js-states" name="perjanjian_kerja">
                                        <option value="-1" selected disabled>Perjanjian Kerja</option>
                                        <option value="mandiri" {{$karyawan->perjanjian_kerja === 'ada' ? 'selected' : ''}} >Ada kontrak</option>
                                        <option value="mandiri" {{$karyawan->perjanjian_kerja === 'tidak ada' ? 'selected' : ''}} >tidak ada kontrak</option>
        
                                        
                                    </select>
                                
                        </div>
                        <br><br><br>

                        <div class="col-md-4">
                                <label>Status Vaksin</label>
                                <select class="form-control js-states" name="vaksin">
                                    <option value="-1" selected disabled>Vaksin</option>
                                    <option value="sudah" {{$karyawan->vaksin === 'sudah' ? 'selected' : ''}} >sudah vaksin</option>
                                    <option value="belum" {{$karyawan->vaksin === 'belum' ? 'selected' : ''}} >belum vaksin</option>
    
                                    
                                </select>
                            
                    </div><div></div><div></div>
                        <div class="col-md-8">
                            <label>Alamat Domisili</label>
                            <textarea id="alamat_domisili" type="text" class="form-control" name="alamat_domisili" value="{{ $karyawan->alamat_domisili }}"  required>{{ $karyawan->alamat_domisili }}</textarea>

                            @if ($errors->has('alamat_domisili'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('alamat_domisili') }}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="col-md-8">
                        <label>Alamat KTP</label>
                    <textarea id="alamat_ktp" type="text" class="form-control" name="alamat_ktp"  required>{{ $karyawan->alamat_ktp }}</textarea>

                        @if ($errors->has('alamat_ktp'))
                            <span class="help-block">
                                <strong>{{ $errors->first('alamat_ktp') }}</strong>
                            </span>
                        @endif
                </div>
                <div class="col-md-8" style="margin-top:50px">
                    <label>foto ktp</label><div>
                    <img src="{{asset('uploads/'.substr($karyawan->foto_ktp,66))}}" width="300"/>
                    <input type="file" id="foto_ktp" name="foto_ktp" />
                </div>
                </div>
        
                <div class="col-md-8" style="margin-top:50px">
                    <label>foto karyawan</label>
                    <div>
                    <img src="{{asset('uploads/'.substr($karyawan->foto_karyawan,66))}}" width="300"/>
                    <input type="file" class="foto_karyawan" id="foto_karyawan" name="foto_karyawan" />
                </div>
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
