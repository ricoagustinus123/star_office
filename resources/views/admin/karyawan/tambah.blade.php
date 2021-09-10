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
                                <label>Name:</label>
                                <input id="name" type="text" class="form-control" name="nama"  required autofocus placeholder="Budi">
                               
                        </div>

                        <div class="col-md-4">
                            <label for="nik">NIK:</label>
                            <input id="nik" type="text" class="form-control" name="nik"  placeholder="NIK">

                           
                    </div> 
                    <div class="col-md-4">
                        <label for="no_npwp">No NPWP:</label>
                        <input id="no_npwp" type="text" class="form-control" name="no_npwp"  placeholder="NIK">

                       
                </div>
                <br><br>
                <div class="col-md-4">
                    <label for="no_bpjs_ketenagakerjaan">No BPJS Ketenagkerjaan:</label>
                    <input id="no_bpjs_ketenagakerjaan" type="text" class="form-control" name="no_bpjs_ketenagakerjaan"  required autofocus placeholder="No BPJS Ketenagakerjaan">
                   
            </div>
            
            <div class="col-md-4">
                <label for="no_bpjs_kesehatan">No BPJS Kesehatan:</label>
                <input id="no_bpjs_kesehatan" type="text" class="form-control" name="no_bpjs_kesehatan"  required autofocus placeholder="No BPJS Kesehatan">
               
        </div>
                    <div class="col-md-4">
                        <label for="tanggal_lahir">tanggal lahir:</label>
                        <input id="tanggal_lahir" type="date" class="form-control" name="tanggal_lahir"  required autofocus placeholder="Tanggal_lahir">
                       
                </div>
                            <div class="col-md-4">
                                <label for="no_telp">No. Telp/Hp </label>
                                <input id="no_telp" type="text" class="form-control" name="no_telp"  required placeholder="No Handphone">

                               
                        </div>
                        <div class="col-md-4">
                            <label for="jenis_kelamin">Jenis Kelamin: </label>
                            <select class="form-control js-country" name="jenis_kelamin">
                                <option value="-1" selected disabled>Jenis Kelamin</option>
                                <option value="pria">Pria</option>
                                <option value="wanita">Wanita</option>
                                
                            </select>

                           
                    </div>
                           
                           
                            <div class="col-md-4">
                                <label for="Wilayah">wilayah kerja</label>
                                <select class="form-control js-country" name="wilayah_id">
                                    <option value="-1" selected disabled>Silahkan Pilih Wilayah</option>
                                    @foreach ($wilayahs as $wilayah)
                                        <option value="{{$wilayah->id}}"> {{$wilayah->wilayah}}</option>
                                        @endforeach
                                </select>
                        </div>
                            <div class="col-md-4">
                                <label for="unit_kerja">Unit Kerja</label>
                                <select class="form-control js-states" name="unit_kerja_id">
                                    <option value="-1" selected disabled>Silahkan Pilih Unit Kerja</option>
             
                                    @foreach ($units as $unit)
                                        <option value="{{$unit->id}}">{{$unit->unit_kerja}}</option>
                                    @endforeach
                                 
                            
                                </select>
                        </div>
                            <div class="col-md-4">
                                <label for="bidang_tugas">Bidang Tugas:</label>
                                <select class="form-control js-states" name="bidang_tugas">
                                    <option value="-1" >Pilih Bidang Tugas</option>
                                    <option value="security" >security</option>
                                    <option value="driver" >driver</option>
                                    <option value="office boy" >office boy</option>
                                    <option value="office girl" >office girl</option>
                                    <option value="cleaning service" >cleaning service</option>
                                    <option value="agendaris" >agendaris</option>
                                    <option value="mechanical engineering" >mechanical engineering</option>
                                </select>

                               
                        </div>
                        <br/><br/>
                        <div class="col-md-4">
                            <label for="">Pendidikan Formal:</label>
                            <select class="form-control js-states" name="pendidikan_formal">
                                <option value="S1" selected disabled>Pilih Pendidikan</option>
                                <option value="S1" >Sarjana S1</option>
                                <option value="SMA" >SMA</option>
                                <option value="SMK/STM" >SMK/STM</option>
                                <option value="SMP" >SMP</option>
                                <option value="SD" >SD</option>
                            </select>
                           
                    </div> 
                        <div class="col-md-4">
                            <label for="">Honor</label>
                                <input id="honor" type="number" class="form-control" name="honor"  required placeholder="Honor">
                               
                        </div><br/> <br/> <br/>
                        
                       
                            <div class="col-md-4">
                                <label for="">Perjanjian Kerja</label>
                                <select class="form-control js-country" name="perjanjian_kerja">
                                    <option value="-1" selected disabled>Perjanjian Kerja</option>
                                   
                                        <option value="ada">Ada Kontrak</option>
                                        <option value="tidak ada">Tidak Ada Kontrak</option>
                                   
                                </select>
                        </div>

                        <div class="col-md-4">
                            <label for="">Kontrak Ke:</label>
                            <input id="kontrak" type="number" class="form-control" name="kontrak"  required placeholder="Kontrok Ke">
                    </div>
                        
                        
                        <div class="col-md-4">
                            <label for="">vaksin:</label>
                            <select class="form-control js-country" name="vaksin">
                                <option value="-1" selected disabled>Vaksin</option>
                               
                                    <option value="sudah">sudah vaksin</option>
                                    <option value="belum">belum vaksin</option>
                               
                            </select>
                    </div>
                            
                    </div><br/> <br/> <br/>
                           
                      
                        <div class="col-md-12">
                            <label for="alamat_domisili">Alamat Domisili:</label>
                            <textarea id="alamat_domisili" type="text" class="form-control" name="alamat_domisili"  placeholder="alamat_domisili"></textarea>


                    </div>
                    <div class="col-md-12">
                        <label for="alamat_ktp">Alamat Sesuai KTP:</label>
                        <textarea id="alamat_ktp" type="text" class="form-control" name="alamat_ktp"  placeholder="alamat KTP"></textarea>


                </div>
                <div class="col-md-12">
                    <label for="">Upload Foto KTP:</label>
                    <input type="file" name="file_ktp" id="file_ktp">


            </div>
            <div class="col-md-12">
                <label for="file_karyawan">Upload Foto Karyawan:</label>
                <input type="file" name="file_karyawan" id="file_karyawan">


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