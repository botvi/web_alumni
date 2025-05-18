<?php
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Laporan Data Pekerjaan Alumni.xls"');
header('Cache-Control: max-age=0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
?>

<table style="font-family: 'Times New Roman', Times, serif;">
    <tr>
        <td colspan="10" style="font-size: 16px; font-weight: bold; font-family: 'Times New Roman', Times, serif;">
            LAMPIRAN : {{ $dataLaporan->lampiran_data_pekerjaan }}
        </td>
    </tr>
    <tr>
        <td colspan="10" style="font-size: 16px; font-weight: bold; font-family: 'Times New Roman', Times, serif;">
            NOMOR   : {{ $dataLaporan->nomor_data_pekerjaan }}
        </td>
    </tr>
    <tr>
        <td colspan="10" style="font-size: 16px; font-weight: bold; font-family: 'Times New Roman', Times, serif;">
            TANGGAL : {{ \Carbon\Carbon::now()->locale('id')->isoFormat('D MMMM Y') }}
        </td>
    </tr>
</table>
<br>
<br>

<table border="1" style="font-family: 'Times New Roman', Times, serif; width: 100%; table-layout: auto;">
    <thead>
        <tr>
            <th style="width: 5%;">NO</th>
            <th style="width: 10%;">NPM</th>
            <th style="width: 15%;">NAMA</th>
            <th style="width: 10%;">TEMPAT LAHIR</th>
            <th style="width: 10%;">TANGGAL LAHIR</th>
            <th style="width: 10%;">JENIS KELAMIN</th>
            <th style="width: 10%;">PROGRAM STUDI</th>
            <th style="width: 10%;">IPK</th>
            <th style="width: 10%;">JENIS PEKERJAAN</th>
            <th style="width: 10%;">TEMPAT BEKERJA</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tracerStudiUniks as $tracer)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $tracer->npm }}</td>
                <td>{{ $tracer->nama }}</td>
                <td>{{ $tracer->tempat_lahir }}</td>
                <td>{{ \Carbon\Carbon::parse($tracer->tanggal_lahir)->isoFormat('D MMMM Y') }}</td>
                <td>{{ $tracer->jenis_kelamin }}</td>
                <td>{{ $tracer->programStudi->nama_prodi }}</td>
                <td>{{ $tracer->ipk }}</td>
                <td>{{ $tracer->jenis_pekerjaan }}</td>
                <td>{{ $tracer->tempat_bekerja }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<br>
<br>
<br>
<br>
<br>
<br>

<table style="margin-top: 20px; font-family: 'Times New Roman', Times, serif;">
    <tr>
        <td colspan="7"></td>
        <td colspan="3">
            DITETAPKAN DI : TELUK KUANTAN<br>
            PADA TANGGAL : {{ \Carbon\Carbon::now()->locale('id')->isoFormat('D MMMM Y') }}<br>
            REKTOR,<br><br><br>
            {{ $dataLaporan->nama_rektor }}<br>
            NIDN. {{ $dataLaporan->nidn_rektor }}
        </td>
    </tr>
</table>