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
        Schema::create('data_alumnis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('npm')->unique();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->date('tanggal_lulus');
            $table->string('bulan_wisuda');
            $table->string('tahun_wisuda');
            $table->char('fakultas_kode', 2);
            $table->char('program_studi_kode', 2);
            $table->string('nomor_seri_ijazah')->unique()->nullable();
            $table->string('nomor_seri_transkrip')->unique()->nullable();
            $table->string('pisn')->unique()->nullable();
            $table->string('nik')->unique()->nullable();

            $table->string('pin_akses')->nullable();
            
            $table->timestamps();

            $table->foreign('fakultas_kode')
            ->references('kode_fakultas')
            ->on('master_fakultas')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('program_studi_kode')
            ->references('kode_prodi')
            ->on('master_prodis')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_alumnis');
    }
};
