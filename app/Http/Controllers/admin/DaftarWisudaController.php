<?php

namespace App\Http\Controllers\admin;

use App\Models\DaftarWisuda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\MasterFakultas;
use App\Models\MasterProdi;
use Illuminate\Routing\Controller;

class DaftarWisudaController extends Controller
{
   

    public function getProgramStudi($fakultas_kode)
    {
        $programStudi = MasterProdi::where('fakultas_kode', $fakultas_kode)->get();
        return response()->json($programStudi);
    }
    
    
    public function index(Request $request)
    {
        $tahun = $request->input('tahun_wisuda', date('Y')); // Default ke tahun sekarang jika tidak ada filter
        
        $daftarWisuda = DaftarWisuda::where('tahun_wisuda', $tahun)
            ->orderBy('id', 'asc')
            ->with('fakultas', 'programStudi')
            ->get();

        return view('pageadmin.daftar_wisuda.index', compact('daftarWisuda', 'tahun'));
    }

    public function create()
    {
        $fakultas = MasterFakultas::orderBy('kode_fakultas', 'asc')->get();
        $programStudi = MasterProdi::orderBy('kode_prodi', 'asc')->get();
        return view('pageadmin.daftar_wisuda.create', compact('fakultas', 'programStudi'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'npm' => 'required|string|max:255|unique:daftar_wisudas,npm',
                'tanggal_lulus' => 'required|date',
                'bulan_wisuda' => 'required|string|max:255',
                'tahun_wisuda' => 'required|string|max:255',
                'fakultas_kode' => 'required|string|max:255',
                'program_studi_kode' => 'required|string|max:255',
            ]);



            $daftarWisuda = DaftarWisuda::create([
                'nama' => $request->nama,
                'npm' => $request->npm,
                'tanggal_lulus' => $request->tanggal_lulus,
                'bulan_wisuda' => $request->bulan_wisuda,
                'tahun_wisuda' => $request->tahun_wisuda,
                'fakultas_kode' => $request->fakultas_kode,
                'program_studi_kode' => $request->program_studi_kode,
                'pin_akses' => str_pad(rand(0, 99999999), 8, '0', STR_PAD_LEFT),
            ]);

            Alert::toast('Daftar Wisuda successfully created!', 'success')->position('top-end');
            return redirect()->route('daftar_wisuda.index');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Alert::toast('Sepertinya ada kesalahan!', 'error')->position('top-end');
            return back()->withErrors($e->errors())->withInput();
        }
    }

    public function edit($id)
    {
        $daftarWisuda = DaftarWisuda::findOrFail($id);
        $fakultas = MasterFakultas::orderBy('kode_fakultas', 'asc')->get();
        $programStudi = MasterProdi::orderBy('kode_prodi', 'asc')->get();
        return view('pageadmin.daftar_wisuda.edit', compact('daftarWisuda', 'fakultas', 'programStudi'));
    }

    public function update(Request $request, $id)
    {
        try {
            $daftarWisuda = DaftarWisuda::findOrFail($id);

            $request->validate([
                'nama' => 'required|string|max:255',
                'npm' => 'required|string|max:255|unique:daftar_wisudas,npm,' . $id,
                'tanggal_lulus' => 'required|date',
                'bulan_wisuda' => 'required|string|max:255',
                'tahun_wisuda' => 'required|string|max:255',
                'fakultas_kode' => 'required|string|max:255',
                'program_studi_kode' => 'required|string|max:255',
            ]);

            $daftarWisuda->update([
                'nama' => $request->nama,
                'npm' => $request->npm,
                'tanggal_lulus' => $request->tanggal_lulus,
                'bulan_wisuda' => $request->bulan_wisuda,
                'tahun_wisuda' => $request->tahun_wisuda,
                'fakultas_kode' => $request->fakultas_kode,
                'program_studi_kode' => $request->program_studi_kode,
                'pin_akses' => str_pad(rand(0, 99999999), 8, '0', STR_PAD_LEFT),
            ]);

            Alert::toast('Daftar Wisuda successfully updated!', 'success')->position('top-end');
            return redirect()->route('daftar_wisuda.index');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Alert::toast('Sepertinya ada kesalahan!', 'error')->position('top-end');
            return back()->withErrors($e->errors())->withInput();
        }
    }

    public function destroy($id)
    {
        $daftarWisuda = DaftarWisuda::findOrFail($id);

        $daftarWisuda->delete();

        Alert::toast('Daftar Wisuda successfully deleted!', 'success')->position('top-end');
        return redirect()->route('daftar_wisuda.index');
    }
}
