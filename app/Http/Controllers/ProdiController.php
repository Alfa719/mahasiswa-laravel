<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index()
    {
        $totalMahasiswa = Mahasiswa::all()->count();
        $mahasiswa = Mahasiswa::get('prodi_id');
        // dd($mahasiswa);
        $dosen = Dosen::get();
        $prodi = Prodi::simplePaginate(5);
        return view('prodi.index', ['prodi' => $prodi, 'mhs' => $mahasiswa, 'total' => $totalMahasiswa, 'dosen' => $dosen]);
        // $prodi = Prodi::where('id',1)->with('dosen')->get();
        // dd($prodi);
    }
    public function create()
    {
        $dosen = Dosen::get();
        return view('prodi.insert',['dosen' => $dosen]);
    }
    public function store(Request $request)
    {
        $request->validate(array(
            'nama_prodi' => 'unique:prodis',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ));
        $gambar = $request->file('gambar');
        $namaGambar = $gambar->getClientOriginalName();
        $tujuan_upload = 'images/prodi';
        $gambar->move($tujuan_upload, $gambar->getClientOriginalName());
        $a = Prodi::create([
            'nama_prodi' => $request->nama_prodi,
            'status' => $request->status,
            'dosen_id' => $request->dosen_id,
            'logo' => $namaGambar
        ]);
        $request->session()->flash('add', 'Success! Program Studi Added');
        return redirect()->route('IndexProdi');
    }
    public function edit($id)
    {
        $prodi = Prodi::where('id', $id)->first();
        $dosen = Dosen::get();
        return view('prodi.edit', ['prodi' => $prodi, 'dosen' => $dosen]);
    }
    public function update(Request $request)
    {
        $request->validate(array(
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ));
        $gambar = $request->file('gambar');
        $namaGambar = $gambar->getClientOriginalName();
        $tujuan_upload = 'images/prodi';
        $gambar->move($tujuan_upload, $gambar->getClientOriginalName());
        $a = Prodi::where('nama_prodi', $request->nama_prodi)->update([
            'status' => $request->status,
            'dosen_id' => $request->dosen_id,
            'logo' => $namaGambar
        ]);
        $request->session()->flash('update', 'Success! Program Studi Updated');
        return redirect()->route('IndexProdi');
    }

    public function destroy($id)
    {
        Prodi::where('id', $id)->delete();
        $request->session()->flash('delete', 'Success! Program Studi Deleted');
        return redirect()->route('IndexProdi');
    }
}
