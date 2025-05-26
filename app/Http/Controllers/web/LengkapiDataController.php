<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Models\DaftarWisuda;
use App\Models\TracerStudiUniks;
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

        $user = DaftarWisuda::where('pin_akses', $request->pin_akses)
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
        $user = DaftarWisuda::where('pin_akses', $pin_akses)
            ->where('npm', $npm)
            ->with('fakultas')
            ->with('programStudi')
            ->first();
        if (!$user) {
            Alert::error('Error', 'PIN atau NPM tidak valid');
            return redirect()->back();
        }

        $tracer = TracerStudiUniks::where('npm', $npm)->first();

        return view('pageweb.lengkapi-data.index', [
            'user' => $user,
            'tracer' => $tracer
        ]);
    }

    public function simpan(Request $request)
    {
        $request->validate([
            // DAFTAR WISUDA
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date', 
            'nomor_seri_ijazah' => 'required|string|max:255',
            'nomor_seri_transkrip' => 'required|string|max:255',
            'pisn' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
            // DAFTAR WISUDA
            // TRACERSTUDIUNIKS
            'npm' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:255', 
            'nomor_telepon' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'tanggal_lulus' => 'required|date',
            'ipk' => 'required|numeric',
            'masa_studi' => 'required|numeric',
            'program_studi_kode' => 'required|string|max:255',
            'jenis_pekerjaan' => 'required|string|max:255',
            'tempat_bekerja' => 'required|string|max:255'
            // TRACERSTUDIUNIKS
        ]);

        // Update atau simpan data wisuda
        $wisuda = DaftarWisuda::where('npm', request('npm'))->first();


        if ($wisuda) {
            $wisuda->update([
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'nomor_seri_ijazah' => $request->nomor_seri_ijazah,
                'nomor_seri_transkrip' => $request->nomor_seri_transkrip,
                'pisn' => $request->pisn,
                'nik' => $request->nik
            ]);
        }

        // Update atau simpan data tracer studi
        $tracer = TracerStudiUniks::where('npm', request('npm'))->first();

        if ($tracer) {
            $tracer->update([
                'nama' => $request->nama,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'nomor_telepon' => $request->nomor_telepon,
                'email' => $request->email,
                'tanggal_lulus' => $request->tanggal_lulus,
                'ipk' => $request->ipk,
                'masa_studi' => $request->masa_studi,
                'program_studi_kode' => $request->program_studi_kode,
                'jenis_pekerjaan' => $request->jenis_pekerjaan,
                'tempat_bekerja' => $request->tempat_bekerja
            ]);
        } else {
            TracerStudiUniks::create([
                'npm' => $request->npm,
                'nama' => $request->nama,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'nomor_telepon' => $request->nomor_telepon,
                'email' => $request->email,
                'tanggal_lulus' => $request->tanggal_lulus,
                'ipk' => $request->ipk,
                'masa_studi' => $request->masa_studi,
                'program_studi_kode' => $request->program_studi_kode,
                'jenis_pekerjaan' => $request->jenis_pekerjaan,
                'tempat_bekerja' => $request->tempat_bekerja
            ]);
        }

        Alert::success('Sukses', 'Data berhasil disimpan');
        return redirect()->back();
    }
}
