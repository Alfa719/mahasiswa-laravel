@extends('layouts.main')

@section('title', 'Edit Jadwal')
@section('content')
<div class="container-fluid bg-gradient-default p-5">
    <h2 class="text-light">Informasi Jadwal</h2>
    <form role="form" method="POST" action="{{route('jadwal.update', $jadwal->id)}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <select name="hari" id="" class="form-control" aria-placeholder="Program Studi" required>
                            <option value="" disabled>Hari</option>
                            <option value="Minggu" {{ $jadwal->hari == 'Minggu' ? 'selected' : '' }}>Minggu</option>
                            <option value="Senin" {{ $jadwal->hari == 'Senin' ? 'selected' : '' }}>Senin</option>
                            <option value="Selasa" {{ $jadwal->hari == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                            <option value="Rabu" {{ $jadwal->hari == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                            <option value="Kamis" {{ $jadwal->hari == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                            <option value="" disabled class="bg-red">Jumat</option>
                            <option value="Sabtu" {{ $jadwal->hari == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
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
                        <input class="form-control" placeholder="Jam Mulai" type="time" name="jam_mulai" required value="{{$jadwal->waktu_mulai}}">
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
                        <input class="form-control" placeholder="Jam Selesai" type="time" name="jam_selesai" required value="{{$jadwal->waktu_selesai}}">
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
                                <option value="{{$m->id}}" {{ $jadwal->matkul_id == $m->id ? 'selected' : '' }}>{{$m->nama_matkul}}</option>
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
                                <option value="{{$p->id}}" {{ $jadwal->prodi_id == $p->id ? 'selected' : '' }}>{{$p->nama_prodi}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('prodi_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative mb-3">
                        <select name="semester" id="" class="form-control" aria-placeholder="Program Studi" required>
                            <option value="" disabled>Semester</option>
                            <option value="I" {{ $jadwal->semester == 'I' ? 'selected' : '' }}>I</option>
                            <option value="II" {{ $jadwal->semester == 'II' ? 'selected' : '' }}>II</option>
                            <option value="III" {{ $jadwal->semester == 'III' ? 'selected' : '' }}>III</option>
                            <option value="IV" {{ $jadwal->semester == 'IV' ? 'selected' : '' }}>IV</option>
                            <option value="V" {{ $jadwal->semester == 'V' ? 'selected' : '' }}>V</option>
                            <option value="VI" {{ $jadwal->semester == 'VI' ? 'selected' : '' }}>VI</option>
                            <option value="VII" {{ $jadwal->semester == 'VII' ? 'selected' : '' }}>VII</option>
                            <option value="VIII" {{ $jadwal->semester == 'VIII' ? 'selected' : '' }}>VIII</option>
                            <option value="IX" {{ $jadwal->semester == 'IX' ? 'selected' : '' }}>IX</option>
                            <option value="X" {{ $jadwal->semester == 'X' ? 'selected' : '' }}>X</option>
                            <option value="XI" {{ $jadwal->semester == 'XI' ? 'selected' : '' }}>XI</option>
                            <option value="XII" {{ $jadwal->semester == 'XII' ? 'selected' : '' }}>XII</option>
                        </select>
                    </div>
                    @error('semester')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-info btn-block">Update</button>
            </div>
        </div>     
        
    </form>
</div>
@endsection