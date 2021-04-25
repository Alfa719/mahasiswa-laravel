<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Dosen;
use App\Models\Matkul;
use App\Models\Prodi;
use Illuminate\Http\Request;
use PDF;

class JadwalController extends Controller
{
    
    public function index()
    {
        $jadwal = Jadwal::simplePaginate(5);
        $dosen = Dosen::get();
        $prodi = Prodi::get();
        return view('jadwal.index', [
            'jadwal' => $jadwal, 
            'dosen' => $dosen,
            'prodi' => $prodi
        ]);
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
        $request->session()->flash('add', 'Success! Jadwal Added');
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
            'dosen_id' => $dosen,
            'semester' => $request->semester
        ]);
        $request->session()->flash('update', 'Success! Jadwal Updated');
        return redirect()->route('IndexJadwal');
    }

    
    public function destroy(Request $request, $id)
    {
        $jadwal = Jadwal::where('id', $id)->delete();
        $request->session()->flash('delete', 'Success! Jadwal Deleted');
        return redirect()->route('IndexJadwal');
    }
    public function cetak()
    {
        $jadwal = Jadwal::all();
        $dosen = Dosen::get();
        $pdf = PDF::loadView('jadwal.print', ['jadwal' => $jadwal, 'dosen' => $dosen]);
        return $pdf->download('print-jadwal.pdf');
    }
}
