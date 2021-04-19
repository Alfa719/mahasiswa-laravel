@extends('layouts.main')

@section('title', 'Edit Mahasiswa')
@section('content')
<div class="container-fluid bg-gradient-default p-5">
    <h2 class="text-light">Informasi Dosen</h2>
    <form role="form" method="POST" action="{{url('dosen/update')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                        </div>
                        <input class="form-control" placeholder="NPM" type="text" name="npm" required readonly value="{{$dsn->npm}}">
                    </div> 
                    @error('nim')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                        </div>
                        <input class="form-control" placeholder="Nama" value="{{$dsn->nama}}" type="text" name="nama" required >
                    </div>
                    @error('nama')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="radio" value="Laki-Laki" name="jenis_kelamin" {{ $dsn->jenis_kelamin == 'Laki-Laki' ? 'checked' : '' }}><span class="text-light font-weight-bold">  Laki-Laki</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="radio" value="Perempuan" name="jenis_kelamin" {{ $dsn->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}><span class="text-light font-weight-bold">  Perempuan</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-square-pin"></i></span>
                        </div>
                        <input class="form-control" placeholder="Alamat" value="{{$dsn->alamat}}" type="text" name="alamat" required >
                    </div>
                    @error('alamat')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-12 text-center">
                <img alt="None" src="{{url('images/dosen')}}/{{$dsn->gambar}}" height="150" width="200">
            </div>
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