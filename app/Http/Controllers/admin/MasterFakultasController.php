<?php

namespace App\Http\Controllers\admin;

use App\Models\MasterFakultas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Routing\Controller;

class MasterFakultasController extends Controller
{
    public function getFakultas($fakultas_kode)
    {
        $fakultas = MasterFakultas::where('kode_fakultas', $fakultas_kode)->get();
        return response()->json($fakultas);
    }
    

    public function index()
    {
        $fakultas = MasterFakultas::orderBy('kode_fakultas', 'asc')->get();
        return view('pageadmin.master_fakultas.index', compact('fakultas'));
    }

    public function create()
    {
        return view('pageadmin.master_fakultas.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'kode_fakultas' => 'required|unique:master_fakultas,kode_fakultas',
                'nama_fakultas' => 'required|string|max:255',
                'nama_dekan' => 'required|string|max:255',
            ]);



            $fakultas = MasterFakultas::create([
                'kode_fakultas' => $request->kode_fakultas,
                'nama_fakultas' => $request->nama_fakultas,
                'nama_dekan' => $request->nama_dekan,
            ]);

            Alert::toast('Fakultas successfully created!', 'success')->position('top-end');
            return redirect()->route('master_fakultas.index');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Alert::toast('Sepertinya kode sudah ada!', 'error')->position('top-end');
            return back()->withErrors($e->errors())->withInput();
        }
    }

    public function edit($id)
    {
        $fakultas = MasterFakultas::findOrFail($id);
        return view('pageadmin.master_fakultas.edit', compact('fakultas'));
    }

    public function update(Request $request, $id)
    {
        try {
            $fakultas = MasterFakultas::findOrFail($id);

            $request->validate([
                'kode_fakultas' => 'required|unique:master_fakultas,kode_fakultas,' . $id,
                'nama_fakultas' => 'required|string|max:255',
                'nama_dekan' => 'required|string|max:255',
            ]);

            $fakultas->update([
                'kode_fakultas' => $request->kode_fakultas,
                'nama_fakultas' => $request->nama_fakultas,
                'nama_dekan' => $request->nama_dekan,
            ]);

            Alert::toast('Fakultas successfully updated!', 'success')->position('top-end');
            return redirect()->route('master_fakultas.index');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Alert::toast('Sepertinya kode sudah ada!', 'error')->position('top-end');
            return back()->withErrors($e->errors())->withInput();
        }
    }

    public function destroy($id)
    {
        $fakultas = MasterFakultas::findOrFail($id);

        $fakultas->delete();

        Alert::toast('Fakultas successfully deleted!', 'success')->position('top-end');
        return redirect()->route('master_fakultas.index');
    }
}