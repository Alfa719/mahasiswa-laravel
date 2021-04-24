<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Matkul;
use App\Models\Prodi;
use App\Models\Mahasiswa;

class DashboardController extends Controller
{
    public function index()
    {
        $dosen = Dosen::count();
        $matkul = Matkul::count();
        $prodi = Prodi::count();
        $mahasiswa = Mahasiswa::count();
        return view('index', [
            'dosen' => $dosen,
            'matkul' => $matkul,
            'prodi' => $prodi,
            'mahasiswa' => $mahasiswa,
        ]);
    }
}
