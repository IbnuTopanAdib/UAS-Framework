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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('npm')->unique();
            $table->string('keahlian');
            $table->enum('jenis_kelamin', ['laki-laki','perempuan']);
            $table->string('jurusan');
            $table->unsignedBigInteger('id_pembimbing')->nullable();
            $table->timestamps();
            $table->foreign('id_pembimbing')
                ->references('id')
                ->on('pembimbings')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswas');
    }
};
