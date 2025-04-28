<?php

namespace App\Http\Controllers\admin;

use App\Models\MasterProdi;
use App\Models\MasterFakultas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Routing\Controller;

class MasterProdiController extends Controller
{
    public function getProdi($prodi_kode)
    {
        $prodi = MasterProdi::where('kode_prodi', $prodi_kode)->get();
        return response()->json($prodi);
    }
    

    public function index()
    {
        $prodi = MasterProdi::with('fakultas')->orderBy('kode_prodi', 'asc')->get();
        return view('pageadmin.master_prodi.index', compact('prodi'));
    }

    public function create()
    {
        $fakultas = MasterFakultas::all();
        return view('pageadmin.master_prodi.create', compact('fakultas'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'kode_prodi' => 'required',
                'fakultas_kode' => 'required',
                'nama_prodi' => 'required|string|max:255',
                'akreditasi' => 'required|string|max:255',
                'program_pendidikan' => 'required|string|max:255',
                'gelar_akademik' => 'required|string|max:255',
            ]);

       

            $prodi = MasterProdi::create([
                'kode_prodi' => $request->kode_prodi, // Use the combined kode here
                'fakultas_kode' => $request->fakultas_kode,
                'nama_prodi' => $request->nama_prodi,
                'akreditasi' => $request->akreditasi,
                'program_pendidikan' => $request->program_pendidikan,
                'gelar_akademik' => $request->gelar_akademik,
                ]);

            Alert::toast('Prodi successfully created!', 'success')->position('top-end');
            return redirect()->route('master_prodi.index');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) { // MySQL error code for duplicate entry
                Alert::toast('Kode sudah ada, silakan gunakan kode lain!', 'error')->position('top-end');
                return back()->withInput();
            }
            throw $e;
        }
    }

    public function edit($id)
    {
        $fakultas = MasterFakultas::all();
        $prodi = MasterProdi::findOrFail($id);
        return view('pageadmin.master_prodi.edit', compact('prodi', 'fakultas'));
    }

    public function update(Request $request, $id)
    {
        try {
            $prodi = MasterProdi::findOrFail($id);

    

            // Validasi input
            $validationRules = [
                'kode_prodi' => 'required',
                'fakultas_kode' => 'required',
                'nama_prodi' => 'required|string|max:255',
                'akreditasi' => 'required|string|max:255',
                'program_pendidikan' => 'required|string|max:255',
                'gelar_akademik' => 'required|string|max:255',
            ];
            
            $request->validate($validationRules);
                
            $prodi->update([
                'kode_prodi' => $request->kode_prodi,
                'fakultas_kode' => $request->fakultas_kode,
                'nama_prodi' => $request->nama_prodi,
                'akreditasi' => $request->akreditasi,
                'program_pendidikan' => $request->program_pendidikan,
                'gelar_akademik' => $request->gelar_akademik,
            ]);
            

            Alert::toast('Prodi successfully updated!', 'success')->position('top-end');
            return redirect()->route('master_prodi.index');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) { // MySQL error code for duplicate entry
                Alert::toast('Kode sudah ada, silakan gunakan kode lain!', 'error')->position('top-end');
                return back()->withInput();
            }
            throw $e;
        }
    }

    public function destroy($id)
    {
        $prodi = MasterProdi::findOrFail($id);

        $prodi->delete();

        Alert::toast('Prodi successfully deleted!', 'success')->position('top-end');
        return redirect()->route('master_prodi.index');
    }
}