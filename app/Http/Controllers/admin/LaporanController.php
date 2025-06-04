<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\DataAlumni;
use App\Models\DataPekerjaanAlumni;
use App\Http\Controllers\Controller;
use App\Models\DataLaporan;
use RealRashid\SweetAlert\Facades\Alert;

class LaporanController extends Controller
{
    public function index()
    {
        $dataLaporan = DataLaporan::first();
        return view('pageadmin.laporan.index', compact('dataLaporan'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'lampiran_daftar_wisuda' => 'nullable|string|max:255',
            'lampiran_data_pekerjaan' => 'nullable|string|max:255', 
            'nomor_daftar_wisuda' => 'nullable|string|max:255',
            'nomor_data_pekerjaan' => 'nullable|string|max:255',
            'nama_rektor' => 'nullable|string|max:255',
            'nidn_rektor' => 'nullable|string|max:255',
        ]);

        $dataLaporan = DataLaporan::first();
        
        if (!$dataLaporan) {
            // Jika data belum ada, buat baru
            $dataLaporan = DataLaporan::create($request->all());
            Alert::success('Berhasil', 'Data berhasil ditambahkan');
        } else {
            // Jika data sudah ada, update
            $dataLaporan->update($request->all());
            Alert::success('Berhasil', 'Data berhasil diperbarui');
        }

        return redirect()->route('laporan.index');
    }

    public function printdataalumni()
    {
        $dataLaporan = DataLaporan::first();
        $dataAlumni = DataAlumni::with('fakultas', 'programStudi')->get();
        return view('pageadmin.laporan.printdataalumni', compact('dataAlumni', 'dataLaporan'));
    }

    public function printdataalumniyangbekerja()
    {
        $dataLaporan = DataLaporan::first();
        $dataPekerjaanAlumni = DataPekerjaanAlumni::with('dataAlumni')
            ->where('apakah_bekerja', 'Ya')
            ->get();
        return view('pageadmin.laporan.dataalumniyangbekerja', compact('dataPekerjaanAlumni', 'dataLaporan'));
    }
    public function printdataalumniyangtidakbekerja()
    {
        $dataLaporan = DataLaporan::first();
        $dataPekerjaanAlumni = DataPekerjaanAlumni::with('dataAlumni')
            ->where('apakah_bekerja', 'Tidak')
            ->get();
        return view('pageadmin.laporan.dataalumniyangtidakbekerja', compact('dataPekerjaanAlumni', 'dataLaporan'));
    }
    public function printdataalumniyangwirausaha()
    {
        $dataLaporan = DataLaporan::first();
        $dataPekerjaanAlumni = DataPekerjaanAlumni::with('dataAlumni')
            ->where('apakah_bekerja', 'Wirausaha')
            ->get();
        return view('pageadmin.laporan.dataalumniyangwirausaha', compact('dataPekerjaanAlumni', 'dataLaporan'));
    }
}
