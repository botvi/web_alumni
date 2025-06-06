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
        Schema::create('master_fakultas', function (Blueprint $table) {
            $table->id();
            $table->char('kode_fakultas', 2)->unique();
            $table->string('nama_fakultas');
            $table->string('nama_dekan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_fakultas');
    }
};
