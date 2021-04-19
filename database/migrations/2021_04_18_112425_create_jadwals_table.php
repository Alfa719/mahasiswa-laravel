<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');

            $table->foreignId('matkul_id');
            $table->foreign('matkul_id')->references('id')->on('matkuls')->onDelete('cascade');

            $table->foreignId('dosen_id');
            $table->foreign('dosen_id')->references('id')->on('dosens')->onDelete('cascade');

            $table->foreignId('prodi_id');
            $table->foreign('prodi_id')->references('id')->on('prodis')->onDelete('cascade');

            $table->char('semester');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwals');
    }
}
