<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Karyawan</title>

    <style>
        .layout-document{
            width:100vw; 
            display:flex; 
            justify-content:center; 
            background-color:black;
        }
    </style>
</head>
<body>
    <a href="https://imgbb.com/">
        <img src="https://i.ibb.co/s90d7L5/Group-7.png" alt="Group-7" border="0"></a>
        <h2 style="margin-left:250px;">Daftar Riwayat Hidup</h2>
        {{ date('d-m-Y', strtotime($tanggal_lahir)) }}
        <br/>
        <h3>Data Pribadi</h3>
        <div  style="margin-left: 20px;">
            <table>
                <tr>
                    <td><h4>Nama</h4></td>
                    <td>: {{$nama}}</td>
                </tr>

                <tr>
                    <td><h4>NIK</h4></td>
                    <td>: {{$nik}}</td>
                </tr>
                <tr>
                    <td><h4>Tanggal Lahir</h4></td>
                    <td>: {{ date('d-m-Y', strtotime($tanggal_lahir)) }}</td>
                </tr>
                <tr>
                    <td><h4>No Telp</h4></td>
                    <td>: {{$no_telp}}</td>
                </tr>
                <tr>
                    <td><h4>Alamat</h4></td>
                    <td>: {{$alamat}}</td>
                </tr>
            </table>
           
        </div>
        <br/>
        <h3>Pendidikan</h3>
        <br/>
        <h3>Formal</h3>
        <h3>Non Formal</h3>

   
</body>
</html>