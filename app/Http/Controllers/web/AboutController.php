<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
 public function index(){
    return view('pageweb.tentang.index');
 }
}
