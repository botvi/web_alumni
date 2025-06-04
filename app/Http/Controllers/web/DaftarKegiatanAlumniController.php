<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\KegiatanAlumni;
class DaftarKegiatanAlumniController extends Controller
{
    public function index()
    {
        $kegiatan = KegiatanAlumni::all();
        return view('pageweb.daftar_kegiatan_alumni.index', compact('kegiatan'));
    }
}
