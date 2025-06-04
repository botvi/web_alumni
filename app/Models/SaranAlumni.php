<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaranAlumni extends Model
{
    use HasFactory;
    protected $fillable = [
        'data_alumni_id',
        'saran',
        'respon',
    ];

    public function dataAlumni()
    {
        return $this->belongsTo(DataAlumni::class, 'data_alumni_id', 'id');
    }
}
