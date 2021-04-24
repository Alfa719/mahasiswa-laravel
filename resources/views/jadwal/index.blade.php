@extends('layouts.main')

@section('title', 'Dashboard Jadwal')
@section('content')
<div class="row">
    <div class="col-md-12">
      @if (session()->get('add'))
          <div class="alert alert-success alert-block mb-0">
            <button class="close" data-dismiss="alert"><small><strong>x</strong></small></button>
            <strong>{{ session()->get('add') }}</strong>
          </div>
      @endif
      @if (session()->get('update'))
          <div class="alert alert-success alert-block mb-0">
            <button class="close" data-dismiss="alert"><small><strong>x</strong></small></button>
            <strong>{{ session()->get('update') }}</strong>
          </div>
      @endif
      @if (session()->get('delete'))
          <div class="alert alert-success alert-block mb-0">
            <button class="close" data-dismiss="alert"><small><strong>x</strong></small></button>
            <strong>{{ session()->get('delete') }}</strong>
          </div>
      @endif
      <div class="card bg-default shadow">
        <!-- Card header -->
        <div class="card-header bg-transparent border-0 ">
            <a href="{{route('TambahJadwal')}}">
                <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow mx-md-2">
                    <i class="ni ni-fat-add"></i>
                </div>
            </a>
            <a href="{{route('cetak.pdf')}}">
                <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow float-left">
                    <i class="ni ni-single-copy-04"></i>
                </div>
            </a>
            <h3 class="mb-0 text-center text-white">
                <span class="bg-gradient-green px-md-3 px-2 py-2">Jadwal Mata Kuliah</span>
            </h3>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-dark table-flush">
            <thead class="thead-dark">
              <tr>
                <th scope="col" class="sort" data-sort="name">No</th>
                <th scope="col" class="sort" data-sort="hari">Hari</th>
                <th scope="col" class="sort" data-sort="gambar">Waktu</th>
                <th scope="col" class="sort" data-sort="budget">Mata Kuliah</th>
                <th scope="col" class="sort" data-sort="status">Dosen</th>
                <th scope="col" class="sort" data-sort="sks">Program Studi</th>
                <th scope="col" class="sort" data-sort="sks1">Semester</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody class="list">
              @foreach ($jadwal as $j)
              <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td class="hari">{{$j->hari}}</td>
                <td class="gambar">{{$j->waktu_mulai}} - {{$j->waktu_selesai}}</td>
                <td class="budget">{{$j->matkul->nama_matkul}}</td>
                <td class="status">
                  @foreach ($dosen as $d)
                    {{$j->dosen_id != $d->id ? 'Tidak ada dosen': $j->dosen->nama}}
                  @endforeach
                </td>
                <td class="sks">{{$j->prodi->nama_prodi}}</td>
                <td class="sks1">{{$j->semester}}</td>
                <td class="text-right">
                  <div class="dropdown">
                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow bg-gradient-red">
                      <a class="dropdown-item text-light font-weight-bold" href="{{url('jadwal/edit')}}/{{$j->id}}">Edit</a>
                      <a class="dropdown-item text-light font-weight-bold" href="{{url('jadwal/delete')}}/{{$j->id}}">Delete</a>
                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- Card footer -->
        <div class="card-footer py-4 bg-default">
          <nav aria-label="...">
            
          </nav>
        </div>
      </div>
    </div>
    <div class="col-md-12 mb-0 mt-n4">
      <div class="float-md-right">
        <div class="bg-default p-3">{{$jadwal->links()}}</div>  
      </div>
    </div>
  </div>
  
@endsection