@extends('layouts.main')

@section('title', 'Dashboard Mahasiswa')
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card bg-default shadow">
        <!-- Card header -->
        <div class="card-header bg-transparent border-0">
            <a href="{{route('TambahDosen')}}">
                <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow float-right">
                    <i class="ni ni-fat-add"></i>
                </div>
            </a>
            <h3 class="mb-0 text-center text-white">
                <span class="bg-gradient-green px-3 py-2">Data Dosen</span>
            </h3>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-dark table-flush">
            <thead class="thead-dark">
              <tr>
                <th scope="col" class="sort" data-sort="name">No</th>
                <th scope="col" class="sort" data-sort="nim">NPM</th>
                <th scope="col" class="sort" data-sort="gambar">Gambar</th>
                <th scope="col" class="sort" data-sort="budget">Nama</th>
                <th scope="col" class="sort" data-sort="status">Jenis Kelamin</th>
                <th scope="col">Alamat</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody class="list">
              @foreach ($dosen as $dsn)
              <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td class="nim">{{$dsn->npm}}</td>
                <td class="gambar">
                    <div class="avatar-group">
                        <a href="" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="{{$dsn->nama}}">
                          <img alt="None" src="{{asset('images')}}/dosen/{{$dsn->gambar}}">
                        </a>
                    </div>
                </td>
                <td class="budget">
                  {{$dsn->nama}}
                </td>
                <td>
                  <span class="badge badge-dot mr-4">
                    <i class="{{ $dsn->jenis_kelamin == 'Perempuan' ? 'bg-red' : 'bg-green' }}"></i>
                    <span class="status">{{$dsn->jenis_kelamin}}</span>
                  </span>
                </td>
                <td>
                  {{$dsn->alamat}}
                </td>
                <td class="text-right">
                  <div class="dropdown">
                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow bg-gradient-red">
                      <a class="dropdown-item text-light font-weight-bold" href="{{url('dosen/edit')}}/{{$dsn->id}}">Edit</a>
                      <a class="dropdown-item text-light font-weight-bold" href="{{url('dosen/delete')}}/{{$dsn->id}}">Delete</a>
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
        <div class="bg-default p-3">{{$dosen->links()}}</div>  
      </div>
    </div>
  </div>
  
@endsection