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
        Schema::create('master_prodis', function (Blueprint $table) {
            $table->id();
            $table->char('kode_prodi', 2)->unique();
            $table->string('nama_prodi');
            $table->string('akreditasi');
            $table->string('program_pendidikan');
            $table->string('gelar_akademik');
            $table->char('fakultas_kode', 2);
            $table->timestamps();

            $table->foreign('fakultas_kode')
                ->references('kode_fakultas')
                ->on('master_fakultas')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_prodis');
    }
};
