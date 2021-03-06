<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matkul;
use App\Models\Dosen;
use App\Models\Jadwal;

class MatkulController extends Controller
{
    public function index()
    {
        $matkul = Matkul::simplePaginate(5);
        $dosen = Dosen::get();
        return view('matkul.index', ['matkul' => $matkul, 'dosen' => $dosen]);
    }
    public function create()
    {
        $dosen = Dosen::get();
        return view('matkul.insert', ['dosen' => $dosen]);
    }
    
    public function store(Request $request)
    {
        $request->validate(array(
            'kode' => 'unique:matkuls|required|numeric',
            'nama_matkul' => 'unique:matkuls|required',
            'sks' => 'numeric'
        ));
        $a = "MK".$request->kode;
        Matkul::create([
            'kode' => $a,
            'nama_matkul' => $request->nama_matkul,
            'dosen_id' => $request->dosen_id,
            'sks' => $request->sks
        ]);
        $request->session()->flash('add', 'Success! Mata Kuliah Added');
        return redirect()->route('IndexMatkul');
    }
    
    public function edit($id)
    {
        $matkul = Matkul::where('id', $id)->first();
        $dosen = Dosen::get();
        return view('matkul.edit', ['matkul' => $matkul, 'dosen' => $dosen]);
    }

    public function update(Request $request,$id)
    {
        Matkul::where('id', $id)->update([
            'nama_matkul' => $request->nama_matkul,
            'dosen_id' => $request->dosen_id,
            'sks' => $request->sks
        ]);
        Jadwal::where('matkul_id', $id)->update([
            'dosen_id' => $request->dosen_id
        ]);
        $request->session()->flash('update', 'Success! Mata Kuliah Updated');
        return redirect()->route('IndexMatkul');
    }

    public function destroy(Request $request, $id)
    {
        $matkul = Matkul::where('id', $id)->delete();
        $request->session()->flash('delete', 'Success! Mata Kuliah Deleted');
        return redirect()->route('IndexMatkul');
    }
}
