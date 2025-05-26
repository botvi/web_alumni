<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarWisuda extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'npm',
        'tempat_lahir',
        'tanggal_lahir',
        'tanggal_lulus',
        'bulan_wisuda',
        'tahun_wisuda',
        'fakultas_kode',
        'program_studi_kode',
        'nomor_seri_ijazah',
        'nomor_seri_transkrip',
        'pisn',
        'nik',
        'pin_akses',
    ];

    public function fakultas()
    {
        return $this->belongsTo(MasterFakultas::class, 'fakultas_kode', 'kode_fakultas');
    }

    public function programStudi()
    {
        return $this->belongsTo(MasterProdi::class, 'program_studi_kode', 'kode_prodi');
    }
}
