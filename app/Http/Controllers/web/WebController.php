<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\DaftarLowonganPekerjaan;
use Illuminate\Http\Request;

class WebController extends Controller
{
 public function index(){
   $lowongan = DaftarLowonganPekerjaan::take(3)->get();
    return view('pageweb.landing.index', compact('lowongan'));
 }
}
