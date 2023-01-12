<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('magangs', function (Blueprint $table) {
            $table->id();
            $table->string('judul_magang');
            $table->string('slug')->unique();
            $table->string('nama_pt');
            $table->string('kota');
            $table->string('pekerjaan');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->text('rincian');
            $table->text('syarat');
            $table->string('poster')->nullable();
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
        Schema::dropIfExists('magangs');
    }
};
