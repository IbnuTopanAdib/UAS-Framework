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
        Schema::create('pembimbings', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nidn')->unique();
            $table->enum('jenis_kelamin', ['laki-laki','perempuan']);
            $table->string('no_hp');
            $table->string('bimbingan');
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
        Schema::dropIfExists('pembimbings');
    }
};
