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
        Schema::create('daftar_lowongan_pekerjaans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perusahaan');
            $table->string('nama_lowongan');
            $table->text('deskripsi');
            $table->text('persyaratan');
            $table->string('lokasi');
            $table->string('gaji');
            $table->date('tanggal_posting');
            $table->date('tanggal_penutupan'); 
            $table->string('email_perusahaan')->nullable();
            $table->string('whatsapp_perusahaan')->nullable();
            $table->string('website_perusahaan')->nullable();
            $table->string('logo_perusahaan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_lowongan_pekerjaans');
    }
};
