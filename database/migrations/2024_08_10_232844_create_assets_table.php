<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kode');
            $table->string('lokasi');
            $table->string('foto');
            $table->string('kategori');
            $table->string('model');
            $table->string('status');
            $table->timestamps();
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('assets');
    }
}
