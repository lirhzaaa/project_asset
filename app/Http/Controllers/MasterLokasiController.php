<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterLokasiController extends Controller
{
    public function index()
    {
        return view('master_lokasi');
    }
}

