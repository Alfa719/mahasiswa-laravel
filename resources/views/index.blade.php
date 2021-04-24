@extends('layouts.main')

@section('title')
    Dashboard
@endsection
@section('content')
<div class="header bg-default pb-6 pt-6">
    <div class="container-fluid">
      <div class="header-body">
        <!-- Card stats -->
        <div class="row pb-7">
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Mahasiswa</h5>
                    <span class="h2 font-weight-bold mb-0">{{$mahasiswa->count()}}</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                      <i class="ni ni-single-02"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Dosen</h5>
                    <span class="h2 font-weight-bold mb-0">{{$dosen->count()}}</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                      <i class="ni ni-single-02"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Program Studi</h5>
                    <span class="h2 font-weight-bold mb-0">{{$prodi->count()}}</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                      <i class="ni ni-chart-pie-35"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Mata Kuliah</h5>
                    <span class="h2 font-weight-bold mb-0">{{$matkul->count()}}</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                      <i class="ni ni-books"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
              <canvas id="dashboardChart"></canvas>
          </div>
          <div class="col-md-6">
              <canvas id="dashboardChart2"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
  <script>
    var ctx = document.getElementById("dashboardChart").getContext('2d');
    var dashboardChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ["Mahasiswa", "Dosen"],
        datasets: [{
          label: 'Presentase Data',
          data: [{{$mahasiswa->count()}}, {{$dosen->count()}}],
          backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          ],
          borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true
            }
          }]
        }
      }
    });
    var ctx2 = document.getElementById("dashboardChart2").getContext('2d');
    var dashboardChart2 = new Chart(ctx2, {
      type: 'bar',
      data: {
        labels: ["Pria", "Wanita"],
        datasets: [{
          label: 'Jenis Kelamin',
          data: [{{$mahasiswa->where('jenis_kelamin', 'Laki-Laki')->count()}}, {{$mahasiswa->where('jenis_kelamin', 'Perempuan')->count()}}],
          backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          ],
          borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true
            }
          }]
        }
      }
    });
  </script>
@endsection