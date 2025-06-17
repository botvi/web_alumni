<?php
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Laporan Data Alumni yang Tidak Bekerja.xls"');
header('Cache-Control: max-age=0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
?>
<table style="font-family: 'Times New Roman', Times, serif; width: 100%; margin-bottom: 20px;">
    <tr>
        <td colspan="2" rowspan="5" style="font-size: 16px; font-weight: bold; text-align: center; padding: 10px;">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ9xJm1mCrwmP1r0XKx5HcfhqDMFQh4xBegxg&s" height="80px" width="80px">
        </td>
    </tr>
    <tr>
        <td colspan="3" style="font-size: 18px; font-weight: bold; text-align: center; padding: 5px;">
            YAYASAN PERGURUAN TINGGI ISLAM KUANTAN SINGINGI
        </td>
    </tr>
    <tr>
        <td colspan="3" style="font-size: 18px; font-weight: bold; text-align: center; padding: 5px;">
            UNIVERSITAS ISLAM KUANTAN SINGINGI
        </td>
    </tr>
    <tr>
        <td colspan="3" style="font-size: 14px; text-align: center; padding: 5px;">
            Jl. Gatot Subroto KM 7 Teluk Kuantan Telp. 0760-561655 Fax. 0760-561655
        </td>
    </tr>
    <tr>
        <td colspan="3" style="font-size: 16px; font-weight: bold; text-align: center; padding: 10px;">
            DATA ALUMNI YANG TIDAK BEKERJA
        </td>
    </tr>
</table>

<hr style="border: 2px solid black; margin: 15px 0;">

<table style="font-family: 'Times New Roman', Times, serif; width: 100%; margin-bottom: 20px;">
    <tr>
        <td style="font-size: 14px; font-weight: bold; padding: 5px;">
            LAMPIRAN : {{ $dataLaporan->lampiran_data_pekerjaan }}
        </td>
    </tr>
    <tr>
        <td style="font-size: 14px; font-weight: bold; padding: 5px;">
            NOMOR   : {{ $dataLaporan->nomor_data_pekerjaan }}
        </td>
    </tr>
    <tr>
        <td style="font-size: 14px; font-weight: bold; padding: 5px;">
            TANGGAL : {{ \Carbon\Carbon::now()->locale('id')->isoFormat('D MMMM Y') }}
        </td>
    </tr>
</table>

<table border="1" style="font-family: 'Times New Roman', Times, serif; border-collapse: collapse; width: 100%;">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th style="width: 5%; padding: 10px; text-align: center; font-weight: bold;">NO</th>
            <th style="width: 10%; padding: 10px; text-align: center; font-weight: bold;">NPM</th>
            <th style="width: 15%; padding: 10px; text-align: center; font-weight: bold;">NAMA</th>
            <th style="width: 10%; padding: 10px; text-align: center; font-weight: bold;">TEMPAT LAHIR</th>
            <th style="width: 10%; padding: 10px; text-align: center; font-weight: bold;">TANGGAL LAHIR</th>
            <th style="width: 10%; padding: 10px; text-align: center; font-weight: bold;">JENIS KELAMIN</th>
            <th style="width: 20%; padding: 10px; text-align: center; font-weight: bold;">ALASAN BELUM BEKERJA</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataPekerjaanAlumni as $tracer)
            <tr>
                <td style="padding: 8px; text-align: center;">{{ $loop->iteration }}</td>
                <td style="padding: 8px;">{{ $tracer->dataAlumni->npm }}</td>
                <td style="padding: 8px;">{{ $tracer->dataAlumni->nama }}</td>
                <td style="padding: 8px;">{{ $tracer->dataAlumni->tempat_lahir }}</td>
                <td style="padding: 8px;">{{ \Carbon\Carbon::parse($tracer->dataAlumni->tanggal_lahir)->isoFormat('D MMMM Y') }}</td>
                <td style="padding: 8px;">{{ $tracer->dataAlumni->jenis_kelamin }}</td>
                <td style="padding: 8px;">{{ $tracer->alasan_belum_bekerja }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<br><br><br>

<table style="margin-top: 20px; font-family: 'Times New Roman', Times, serif;">
    <tr>
        <td colspan="5"></td>
        <td colspan="3">
            DITETAPKAN DI : TELUK KUANTAN<br>
            PADA TANGGAL : {{ \Carbon\Carbon::now()->locale('id')->isoFormat('D MMMM Y') }}<br>
            REKTOR,<br><br><br>
            {{ $dataLaporan->nama_rektor }}<br>
            NIDN. {{ $dataLaporan->nidn_rektor }}
        </td>
    </tr>
</table>

