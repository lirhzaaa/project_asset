<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssetsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('assets')->insert([
            'kode' => 'A001',
            'nama' => 'Laptop Dell',
            'lokasi' => 'Gudang 1',
            'kategori' => 'Elektronik',
            'model' => 'Dell Inspiron',
            'status' => 'Tersedia',
        ]);
    }
}
