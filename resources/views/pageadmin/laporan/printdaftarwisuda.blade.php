<?php
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Laporan Daftar Alumni.xls"');
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
        <td colspan="10" style="font-size: 16px; font-weight: bold; text-align: center;">
            YAYASAN PERGURUAN TINGGI ISLAM KUANTAN SINGINGI
        </td>
    </tr>
    <tr>
        <td colspan="10" style="font-size: 16px; font-weight: bold; text-align: center;">
            UNIVERSITAS ISLAM KUANTAN SINGINGI
        </td>
    </tr>
    <tr>
        <td colspan="10" style="font-size: 16px; font-weight: bold; text-align: center;">
            Jl. Gatot Subroto KM 7 Teluk Kuantan Telp. 0760-561655 Fax. 0760-561655
        </td>
    </tr>
    
    <tr>
        <td colspan="10" style="font-size: 16px; font-weight: bold; text-align: center;">
            DATA DAFTAR ALUMNI
        </td>
    </tr>
</table>

<hr style="border: 2px solid black;">

<table style="font-family: 'Times New Roman', Times, serif;">
    <tr>
        <td colspan="13" style="font-size: 16px; font-weight: bold; font-family: 'Times New Roman', Times, serif;">
            LAMPIRAN : {{ $dataLaporan->lampiran_daftar_wisuda }}
        </td>
    </tr>
    <tr>
        <td colspan="13" style="font-size: 16px; font-weight: bold; font-family: 'Times New Roman', Times, serif;">
            NOMOR   : {{ $dataLaporan->nomor_daftar_wisuda }}
        </td>
    </tr>
    <tr>
        <td colspan="13" style="font-size: 16px; font-weight: bold; font-family: 'Times New Roman', Times, serif;">
            TANGGAL : {{ \Carbon\Carbon::parse($dataLaporan->tanggal_sk)->locale('id')->isoFormat('D MMMM Y') }}
        </td>
    </tr>
</table>
<br>
<br>

<table border="1" style="font-family: 'Times New Roman', Times, serif; width: 100%; table-layout: auto;">
    <thead>
        <tr>
            <th style="width: 3%;">NO</th>
            <th style="width: 8%;">TANGGAL LULUS</th>
            <th style="width: 12%;">FAKULTAS</th>
            <th style="width: 12%;">PROGRAM STUDI</th>
            <th style="width: 8%;">NOMOR SERI IJAZAH</th>
            <th style="width: 8%;">NOMOR SERI TRANSKRIP</th>
            <th style="width: 12%;">NAMA</th>
            <th style="width: 8%;">PROGRAM PENDIDIKAN</th>
            <th style="width: 15%;">AKREDITASI</th>
            <th style="width: 8%;">DEKAN</th>
            <th style="width: 5%;">GELAR AKADEMIK</th>
            <th style="width: 5%;">PISN</th>
            <th style="width: 4%;">NIK</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($daftarWisuda as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ \Carbon\Carbon::parse($p->tanggal_lulus)->isoFormat('D MMMM Y') }}</td>
                <td>{{ $p->fakultas->nama_fakultas }}</td>
                <td>{{ $p->programStudi->nama_prodi }}</td>
                <td>{{ $p->nomor_seri_ijazah }}</td>
                <td>{{ $p->nomor_seri_transkrip }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->programStudi->program_pendidikan }}</td>
                <td>{{ $p->programStudi->akreditasi }}</td>
                <td>{{ $p->fakultas->nama_dekan }}</td>
                <td>{{ $p->programStudi->gelar_akademik }}</td>
                <td style="mso-number-format:'\@'">{{ $p->pisn ?? '-' }}</td>
                <td style="mso-number-format:'\@'">{{ $p->nik ?? '-' }}</td>
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