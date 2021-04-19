<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'waktu_mulai', 'waktu_selesai', 'matkul_id', 'dosen_id', 'prodi_id', 'semester', 'hari'];

    public function matkul()
    {
        return $this->belongsTo(Matkul::class);
    }
    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
}
