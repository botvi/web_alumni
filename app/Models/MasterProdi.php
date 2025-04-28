<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterProdi extends Model
{
    use HasFactory;
    protected $table = 'master_prodis';
    protected $primaryKey = 'id';
    protected $fillable = ['kode_prodi', 'nama_prodi', 'fakultas_kode', 'akreditasi', 'program_pendidikan', 'gelar_akademik'];

    public function fakultas()
    {
        return $this->belongsTo(MasterFakultas::class, 'fakultas_kode', 'kode_fakultas');
    }
}
