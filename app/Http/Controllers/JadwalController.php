<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Dosen;
use App\Models\Matkul;
use App\Models\Prodi;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    
    public function index()
    {
        $jadwal = Jadwal::simplePaginate(5);
        $dosen = Dosen::get();
        return view('jadwal.index', ['jadwal' => $jadwal, 'dosen' => $dosen]);
    }

    
    public function create()
    {
        $dosen = Dosen::get();
        $matkul = Matkul::get();
        $prodi = Prodi::get();
        return view('jadwal.insert', ['dosen' => $dosen, 'matkul' => $matkul, 'prodi' => $prodi]);
        
    }

    
    public function store(Request $request)
    {
        $request->validate(array(
            'jam_mulai' => 'required',
            'hari' => 'required',
            'jam_selesai' => 'required',
            'prodi_id' => 'required',
            'matkul_id' => 'required',
            'semester' => 'required',
        ));
        Jadwal::create([
            'waktu_mulai' => $request->jam_mulai,
            'waktu_selesai' => $request->jam_selesai,
            'hari' => $request->hari,
            'matkul_id' => $request->matkul_id,
            'prodi_id' => $request->prodi_id,
            'dosen_id' => $request->dosen_id,
            'semester' => $request->semester
        ]);

        return redirect()->route('IndexJadwal');
    }

    
    public function edit($id)
    {
        $jadwal = Jadwal::where('id', $id)->first();
        $matkul = Matkul::get();
        $prodi = Prodi::get();
        $dosen = Dosen::get();
        return view('jadwal.edit', ['matkul' => $matkul, 'dosen' => $dosen, 'prodi' => $prodi, 'jadwal' => $jadwal]);
    }

    
    public function update(Request $request, $id)
    {
        $dosen = Matkul::where('id', $request->matkul_id)->with('jadwal')->first();
        Jadwal::where('id', $id)->update([
            'waktu_mulai' => $request->jam_mulai,
            'waktu_selesai' => $request->jam_selesai,
            'hari' => $request->hari,
            'matkul_id' => $request->matkul_id,
            'prodi_id' => $request->prodi_id,
            'dosen_id' => $dosen->dosen_id,
            'semester' => $request->semester
        ]);
        return redirect()->route('IndexJadwal');
    }

    
    public function destroy($id)
    {
        $jadwal = Jadwal::where('id', $id)->delete();
        return redirect()->route('IndexJadwal');
    }
}