<?php

namespace App\Http\Controllers;

use App\Models\Asset; // Pastikan model Asset di-import
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        $totalAssets = Asset::count(); // Hitung jumlah total aset
        return view('dashboard', compact('totalAssets'));
    }
}
