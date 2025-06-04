<?php

namespace App\Http\Controllers\admin;

use App\Models\DataAlumni;
use App\Models\DataPekerjaanAlumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\MasterFakultas;
use App\Models\MasterProdi;
use Illuminate\Routing\Controller;

class DataAlumniController extends Controller
{
   

    public function getProgramStudi($fakultas_kode)
    {
        $programStudi = MasterProdi::where('fakultas_kode', $fakultas_kode)->get();
        return response()->json($programStudi);
    }
    
    
    public function index(Request $request)
    {
        $tahun = $request->input('tahun_wisuda', date('Y')); // Default ke tahun sekarang jika tidak ada filter
        
        $dataAlumni = DataAlumni::where('tahun_wisuda', $tahun)
            ->orderBy('id', 'asc')
            ->with('fakultas', 'programStudi')
            ->get();

        return view('pageadmin.data_alumni.index', compact('dataAlumni', 'tahun'));
    }

    public function create()
    {
        $fakultas = MasterFakultas::orderBy('kode_fakultas', 'asc')->get();
        $programStudi = MasterProdi::orderBy('kode_prodi', 'asc')->get();
        return view('pageadmin.data_alumni.create', compact('fakultas', 'programStudi'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'jenis_kelamin' => 'required|string|max:255',
                'npm' => 'required|string|max:255|unique:data_alumnis,npm',
                'tempat_lahir' => 'required|string|max:255',
                'tanggal_lahir' => 'required|date',
                'tanggal_lulus' => 'required|date',
                'bulan_wisuda' => 'required|string|max:255',
                'tahun_wisuda' => 'required|string|max:255',
                'fakultas_kode' => 'required|string|max:255',
                'program_studi_kode' => 'required|string|max:255',
                'nomor_seri_ijazah' => 'required|string|max:255',
                'nomor_seri_transkrip' => 'required|string|max:255',
                'pisn' => 'required|string|max:255',
                'nik' => 'required|string|max:255|unique:data_alumnis,nik',
            ]);

            $dataAlumni = DataAlumni::create([
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'npm' => $request->npm,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'tanggal_lulus' => $request->tanggal_lulus,
                'bulan_wisuda' => $request->bulan_wisuda,
                'tahun_wisuda' => $request->tahun_wisuda,
                'fakultas_kode' => $request->fakultas_kode,
                'program_studi_kode' => $request->program_studi_kode,
                'nomor_seri_ijazah' => $request->nomor_seri_ijazah,
                'nomor_seri_transkrip' => $request->nomor_seri_transkrip,
                'pisn' => $request->pisn,
                'nik' => $request->nik,
                'pin_akses' => str_pad(rand(0, 99999999), 8, '0', STR_PAD_LEFT),
            ]);

            DataPekerjaanAlumni::create([
                'data_alumni_id' => $dataAlumni->id,
            ]);

            Alert::toast('Data Alumni berhasil ditambahkan!', 'success')->position('top-end');
            return redirect()->route('data_alumni.index');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Alert::toast('Terjadi kesalahan validasi!', 'error')->position('top-end');
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Alert::toast('Terjadi kesalahan sistem!', 'error')->position('top-end');
            return back()->withInput();
        }
    }

    public function edit($id)
    {
        $alumni = DataAlumni::findOrFail($id);
        $fakultas = MasterFakultas::orderBy('kode_fakultas', 'asc')->get();
        $programStudi = MasterProdi::where('fakultas_kode', $alumni->fakultas_kode)->get();
        
        return view('pageadmin.data_alumni.edit', compact('alumni', 'fakultas', 'programStudi'));
    }

    public function update(Request $request, $id)
    {
        try {
            $dataAlumni = DataAlumni::findOrFail($id);
            
            $request->validate([
                'nama' => 'required|string|max:255',
                'jenis_kelamin' => 'required|string|max:255',
                'npm' => 'required|string|max:255|unique:data_alumnis,npm,' . $id,
                'tempat_lahir' => 'required|string|max:255',
                'tanggal_lahir' => 'required|date',
                'tanggal_lulus' => 'required|date',
                'bulan_wisuda' => 'required|string|max:255',
                'tahun_wisuda' => 'required|string|max:255',
                'fakultas_kode' => 'required|string|max:255',
                'program_studi_kode' => 'required|string|max:255',
                'nomor_seri_ijazah' => 'required|string|max:255',
                'nomor_seri_transkrip' => 'required|string|max:255',
                'pisn' => 'required|string|max:255',
                'nik' => 'required|string|max:255|unique:data_alumnis,nik,' . $id,
            ]);

            $dataAlumni->update([
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'npm' => $request->npm,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'tanggal_lulus' => $request->tanggal_lulus,
                'bulan_wisuda' => $request->bulan_wisuda,
                'tahun_wisuda' => $request->tahun_wisuda,
                'fakultas_kode' => $request->fakultas_kode,
                'program_studi_kode' => $request->program_studi_kode,
                'nomor_seri_ijazah' => $request->nomor_seri_ijazah,
                'nomor_seri_transkrip' => $request->nomor_seri_transkrip,
                'pisn' => $request->pisn,
                'nik' => $request->nik,
            ]);

            Alert::toast('Data Alumni berhasil diperbarui!', 'success')->position('top-end');
            return redirect()->route('data_alumni.index');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Alert::toast('Terjadi kesalahan validasi!', 'error')->position('top-end');
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Alert::toast('Terjadi kesalahan sistem!', 'error')->position('top-end');
            return back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $dataAlumni = DataAlumni::findOrFail($id);
            
            // Hapus data pekerjaan alumni terkait
            DataPekerjaanAlumni::where('data_alumni_id', $id)->delete();
            
            // Hapus data alumni
            $dataAlumni->delete();

            Alert::toast('Data Alumni berhasil dihapus!', 'success')->position('top-end');
            return redirect()->route('data_alumni.index');
        } catch (\Exception $e) {
            Alert::toast('Terjadi kesalahan sistem!', 'error')->position('top-end');
            return back();
        }
    }
}
