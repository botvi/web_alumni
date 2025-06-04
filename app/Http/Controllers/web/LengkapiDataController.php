<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Models\DataAlumni;
use App\Models\DataPekerjaanAlumni;
use App\Models\SaranAlumni;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
class LengkapiDataController extends Controller
{
    public function verifikasi(Request $request)
    {
        $request->validate([
            'pin_akses' => 'required|string|max:255',
            'npm' => 'required|string|max:255'
        ]);

        $user = DataAlumni::where('pin_akses', $request->pin_akses)
            ->where('npm', $request->npm)
            ->first();

        if ($user) {
            $pin_akses = $request->pin_akses;
            $npm = $request->npm;
            return redirect()->route('lengkapi-data.index', compact('pin_akses', 'npm'));
        }

        Alert::error('Error', 'PIN atau NPM tidak valid');
        return redirect()->back();
    }

    public function lengkapidata($pin_akses, $npm)
    {
        $user = DataAlumni::where('pin_akses', $pin_akses)
            ->where('npm', $npm)
            ->with('fakultas')
            ->with('programStudi')
            ->first();
        if (!$user) {
            Alert::error('Error', 'PIN atau NPM tidak valid');
            return redirect()->back();
        }

        $tracer = DataPekerjaanAlumni::where('data_alumni_id', $user->id)->first();
        $saran = SaranAlumni::where('data_alumni_id', $user->id)->get();
        return view('pageweb.lengkapi-data.index', [
            'user' => $user,
            'tracer' => $tracer,
            'saran' => $saran
        ]);
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'data_alumni_id' => 'required|string|max:255',
            'apakah_bekerja' => 'nullable|string|max:255',
            'nomor_telepon' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'alamat_saat_ini' => 'nullable|string|max:255',
            'nama_perusahaan' => 'nullable|string|max:255',
            'alamat_perusahaan' => 'nullable|string|max:255',
            'posisi_jabatan' => 'nullable|string|max:255',
            'status_pekerjaan' => 'nullable|string|max:255',
            'jenis_perusahaan' => 'nullable|string|max:255',
            'gaji' => 'nullable|string|max:255',
            'lama_mendapat_pekerjaan' => 'nullable|string|max:255',
            'sumber_informasi_lowongan' => 'nullable|string|max:255',
            'kesesuaian_bidang' => 'nullable|string|max:255',
            'alasan_belum_bekerja' => 'nullable|string|max:255',
            'menjalankan_usaha' => 'nullable|string|max:255',
            'jenis_usaha' => 'nullable|string|max:255',
            'tahun_mulai_usaha' => 'nullable|string|max:255',
            'jumlah_karyawan' => 'nullable|string|max:255',
            'omset_bulanan' => 'nullable|string|max:255',
            'tantangan_usaha' => 'nullable|string|max:255',
        ]);

        // Update atau simpan data tracer studi
        $tracer = DataPekerjaanAlumni::where('data_alumni_id', request('data_alumni_id'))->first();

        if ($tracer) {
            $tracer->update([
                'data_alumni_id' => $request->data_alumni_id,
                'apakah_bekerja' => $request->apakah_bekerja,
                'nomor_telepon' => $request->nomor_telepon,
                'email' => $request->email,
                'alamat_saat_ini' => $request->alamat_saat_ini,
                'nama_perusahaan' => $request->nama_perusahaan,
                'alamat_perusahaan' => $request->alamat_perusahaan,
                'posisi_jabatan' => $request->posisi_jabatan,
                'status_pekerjaan' => $request->status_pekerjaan,
                'jenis_perusahaan' => $request->jenis_perusahaan,
                'gaji' => $request->gaji,
                'lama_mendapat_pekerjaan' => $request->lama_mendapat_pekerjaan,
                'sumber_informasi_lowongan' => $request->sumber_informasi_lowongan,
                'kesesuaian_bidang' => $request->kesesuaian_bidang,
                'alasan_belum_bekerja' => $request->alasan_belum_bekerja,
                'menjalankan_usaha' => $request->menjalankan_usaha,
                'jenis_usaha' => $request->jenis_usaha,
                'tahun_mulai_usaha' => $request->tahun_mulai_usaha,
                'jumlah_karyawan' => $request->jumlah_karyawan,
                'omset_bulanan' => $request->omset_bulanan,
                'tantangan_usaha' => $request->tantangan_usaha
            ]);
        } else {
            DataPekerjaanAlumni::create([
                'data_alumni_id' => $request->data_alumni_id,
                'apakah_bekerja' => $request->apakah_bekerja,
                'nomor_telepon' => $request->nomor_telepon,
                'email' => $request->email,
                'alamat_saat_ini' => $request->alamat_saat_ini,
                'nama_perusahaan' => $request->nama_perusahaan,
                'alamat_perusahaan' => $request->alamat_perusahaan,
                'posisi_jabatan' => $request->posisi_jabatan,
                'status_pekerjaan' => $request->status_pekerjaan,
                'jenis_perusahaan' => $request->jenis_perusahaan,
                'gaji' => $request->gaji,
                'lama_mendapat_pekerjaan' => $request->lama_mendapat_pekerjaan,
                'sumber_informasi_lowongan' => $request->sumber_informasi_lowongan,
                'kesesuaian_bidang' => $request->kesesuaian_bidang,
                'alasan_belum_bekerja' => $request->alasan_belum_bekerja,
                'menjalankan_usaha' => $request->menjalankan_usaha,
                'jenis_usaha' => $request->jenis_usaha,
                'tahun_mulai_usaha' => $request->tahun_mulai_usaha,
                'jumlah_karyawan' => $request->jumlah_karyawan,
                'omset_bulanan' => $request->omset_bulanan,
                'tantangan_usaha' => $request->tantangan_usaha
            ]);
        }

        Alert::success('Sukses', 'Data berhasil disimpan');
        return redirect()->back();
    }

    public function saran(Request $request)
    {
        $request->validate([
            'data_alumni_id' => 'required|string|max:255',
            'saran' => 'required|string|max:255',
        ]);

        $sarana = SaranAlumni::create([
            'data_alumni_id' => $request->data_alumni_id,
            'saran' => $request->saran,
        ]);

        Alert::success('Sukses', 'Saran berhasil dikirim');
        return redirect()->back();
    }

   
}
