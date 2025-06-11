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
    private function validateTahunWisuda(Request $request)
    {
        return $request->validate([
            'tahun_wisuda' => 'required|integer|min:2000|max:' . (date('Y') + 1)
        ]);
    }

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

    public function printdataalumni(Request $request)
    {
        $this->validateTahunWisuda($request);
        $dataLaporan = DataLaporan::first();
        $tahun = $request->input('tahun_wisuda');
        
        $dataAlumni = DataAlumni::whereHas('fakultas', function($query) use ($tahun) {
            $query->where('tahun_wisuda', $tahun);
        })
            ->whereHas('programStudi', function($query) use ($tahun) {
                $query->where('tahun_wisuda', $tahun);
            })
            ->get();
            
        return view('pageadmin.laporan.printdataalumni', compact('dataAlumni', 'dataLaporan', 'tahun'));
    }

    public function downloaddataalumni(Request $request)
    {
        $this->validateTahunWisuda($request);
        $dataLaporan = DataLaporan::first();
        $tahun = $request->input('tahun_wisuda');
        
        $dataAlumni = DataAlumni::whereHas('fakultas', function($query) use ($tahun) {
            $query->where('tahun_wisuda', $tahun);
        })
            ->whereHas('programStudi', function($query) use ($tahun) {
                $query->where('tahun_wisuda', $tahun);
            })
            ->get();
            
        return view('pageadmin.laporan.excel.downloadataalumni', compact('dataAlumni', 'dataLaporan', 'tahun'));
    }

    public function printdataalumniyangbekerja(Request $request)
    {
        $this->validateTahunWisuda($request);
        $dataLaporan = DataLaporan::first();
        $tahun = $request->input('tahun_wisuda');
        
        $dataPekerjaanAlumni = DataPekerjaanAlumni::whereHas('dataAlumni', function($query) use ($tahun) {
            $query->where('tahun_wisuda', $tahun);
        })
            ->where('apakah_bekerja', 'Ya')
            ->get();
            
        return view('pageadmin.laporan.dataalumniyangbekerja', compact('dataPekerjaanAlumni', 'dataLaporan', 'tahun'));
    }

    public function downloaddataalumniyangbekerja(Request $request)
    {
        $this->validateTahunWisuda($request);
        $dataLaporan = DataLaporan::first();
        $tahun = $request->input('tahun_wisuda');
        
        $dataPekerjaanAlumni = DataPekerjaanAlumni::whereHas('dataAlumni', function($query) use ($tahun) {
            $query->where('tahun_wisuda', $tahun);
        })
            ->where('apakah_bekerja', 'Ya')
            ->get();
            
        return view('pageadmin.laporan.excel.downloaddataalumniyangbekerja', compact('dataPekerjaanAlumni', 'dataLaporan', 'tahun'));
    }

    public function printdataalumniyangtidakbekerja(Request $request)
    {
        $this->validateTahunWisuda($request);
        $dataLaporan = DataLaporan::first();
        $tahun = $request->input('tahun_wisuda');
        
        $dataPekerjaanAlumni = DataPekerjaanAlumni::whereHas('dataAlumni', function($query) use ($tahun) {
            $query->where('tahun_wisuda', $tahun);
        })
            ->where('apakah_bekerja', 'Tidak')
            ->get();
            
        return view('pageadmin.laporan.dataalumniyangtidakbekerja', compact('dataPekerjaanAlumni', 'dataLaporan', 'tahun'));
    }

    public function downloaddataalumniyangtidakbekerja(Request $request)
    {
        $this->validateTahunWisuda($request);
        $dataLaporan = DataLaporan::first();
        $tahun = $request->input('tahun_wisuda');
        
        $dataPekerjaanAlumni = DataPekerjaanAlumni::whereHas('dataAlumni', function($query) use ($tahun) {
            $query->where('tahun_wisuda', $tahun);
        })
            ->where('apakah_bekerja', 'Tidak')
            ->get();
            
        return view('pageadmin.laporan.excel.downloaddataalumniyangtidakbekerja', compact('dataPekerjaanAlumni', 'dataLaporan', 'tahun'));      
    }

    public function printdataalumniyangwirausaha(Request $request)
    {
        $this->validateTahunWisuda($request);
        $dataLaporan = DataLaporan::first();
        $tahun = $request->input('tahun_wisuda');
        
        $dataPekerjaanAlumni = DataPekerjaanAlumni::whereHas('dataAlumni', function($query) use ($tahun) {
            $query->where('tahun_wisuda', $tahun);
        })
        ->where('apakah_bekerja', 'Wirausaha')
        ->get();
            
        return view('pageadmin.laporan.dataalumniyangwirausaha', compact('dataPekerjaanAlumni', 'dataLaporan', 'tahun'));
    }

    public function downloaddataalumniyangwirausaha(Request $request)
    {
        $this->validateTahunWisuda($request);
        $dataLaporan = DataLaporan::first();
        $tahun = $request->input('tahun_wisuda');    
        
        $dataPekerjaanAlumni = DataPekerjaanAlumni::whereHas('dataAlumni', function($query) use ($tahun) {
            $query->where('tahun_wisuda', $tahun);
        })
            ->where('apakah_bekerja', 'Wirausaha')
            ->get();
            
        return view('pageadmin.laporan.excel.downloaddataalumniyangwirausaha', compact('dataPekerjaanAlumni', 'dataLaporan', 'tahun'));
    }
}
