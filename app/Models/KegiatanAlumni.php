<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanAlumni extends Model
{
    use HasFactory;
    protected $fillable = [
        'gambar',
        'deskripsi_kegiatan',
        'tempat',
    ];
}
