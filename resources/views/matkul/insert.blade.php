@extends('layouts.main')

@section('title', 'Insert Mata Kuliah')
@section('content')
<div class="container-fluid bg-gradient-default p-5">
    <h2 class="text-light">Informasi Mata Kuliah</h2>
    <form role="form" method="POST" action="{{url('matkul/insert')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                        </div>
                        <input class="form-control" placeholder="Kode Mata Kuliah" type="text" name="kode" required>
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
                        <input class="form-control" placeholder="Nama Mata Kuliah" type="text" name="nama_matkul" required>
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
                            <option value="" disabled selected>Dosen Pengajar</option>
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
            
            <div class="col-md-2">
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-watch-time"></i></span>
                        </div>
                        <input class="form-control" placeholder="SKS" type="number" name="sks" required>
                    </div>
                    @error('kode')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>     
        <div class="text-center">
            <button type="submit" class="btn btn-info mt-4">Insert</button>
        </div>
    </form>
</div>
@endsection