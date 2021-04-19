<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::simplePaginate(5);
        return view('dosen.index', ['dosen' => $dosen]);
    }

    public function create()
    {
        return view('dosen.insert');
    }

    public function store(Request $request)
    {
        $request->validate(array(
            'npm' => 'numeric|min:10|unique:dosens',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ));
        $gambar = $request->file('gambar');
        $namaGambar = $gambar->getClientOriginalName();
        // Buat Folder baru di public
        $tujuan_upload = 'images/dosen';
        $gambar->move($tujuan_upload, $gambar->getClientOriginalName());
        Dosen::create([
            'npm' => $request->npm,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'gambar' => $namaGambar
        ]);
        return redirect()->route('IndexDosen');
    }

    public function edit($id)
    {
        $dosen= Dosen::where('id', $id)->first();
        return view('dosen.edit', ['dsn' => $dosen]);
    }

    public function update(Request $request)
    {
        $request->validate(array(
            'npm' => 'numeric|min:10',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ));
        $gambar = $request->file('gambar');
        $namaGambar = $gambar->getClientOriginalName();
        $tujuan_upload = 'images/dosen';
        $gambar->move($tujuan_upload, $gambar->getClientOriginalName());
        Dosen::where('npm', $request->npm)->update([
            'npm' => $request->npm,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'gambar' => $namaGambar
        ]);
        return redirect()->route('IndexDosen');
    }

    public function destroy($id)
    {
        Dosen::where('id', $id)->delete();
        return redirect()->route('IndexDosen');
    }
}
