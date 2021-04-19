<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    
    protected $fillable = ['id','nim', 'nama', 'prodi_id', 'alamat', 'jenis_kelamin', 'gambar'];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
}
