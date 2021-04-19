@extends('layouts.main')

@section('title', 'Insert Prodi')
@section('content')
<div class="container-fluid bg-gradient-default p-5">
    <h2 class="text-light">Informasi Program Studi</h2>
    <form role="form" method="POST" action="{{url('prodi/insert')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                        </div>
                        <input class="form-control" placeholder="Nama Prodi" type="text" name="nama_prodi" required>
                    </div>
                    @error('nama_prodi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="radio" checked value="Aktif" name="status"><span class="text-light font-weight-bold">  Aktif</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="radio" value="Nonaktif" name="status"><span class="text-light font-weight-bold">  Nonaktif</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <select name="dosen_id" id="" class="form-control" aria-placeholder="Program Studi" required>
                            <option value="" disabled selected>Kepala Prodi</option>
                            @foreach ($dosen as $d)
                                <option value="{{$d->id}}">{{$d->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('prodi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <input type="file" name="gambar" id="" placeholder="File Gambar" required>
                @error('gambar')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>        
        <div class="text-center">
            <button type="submit" class="btn btn-info mt-4">Insert</button>
        </div>
    </form>
</div>
@endsection