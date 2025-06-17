<?php
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Laporan Data Alumni yang Wirausaha.xls"');
header('Cache-Control: max-age=0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
?>
<table style="font-family: 'Times New Roman', Times, serif; width: 100%; margin-bottom: 20px;">
    <tr>
        <td colspan="3" rowspan="5" style="font-size: 16px; font-weight: bold; text-align: center;">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ9xJm1mCrwmP1r0XKx5HcfhqDMFQh4xBegxg&s"  height="20px" width="20px">
        </td>
    </tr>
    <tr>
        <td colspan="8" style="font-size: 16px; font-weight: bold; text-align: center;">
            YAYASAN PERGURUAN TINGGI ISLAM KUANTAN SINGINGI
        </td>
    </tr>
    <tr>
        <td colspan="8" style="font-size: 16px; font-weight: bold; text-align: center;">
            UNIVERSITAS ISLAM KUANTAN SINGINGI
        </td>
    </tr>
    <tr>
        <td colspan="8" style="font-size: 16px; font-weight: bold; text-align: center;">
            Jl. Gatot Subroto KM 7 Teluk Kuantan Telp. 0760-561655 Fax. 0760-561655
        </td>
    </tr>
    
    <tr>
        <td colspan="8" style="font-size: 16px; font-weight: bold; text-align: center;">
            DATA DATA ALUMNI YANG WIRAUSAHA
        </td>
    </tr>
</table>
<hr style="border: 2px solid black;">
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
            <th style="width: 10%;">JENIS USAHA</th>
            <th style="width: 10%;">TAHUN MULAI</th>
            <th style="width: 10%;">JUMLAH KARYAWAN</th>
            <th style="width: 10%;">OMSET BULANAN</th>
            <th style="width: 10%;">TANTANGAN USAHA</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataPekerjaanAlumni as $tracer)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $tracer->dataAlumni->npm }}</td>
                <td>{{ $tracer->dataAlumni->nama }}</td>
                <td>{{ $tracer->dataAlumni->tempat_lahir }}</td>
                <td>{{ \Carbon\Carbon::parse($tracer->dataAlumni->tanggal_lahir)->isoFormat('D MMMM Y') }}</td>
                <td>{{ $tracer->dataAlumni->jenis_kelamin }}</td>
                <td>{{ $tracer->jenis_usaha }}</td>
                <td>{{ $tracer->tahun_mulai_usaha }}</td>
                <td>{{ $tracer->jumlah_karyawan }}</td>
                <td>Rp. {{ number_format($tracer->omset_bulanan, 0, ',', '.') }}</td>
                <td>{{ $tracer->tantangan_usaha }}</td>
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
        <td colspan="10"></td>
        <td colspan="3">
            DITETAPKAN DI : TELUK KUANTAN<br>
            PADA TANGGAL : {{ \Carbon\Carbon::now()->locale('id')->isoFormat('D MMMM Y') }}<br>
            REKTOR,<br><br><br>
            {{ $dataLaporan->nama_rektor }}<br>
            NIDN. {{ $dataLaporan->nidn_rektor }}
        </td>
    </tr>
</table>