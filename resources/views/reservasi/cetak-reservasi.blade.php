<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <meta name="crsf-token" content="{{ crsf_token() }}"> --}}
    <style>
        table.static {
            position: relative;
            border: 1px solid #543535;
        }

    </style>
    <title> CETAK DATA RESERVASI</title>
</head>

<body>
    <div class="form-group">
        <h1 align="center">The Gym Company</h1>
        <p align="center"><b>Laporan Data Reservasi</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%">
            <tr>
                <th>No.</th>
                <th>Nama User</th>
                <th>Nama Gym</th>
                <th>Nama pelatih</th>
                <th>Tanggal Reservasi</th>
            </tr>
            @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->gym->nama_gym }}</td>
                <td>{{ $item->pelatih->nama_pelatih }}</td>
                <td>{{ $item->tanggal_reservasi }}</td>
            </tr>
            @endforeach
        </table>
</html>