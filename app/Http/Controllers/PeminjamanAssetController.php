<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeminjamanAssetController extends Controller
{
    public function index()
    {
        $assets = [
            ['kode' => 'AS001', 'nama' => 'Laptop Dell XPS 13', 'lokasi' => 'Ruang IT', 'foto' => 'path/to/laptop.jpg', 'kategori' => 'Elektronik', 'model' => 'XPS 13 9300', 'status' => 'Available'],
            ['kode' => 'AS002', 'nama' => 'Printer Epson L3110', 'lokasi' => 'Ruang Administrasi', 'foto' => 'path/to/printer.jpg', 'kategori' => 'Elektronik', 'model' => 'L3110', 'status' => 'Not Available'],
            ['kode' => 'AS003', 'nama' => 'Meja Kerja', 'lokasi' => 'Ruang Meeting', 'foto' => 'path/to/meja.jpg', 'kategori' => 'Furniture', 'model' => 'IKEA Bekant', 'status' => 'Available'],
        ];

        return view('peminjaman_asset', compact('assets'));
    }
}