<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    // Tambahkan properti fillable untuk menetapkan field yang dapat diisi secara massal
    protected $fillable = ['kode', 'nama', 'lokasi', 'foto', 'kategori', 'model', 'status'];

}
