<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TracerStudiUniks;
use Illuminate\Http\Request;

class TracerStudiUniksController extends Controller
{
    
    public function index()
    {
        $tracerStudiUniks = TracerStudiUniks::orderBy('id', 'asc')->with('programStudi')->get();
        return view('pageadmin.tracer_studi_uniks.index', compact('tracerStudiUniks'));
    }

}
