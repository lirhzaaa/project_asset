<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use Illuminate\Support\Facades\Storage;

class AssetController extends Controller
{
    public function index()
    {
        // Mengambil semua asset dari database
        $assets = Asset::all();

        // Mengembalikan tampilan master_asset dengan data asset
        return view('master_asset', ['assets' => $assets]);
        
    }

    public function create()
    {
        // Menampilkan form untuk menambah asset baru
        return view('create_asset'); // Pastikan file view ini ada
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'kategori' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        // Handle the file upload
        $fotoPath = $request->file('foto')->store('images', 'public');

        // Create a new asset record
        Asset::create([
            'nama' => $request->nama,
            'kode' => $request->kode,
            'lokasi' => $request->lokasi,
            'foto' => $fotoPath,
            'kategori' => $request->kategori,
            'model' => $request->model,
            'status' => $request->status,
        ]);

        return redirect()->route('master_asset')->with('success', 'Asset berhasil ditambahkan!');
    }

    public function show($id)
    {
        $asset = Asset::findOrFail($id);
        return view('show_asset', ['asset' => $asset]);
    }

    public function edit($id)
    {
        $asset = Asset::find($id);
        return response()->json($asset);
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'kategori' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $asset = Asset::findOrFail($id);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($asset->foto) {
                Storage::disk('public')->delete($asset->foto);
            }
            // Upload foto baru
            $fotoPath = $request->file('foto')->store('images', 'public');
            $asset->foto = $fotoPath;
        }

        $asset->nama = $request->nama;
        $asset->kode = $request->kode;
        $asset->lokasi = $request->lokasi;
        $asset->kategori = $request->kategori;
        $asset->model = $request->model;
        $asset->status = $request->status;

        $asset->save();

        return redirect()->route('master_asset')->with('success', 'Asset berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $asset = Asset::findOrFail($id);
        // Hapus foto jika ada
        if ($asset->foto) {
            Storage::disk('public')->delete($asset->foto);
        }
        $asset->delete();

        return redirect()->route('master_asset')->with('success', 'Asset berhasil dihapus!');
    }
}
