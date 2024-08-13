<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusAssetController extends Controller
{
    public function index()
    {
        return view('status_asset');
    }
}
