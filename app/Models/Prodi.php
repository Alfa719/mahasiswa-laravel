<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $fillable = ['id','nama_prodi', 'dosen_id', 'logo', 'status'];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }
    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }
}
