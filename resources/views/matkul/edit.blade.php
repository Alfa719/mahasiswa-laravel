@extends('layouts.main')

@section('title', 'Edit Prodi')
@section('content')
<div class="container-fluid bg-gradient-default p-5">
    <h2 class="text-light">Informasi Program Studi</h2>
    <form role="form" method="POST" action="{{ route('makul.update', $matkul->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                        </div>
                        <input class="form-control" placeholder="Kode Mata Kuliah" type="text" name="kode" required value="{{$matkul->kode}}" disabled>
                    </div>
                    @error('kode')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                        </div>
                        <input class="form-control" placeholder="Nama Mata Kuliah" type="text" name="nama_matkul" required value="{{$matkul->nama_matkul}}">
                    </div>
                    @error('nama_matkul')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <select name="dosen_id" id="" class="form-control" aria-placeholder="Program Studi" required>
                            <option value="" disabled>Dosen Pengajar</option>
                            @foreach ($dosen as $d)
                                <option value="{{$d->id}}"  {{ $matkul->dosen_id == $d->id ? 'selected' : '' }}>{{$d->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('prodi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-watch-time"></i></span>
                        </div>
                        <input class="form-control" placeholder="SKS" type="number" name="sks" required value="{{$matkul->sks}}">
                    </div>
                    @error('kode')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>     
        <div class="text-center">
            <button type="submit" class="btn btn-info mt-4">Update</button>
        </div>
    </form>
</div>
@endsection