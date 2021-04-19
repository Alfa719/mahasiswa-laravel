<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = ['id','npm', 'nama', 'prodi_id', 'alamat', 'jenis_kelamin', 'gambar'];

    public function prodi()
    {
        return $this->hasOne(Prodi::class);
    }
    public function matkul()
    {
        return $this->hasOne(Matkul::class);
    }
    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }
}
