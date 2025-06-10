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
        Schema::create('data_pekerjaan_alumnis', function (Blueprint $table) {
            $table->id();

            $table->foreignId('data_alumni_id');
            // Apakah Anda saat ini sudah bekerja?
            $table->enum('apakah_bekerja', ['Ya', 'Tidak', 'Wirausaha'])->nullable();

            // Jika Ya
            $table->string('nomor_telepon')->nullable();
            $table->string('email')->nullable();
            $table->text('alamat_saat_ini')->nullable();
            $table->string('nama_perusahaan')->nullable();
            $table->text('alamat_perusahaan')->nullable();
            $table->string('posisi_jabatan')->nullable();
            $table->enum('status_pekerjaan', ['Tetap', 'Kontrak', 'Freelance'])->nullable();
            $table->enum('jenis_perusahaan', ['Pemerintah', 'Swasta', 'NGO', 'BUMN', 'Wirausaha'])->nullable();
            $table->string('gaji')->nullable();
            $table->string('lama_mendapat_pekerjaan')->nullable();
            $table->string('sumber_informasi_lowongan')->nullable();
            $table->enum('kesesuaian_bidang', ['Tidak Sesuai', 'Kurang Sesuai', 'Sesuai', 'Sangat Sesuai'])->nullable();

            // Jika Tidak
            $table->text('alasan_belum_bekerja')->nullable();

            // Jika Wirausaha
            $table->string('menjalankan_usaha')->nullable();
            $table->string('jenis_usaha')->nullable();
            $table->string('tahun_mulai_usaha')->nullable();
            $table->string('jumlah_karyawan')->nullable();
            $table->string('omset_bulanan')->nullable();
            $table->text('tantangan_usaha')->nullable();

            $table->timestamps();

           

            $table->foreign('data_alumni_id')
                ->references('id')
                ->on('data_alumnis')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pekerjaan_alumnis');
    }
};
