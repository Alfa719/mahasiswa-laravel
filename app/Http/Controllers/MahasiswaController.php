<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Prodi;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::simplePaginate(5);
        $prodi = Prodi::get();
        return view('mahasiswa.index', ['mhs' => $mahasiswa, 'prodi' => $prodi]);
        // $mahasiswa = Mahasiswa::where('id',1)->with('prodi')->get();

    }
    public function show()
    {
        $prodis = Prodi::get();
        return view('mahasiswa.insert', ['prodi' => $prodis]);
    }
    public function store(Request $request)
    {
        
        $request->validate(array(
            'nim' => 'numeric|min:10|unique:mahasiswas',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ));
        $gambar = $request->file('gambar');
        $namaGambar = $gambar->getClientOriginalName();
        // Buat Folder baru di public
        $tujuan_upload = 'images';
        $gambar->move($tujuan_upload, $gambar->getClientOriginalName());
        Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'prodi_id' => $request->prodi,
            'gambar' => $namaGambar
        ]);
        $request->session()->flash('add', 'Success! Mahasiswa Added');
        return redirect()->route('IndexMahasiswa');
    }
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::where('id', $id)->first();
        $prodi = Prodi::get();
        return view('mahasiswa.edit', ['mhs' => $mahasiswa, 'prodi' => $prodi]);
    }
    public function update(Request $request)
    {
        $request->validate(array(
            'nim' => 'numeric|min:10',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ));
        $gambar = $request->file('gambar');
        $namaGambar = $gambar->getClientOriginalName();
        $tujuan_upload = 'images';
        $gambar->move($tujuan_upload, $gambar->getClientOriginalName());
        Mahasiswa::where('nim', $request->nim)->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'prodi_id' => $request->prodi,
            'gambar' => $namaGambar
        ]);
        $request->session()->flash('update', 'Success! Mahasiswa Updated');
        return redirect()->route('IndexMahasiswa');
    }
    public function delete(Request $request, $id)
    {
        Mahasiswa::where('id', $id)->delete();
        $request->session()->flash('delete', 'Success! Mahasiswa Deleted');
        return redirect()->route('IndexMahasiswa');
    }
}
