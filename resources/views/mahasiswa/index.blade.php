@extends('layouts.main')

@section('title', 'Dashboard Mahasiswa')
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
        <div class="card-header bg-transparent border-0">
            <a href="{{route('TambahMahasiswa')}}">
                <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow float-right">
                    <i class="ni ni-fat-add"></i>
                </div>
            </a>
            <h3 class="mb-0 text-center text-white">
                <span class="bg-gradient-green px-3 py-2">Data Mahasiswa</span>
            </h3>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table class="table align-items-center table-dark table-flush">
            <thead class="thead-dark">
              <tr>
                <th scope="col" class="sort" data-sort="name">No</th>
                <th scope="col" class="sort" data-sort="nim">NIM</th>
                <th scope="col" class="sort" data-sort="gambar">Gambar</th>
                <th scope="col" class="sort" data-sort="budget">Nama</th>
                <th scope="col" class="sort" data-sort="status">Jenis Kelamin</th>
                <th scope="col">Alamat</th>
                <th scope="col" class="sort" data-sort="completion">Program Studi</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody class="list">
              @foreach ($mhs as $mahasiswa)
              <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td class="nim">{{$mahasiswa->nim}}</td>
                <td class="gambar">
                    <div class="avatar-group">
                        <a href="" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="{{$mahasiswa->nama}}">
                          <img alt="None" src="{{asset('images')}}/{{$mahasiswa->gambar}}">
                        </a>
                    </div>
                </td>
                <td class="budget">
                  {{$mahasiswa->nama}}
                </td>
                <td>
                  <span class="badge badge-dot mr-4">
                    <i class="{{ $mahasiswa->jenis_kelamin == 'Perempuan' ? 'bg-red' : 'bg-green' }}"></i>
                    <span class="status">{{$mahasiswa->jenis_kelamin}}</span>
                  </span>
                </td>
                <td>
                  {{$mahasiswa->alamat}}
                </td>
                <td>
                  @foreach ($prodi as $p)
                    @if ($mahasiswa->prodi_id == $p->id)
                        {{$mahasiswa->prodi->nama_prodi}}
                        @break
                    @else
                        {{"Tidak Ada Prodi"}}
                        @break
                    @endif
                  @endforeach
                </td>
                <td class="text-right">
                  <div class="dropdown">
                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow bg-gradient-red">
                      <a class="dropdown-item text-light font-weight-bold" href="{{url('mahasiswa/edit')}}/{{$mahasiswa->id}}">Edit</a>
                      <a class="dropdown-item text-light font-weight-bold" href="{{url('mahasiswa/delete')}}/{{$mahasiswa->id}}">Delete</a>
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
        <div class="bg-default p-3">{{$mhs->links()}}</div>  
      </div>
    </div>
  </div>
  
@endsection