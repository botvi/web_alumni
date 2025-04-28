<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterFakultas extends Model
{
    use HasFactory;
    protected $table = 'master_fakultas';
    protected $primaryKey = 'id';
    protected $fillable = ['kode_fakultas', 'nama_fakultas', 'nama_dekan'];

    public function prodis()
    {
        return $this->hasMany(MasterProdi::class, 'fakultas_kode', 'kode_fakultas');
    }
}
