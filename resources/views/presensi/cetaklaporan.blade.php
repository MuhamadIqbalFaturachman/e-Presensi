<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>A4</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>
    @page { 
        size: A4 
    }

    h3 {
        font-family:Arial, Helvetica, sans-serif;
        font-size:18px;
    }
  </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A4">

  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-10mm">

    <!-- Write HTML just like a web page -->
    <style>
    body {
      text-align: center;
    }
    h3 {
      display: inline-block;
    }
    table {
        text-align: left;
        margin-top: 30px;
        
    }
    td {
        padding: 5px;
    }
    .presensi {
        text-align: center;
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
    }
    .presensi tr th {
        border: 1px solid #000;
        padding: 8px;
    }
    .presensi tr td {
        font-size: 14px;
        border: 1px solid #000;
        padding: 6px;
    }
    </style>
    <h3>LAPORAN KEHADIRAN SISWA PKL</h3><br>
    <h3>PT.GALUNGGUNG ACCESS SOLUTION</h3>

    <table>
    <tr>
        <td rowspan="6">
            @php
                $path = Storage::url('uploads/magang/'.$siswa->foto);
            @endphp
            <img src="{{ url($path) }}" alt="" style="width: 110px;">
        </td>
    </tr>
    <tr>
        <td>NIM</td>
        <td>:</td>
        <td>{{ $siswa->nim }}</td>
    </tr>
    <tr>
        <td>Nama Siswa</td>
        <td>:</td>
        <td>{{ $siswa->nama_lengkap }}</td>
    </tr>
    <tr>
        <td>Bagian</td>
        <td>:</td>
        <td>{{ $siswa->bagian }}</td>
    </tr>
</table>
<table class="presensi">
    <tr>
        <th>No.</th>
        <th>Tanggal</th>
        <th>Jam Masuk</th>
        <th>Foto</th>
        <th>Jam Pulang</th>
        <th>Foto</th>
        <th>keterangan</th>
    </tr>
    @foreach ($presensi as $d)
    @php
        $path_in = Storage::url('uploads/'.$d->foto_in);
        $path_out = Storage::url('uploads/'.$d->foto_out);
    @endphp
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ date("d-m-Y",strtotime($d->tgl_presensi)) }}</td>
        <td>{{ $d->jam_in }}</td>
        <td>{{ $d->foto_in }}</td>
        <td>{{ $d->jam_out !== null ? $d->jam_out : 'Belum Absen' }}</td>
        <td>{{ $d->foto_out !== null ? $d->foto_out : 'Belum Absen' }}</td>
        <td>
            @if ($d->jam_in > '08:00')
            Terlambat
            @else
            Tepat waktu
            @endif
        </td>
    </tr>
    @endforeach
</table>


  </section>

</body>

</html>