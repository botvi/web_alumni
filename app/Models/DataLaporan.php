<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataLaporan extends Model
{
    use HasFactory;
    protected $fillable = [
        'lampiran_daftar_wisuda',
        'nomor_daftar_wisuda',
        'lampiran_data_pekerjaan',
        'nomor_data_pekerjaan',
        'nama_rektor',
        'nidn_rektor',
        
    ];
}
