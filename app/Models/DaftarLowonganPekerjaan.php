<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarLowonganPekerjaan extends Model
{
    use HasFactory;
    protected $table = 'daftar_lowongan_pekerjaans';
    protected $fillable = [
        'nama_perusahaan',
        'nama_lowongan',
        'deskripsi',
        'persyaratan',
        'lokasi',
        'gaji',
        'tanggal_posting',
        'tanggal_penutupan',
        'email_perusahaan',
        'whatsapp_perusahaan',
        'website_perusahaan',
        'logo_perusahaan',
    ];
}
