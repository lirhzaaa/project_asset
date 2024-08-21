<?php

namespace App\Http\Controllers;
use App\Models\Asset; // Pastikan model Asset di-import
use Illuminate\Http\Request;

class MasterLokasiController extends Controller
{

    public function index()
    {
        $assets = Asset::all(); // Atau sesuai dengan query yang Anda butuhkan
        return view('master_lokasi', compact('assets'));
    }
}

