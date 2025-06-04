<?php

namespace App\Http\Controllers\admin;

use App\Models\DataPekerjaanAlumni;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DataPekerjaanAlumniController extends Controller
{
    public function index()
    {
        $dataPekerjaanAlumni = DataPekerjaanAlumni::with('dataAlumni')->get();
        return view('pageadmin.data_pekerjaan_alumni.index', compact('dataPekerjaanAlumni'));
    }
}
