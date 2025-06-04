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
        Schema::create('saran_alumnis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_alumni_id');
            $table->string('saran');
            $table->string('respon')->nullable();
            $table->timestamps();

            $table->foreign('data_alumni_id')->references('id')->on('data_alumnis')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saran_alumnis');
    }
};
