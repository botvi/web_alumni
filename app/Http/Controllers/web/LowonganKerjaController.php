<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\DaftarLowonganPekerjaan;
use Illuminate\Http\Request;

class LowonganKerjaController extends Controller
{
   public function index()
   {
      $lowongan = DaftarLowonganPekerjaan::all();
      return view('pageweb.lowongan_kerja.index', compact('lowongan'));
   }
}
