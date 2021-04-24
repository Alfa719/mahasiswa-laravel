<style type="text/css">

  table tr td{
    font-size: 12pt;
    padding: 2px;
  }
  table tr th{
    font-size: 15pt;
    background: yellow;
    padding-top: 2px;
    padding-bottom: 2px;
  }
</style>
<table class="table align-items-center table-dark table-flush" border="1">
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
      <td scope="row">{{$loop->iteration}}</td>
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