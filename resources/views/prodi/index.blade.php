@extends('layouts.main')

@section('title', 'Dashboard Program Studi')
@section('content')
    <div class="row">
        <div class="col">
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
                <div class="card-header bg-transparent border-0">
                    <a href="{{route('TambahProdi')}}">
                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow float-right">
                            <i class="ni ni-fat-add"></i>
                        </div>
                    </a>
                    <h3 class="text-white mb-0">Data Program Studi</h3>
                </div>
            <div class="table-responsive">
                <table class="table align-items-center table-dark table-flush">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="sort" data-sort="budget">No</th>
                            <th scope="col" class="sort" data-sort="name">Program Studi</th>
                            
                            <th scope="col" class="sort" data-sort="status">Status</th>
                            <th scope="col">Kepala</th>
                            <th scope="col" class="sort" data-sort="completion">Statistik</th>
                            <th></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                <tbody class="list">
                    @foreach ($prodi as $p)
                    <tr>
                        <td class="budget">{{$loop->iteration}}</td>
                        <th scope="row">
                            <div class="media align-items-center">
                                <a href="" class="avatar rounded-circle mr-3">
                                    <img alt="None" src="{{asset('images')}}/prodi/{{$p->logo}}">
                                </a>
                                <div class="media-body">
                                    <span class="name mb-0 text-sm">{{$p->nama_prodi}}</span>
                                </div>
                            </div>
                        </th>    
                        <td>
                            <span class="badge badge-dot mr-4">
                                <i class="{{ $p->status == 'Aktif' ? 'bg-green' : 'bg-red' }}"></i>
                                <span class="status">{{$p->status}}</span>
                            </span>
                        </td>
                        <td>
                            <div class="avatar-group">
                                @foreach ($dosen as $d)
                                <a href="" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="{{$p->dosen_id != $d->id ? 'Tidak ada dosen': $p->dosen->nama}}">
                                    <img alt="None" src="{{asset('images')}}/dosen/{{$p->dosen_id != $d->id ? '': $p->dosen->gambar}}">
                                </a>
                                @endforeach
                            </div>
                        </td>
                        <td>
                        <div class="d-flex align-items-center">
                            @php
                                $a = $mhs->where('prodi_id', $p->id)->count() / $total * 100;
                            @endphp
                            <span class="completion">
                                {{ number_format((float)$a, 1, '.', '') }}%
                            </span>
                            
                        </div>
                        <td>
                            <div>
                                <div class="progress">
                                    <div class="progress-bar {{ $a < 50 ? 'bg-orange' : 'bg-green' }}" role="progressbar" aria-valuenow="{{$a}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$a}}%;"></div>
                                </div>
                            </div>
                        </td>
                        </td>
                        <td class="text-right">
                        <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="{{url('prodi/edit')}}/{{$p->id}}">Edit</a>
                            <a class="dropdown-item" href="{{url('prodi/delete')}}/{{$p->id}}">Delete</a>
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
            <div class="bg-default p-3">{{$prodi->links()}}</div>  
            </div>
        </div>
            </div>
            </div>
    </div>
@endsection