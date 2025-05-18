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
        Schema::create('data_laporans', function (Blueprint $table) {
            $table->id();
            
            $table->string('lampiran_daftar_wisuda')->nullable();
            $table->string('nomor_daftar_wisuda')->nullable();
            $table->string('lampiran_data_pekerjaan')->nullable();
            $table->string('nomor_data_pekerjaan')->nullable();
            $table->string('nama_rektor')->nullable();
            $table->string('nidn_rektor')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_laporans');
    }
};
