<?php

namespace App\Http\Controllers\admin;

use App\Models\KegiatanAlumni;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class KegiatanAlumniController extends Controller
{
    public function index()
    {
        $kegiatan = KegiatanAlumni::all();
        return view('pageadmin.kegiatan_alumni.index', compact('kegiatan'));
    }

    public function create()
    {
        return view('pageadmin.kegiatan_alumni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi_kegiatan' => 'required|string',
            'tempat' => 'required|string|max:255',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/kegiatan'), $filename);
        }

        $kegiatan = KegiatanAlumni::create([
            'gambar' => $filename,
            'deskripsi_kegiatan' => $request->deskripsi_kegiatan,
            'tempat' => $request->tempat,
        ]);

        Alert::success('Berhasil', 'Kegiatan alumni berhasil ditambahkan');
        return redirect()->route('kegiatan_alumni.index');
    }

    public function edit($id)
    {
        $kegiatan_alumni = KegiatanAlumni::findOrFail($id);
        return view('pageadmin.kegiatan_alumni.edit', compact('kegiatan_alumni'));
    }

    public function update(Request $request, $id)
    {
        $kegiatan = KegiatanAlumni::findOrFail($id);

        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deskripsi_kegiatan' => 'required|string',
            'tempat' => 'required|string|max:255',
        ]);

        $data = [
            'deskripsi_kegiatan' => $request->deskripsi_kegiatan,
            'tempat' => $request->tempat,
        ];

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($kegiatan->gambar && file_exists(public_path('uploads/kegiatan/' . $kegiatan->gambar))) {
                unlink(public_path('uploads/kegiatan/' . $kegiatan->gambar));
            }
            
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/kegiatan'), $filename);
            $data['gambar'] = $filename;
        }

        $kegiatan->update($data);

        Alert::success('Berhasil', 'Kegiatan alumni berhasil diubah');
        return redirect()->route('kegiatan_alumni.index');
    }

    public function destroy($id)
    {
        $kegiatan = KegiatanAlumni::findOrFail($id);
        $kegiatan->delete();

        Alert::success('Berhasil', 'Kegiatan alumni berhasil dihapus');
        return redirect()->route('kegiatan_alumni.index');
    }
    
}
