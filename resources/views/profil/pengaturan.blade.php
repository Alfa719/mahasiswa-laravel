@extends('layouts.main')

@section('title', 'Pengaturan Akun')
@section('content')
<div class="header pb-6 d-flex align-items-center bg-gradient-default" style="min-height: 400px; background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-8"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
      <div class="row">
        <div class="col-lg-10 col-md-10">
          <h1 class="display-2 text-white">Halo Muhammad Nurul Hidayatullah</h1>
          <p class="text-white mt-0 mb-5">Ini halaman profil mu. Kamu dapat mengubah data profil kamu di bawah ini.</p>
        </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-4 order-xl-2">
        <div class="card card-profile">
          <img src="../assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
          <div class="row justify-content-center">
            <div class="col-lg-3 order-lg-2">
              <div class="card-profile-image">
                <a href="#">
                  <img src="../assets/img/theme/team-1.jpg" class="rounded-circle">
                </a>
              </div>
            </div>
          </div>
          <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4 bg-default">
          </div>
          <div class="card-body pt-0 bg-default text-light">
            <div class="row">
              <div class="col">
                <div class="card-profile-stats d-flex justify-content-center">
                  
                </div>
              </div>
            </div>
            <div class="text-center">
              <h5 class="h3 text-light">
                Muhammad Nurul Hidayatullah
              </h5>
              <div class="h5 font-weight-300 text-light">
                <i class="ni location_pin mr-2"></i>Pontianak, Kalimantan Barat
              </div>
              <div class="h5 mt-4 text-light">
                <i class="ni business_briefcase-24 mr-2"></i>Teknologi Informasi - Fakultas Teknik
              </div>
              <div>
                <i class="ni education_hat mr-2"></i>Universitas Nurul Jadid
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-8 order-xl-1">
        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">Edit profile </h3>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form>
              <h6 class="heading-small text-muted mb-4">Informasi Pengguna</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Username</label>
                      <input type="text" id="input-username" class="form-control" placeholder="Username" value="lucky.jesse" readonly>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-email">Nama</label>
                      <input type="email" id="input-email" class="form-control" placeholder="jesse@example.com">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-first-name">Password Baru</label>
                      <input type="password" id="input-first-name" class="form-control" placeholder="First name" value="Lucky">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-last-name">Verifikasi Password</label>
                      <input type="password" id="input-last-name" class="form-control" placeholder="Last name" value="Jesse">
                    </div>
                  </div>
                </div>
              </div>
              <hr class="my-4" />
              <!-- Address -->
              <h6 class="heading-small text-muted mb-4">Contact information</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-city">Kabupaten</label>
                      <input type="text" id="input-city" class="form-control" placeholder="City" value="New York">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-country">Provinsi</label>
                      <input type="text" id="input-country" class="form-control" placeholder="Country" value="United States">
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                      <button type="submit" class="btn btn-warning btn-block">Update</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection