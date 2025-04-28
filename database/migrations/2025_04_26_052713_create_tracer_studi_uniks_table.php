<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tracer_studi_uniks', function (Blueprint $table) {
            $table->id();
            $table->string('npm')->unique();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('nomor_telepon');
            $table->string('email')->lowercase();
            $table->date('tanggal_lulus');
            $table->string('ipk');
            $table->integer('masa_studi');
            $table->char('program_studi_kode', 2);
            $table->string('jenis_pekerjaan');
            $table->string('tempat_bekerja');
            
            $table->foreign('program_studi_kode')
                ->references('kode_prodi')
                ->on('master_prodis')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracer_studi_uniks');
    }
};
