<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPekerjaanAlumni extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_alumni_id',
        'apakah_bekerja',
        'nomor_telepon',
        'email',
        'alamat_saat_ini',
        'nama_perusahaan',
        'alamat_perusahaan',
        'posisi_jabatan',
        'status_pekerjaan',
        'jenis_perusahaan',
        'gaji',
        'lama_mendapat_pekerjaan',
        'sumber_informasi_lowongan',
        'kesesuaian_bidang',
        'alasan_belum_bekerja',
        'menjalankan_usaha',
        'jenis_usaha',
        'tahun_mulai_usaha',
        'jumlah_karyawan',
        'omset_bulanan',
        'tantangan_usaha',
    ];

  

    public function dataAlumni()
    {
        return $this->belongsTo(DataAlumni::class, 'data_alumni_id', 'id');
    }
}
