<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    use HasFactory;

    protected $fillable = ['id','sks', 'kode', 'nama_matkul', 'dosen_id'];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }
}
