<?php

namespace App\Http\Controllers\admin;

use App\Models\DaftarLowonganPekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class DaftarLowonganPekerjaanController extends Controller
{
    public function index()
    {
        $lowongan = DaftarLowonganPekerjaan::all();
        return view('pageadmin.master_lowongan.index', compact('lowongan'));
    }

    public function create()
    {
        return view('pageadmin.master_lowongan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'nama_lowongan' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'persyaratan' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'gaji' => 'required|string|max:255',
            'tanggal_posting' => 'required|string|max:255',
            'tanggal_penutupan' => 'required|string|max:255',
            'email_perusahaan' => 'nullable|string|max:255',
            'whatsapp_perusahaan' => 'nullable|string|max:255',
            'website_perusahaan' => 'nullable|string|max:255',
            'logo_perusahaan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = [
            'nama_perusahaan' => $request->nama_perusahaan,
            'nama_lowongan' => $request->nama_lowongan,
            'deskripsi' => $request->deskripsi,
            'persyaratan' => $request->persyaratan,
            'lokasi' => $request->lokasi,
            'gaji' => $request->gaji,
            'tanggal_posting' => $request->tanggal_posting,
            'tanggal_penutupan' => $request->tanggal_penutupan,
            'email_perusahaan' => $request->email_perusahaan,
            'whatsapp_perusahaan' => $request->whatsapp_perusahaan,
            'website_perusahaan' => $request->website_perusahaan,
        ];

        if ($request->hasFile('logo_perusahaan')) {
            $file = $request->file('logo_perusahaan');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/logo_perusahaan'), $filename);
            $data['logo_perusahaan'] = $filename;
        }

        $lowongan = DaftarLowonganPekerjaan::create($data);

        Alert::toast('Lowongan Pekerjaan berhasil dibuat!', 'success')->position('top-end');
        return redirect()->route('master_lowongan.index');
    }

    public function edit($id)
    {
        $lowongan = DaftarLowonganPekerjaan::findOrFail($id);
        return view('pageadmin.master_lowongan.edit', compact('lowongan'));
    }

    public function update(Request $request, $id)
    {
        $lowongan = DaftarLowonganPekerjaan::findOrFail($id);

        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'nama_lowongan' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'persyaratan' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'gaji' => 'required|string|max:255',
            'tanggal_posting' => 'required|string|max:255',
            'tanggal_penutupan' => 'required|string|max:255',
            'email_perusahaan' => 'nullable|string|max:255',
            'whatsapp_perusahaan' => 'nullable|string|max:255',
            'website_perusahaan' => 'nullable|string|max:255',
            'logo_perusahaan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = [
            'nama_perusahaan' => $request->nama_perusahaan,
            'nama_lowongan' => $request->nama_lowongan,
            'deskripsi' => $request->deskripsi,
            'persyaratan' => $request->persyaratan,
            'lokasi' => $request->lokasi,
            'gaji' => $request->gaji,
            'tanggal_posting' => $request->tanggal_posting,
            'tanggal_penutupan' => $request->tanggal_penutupan,
            'email_perusahaan' => $request->email_perusahaan,
            'whatsapp_perusahaan' => $request->whatsapp_perusahaan,
            'website_perusahaan' => $request->website_perusahaan,
        ];

        if ($request->hasFile('logo_perusahaan')) {
            // Hapus file lama jika ada
            if ($lowongan->logo_perusahaan) {
                $oldFilePath = public_path('uploads/logo_perusahaan/' . $lowongan->logo_perusahaan);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            $file = $request->file('logo_perusahaan');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/logo_perusahaan'), $filename);
            $data['logo_perusahaan'] = $filename;
        }

        $lowongan->update($data);

        Alert::toast('Lowongan Pekerjaan berhasil diubah!', 'success')->position('top-end');
        return redirect()->route('master_lowongan.index');
    }

    public function destroy($id)
    {
        $lowongan = DaftarLowonganPekerjaan::findOrFail($id);
        
        // Hapus file logo jika ada
        if ($lowongan->logo_perusahaan) {
            $filePath = public_path('uploads/logo_perusahaan/' . $lowongan->logo_perusahaan);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        
        $lowongan->delete();
        Alert::toast('Lowongan Pekerjaan berhasil dihapus!', 'success')->position('top-end');
        return redirect()->route('master_lowongan.index');
    }
}
