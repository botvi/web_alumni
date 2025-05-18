<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\DaftarWisuda;
use App\Models\TracerStudiUniks;
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

    public function printdaftarwisuda()
    {
        $dataLaporan = DataLaporan::first();
        $daftarWisuda = DaftarWisuda::with('fakultas', 'programStudi')->get();
        return view('pageadmin.laporan.printdaftarwisuda', compact('daftarWisuda', 'dataLaporan'));
    }

    public function printdatapekerjaan()
    {
        $dataLaporan = DataLaporan::first();
        $tracerStudiUniks = TracerStudiUniks::with('programStudi')->get();
        return view('pageadmin.laporan.printdatapekerjaan', compact('tracerStudiUniks', 'dataLaporan'));
    }
}
