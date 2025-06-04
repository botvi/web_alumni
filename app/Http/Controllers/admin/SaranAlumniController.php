<?php

namespace App\Http\Controllers\admin;

use App\Models\SaranAlumni;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
class SaranAlumniController extends Controller
{
    public function index()
    {
        $saran = SaranAlumni::with('dataAlumni')->get();
        return view('pageadmin.saran_alumni.index', compact('saran'));
    }

    public function edit($id)
    {
        $saran = SaranAlumni::with('dataAlumni')->findOrFail($id);
        return view('pageadmin.saran_alumni.edit', compact('saran'));
    }

    public function berikanRespon(Request $request, $id)
    {
        $saran = SaranAlumni::findOrFail($id);
        $saran->update([
            'respon' => $request->respon,
        ]);
        Alert::success('Berhasil', 'Respon berhasil dikirim');
        return redirect()->route('saran_alumni.index');
    }

    public function destroy($id)
    {
        $saran = SaranAlumni::findOrFail($id);
        $saran->delete();
        Alert::success('Berhasil', 'Saran berhasil dihapus');
        return redirect()->route('saran_alumni.index');
    }
}
