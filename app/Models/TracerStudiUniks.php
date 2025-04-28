<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TracerStudiUniks extends Model
{
    use HasFactory;
    protected $fillable = [
        'npm',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'nomor_telepon',
        'email',
        'tanggal_lulus',
        'ipk',
        'masa_studi',
        'program_studi_kode',
        'jenis_pekerjaan',
        'tempat_bekerja',
    ];

    public function programStudi()
    {
        return $this->belongsTo(MasterProdi::class, 'program_studi_kode', 'kode_prodi');
    }
}
