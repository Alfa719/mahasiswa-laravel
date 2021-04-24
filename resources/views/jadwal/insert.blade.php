@extends('layouts.main')

@section('title', 'Insert Jadwal')
@section('content')
<div class="container-fluid bg-gradient-default p-5">
    <h2 class="text-light">Informasi Jadwal</h2>
    <form role="form" method="POST" action="{{route('TambahJadwal')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <select name="hari" id="" class="form-control" aria-placeholder="Program Studi" required>
                            <option value="" disabled selected>Hari</option>
                            <option value="Minggu">Minggu</option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="" disabled class="bg-red">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                        </select>
                    </div>
                    @error('semester')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-watch-time"></i></span>
                        </div>
                        <input class="form-control" placeholder="Jam Mulai" type="time" name="jam_mulai" required>
                    </div>
                    @error('jam_mulai')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-watch-time"></i></span>
                        </div>
                        <input class="form-control" placeholder="Jam Selesai" type="time" name="jam_selesai" required>
                    </div>
                    @error('jam_selesai')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <select name="matkul_id" id="" class="form-control" aria-placeholder="Program Studi" required>
                            <option value="" disabled selected>Mata Kuliah</option>
                            @foreach ($matkul as $m)
                                <option value="{{$m->id}}">{{$m->nama_matkul}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('matkul_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <select name="prodi_id" id="" class="form-control" aria-placeholder="Program Studi" required>
                            <option value="" disabled selected>Program Studi</option>
                            @foreach ($prodi as $p)
                                <option value="{{$p->id}}">{{$p->nama_prodi}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('prodi_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            @foreach ($matkul as $m)
                @foreach ($dosen as $d)
                    <input type="hidden" name="dosen_id" value="{{$m->dosen_id != $d->id ? '0': $m->dosen->id}}">
                @endforeach
            @endforeach
            
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <select name="semester" id="" class="form-control" aria-placeholder="Program Studi" required>
                            <option value="" disabled selected>Semester</option>
                            <option value="I">I</option>
                            <option value="II">II</option>
                            <option value="III">III</option>
                            <option value="IV">IV</option>
                            <option value="V">V</option>
                            <option value="VI">VI</option>
                            <option value="VII">VII</option>
                            <option value="VIII">VIII</option>
                            <option value="IX">IX</option>
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
                    </div>
                    @error('semester')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-info btn-block">Insert</button>
            </div>
        </div>     
        
    </form>
</div>
@endsection