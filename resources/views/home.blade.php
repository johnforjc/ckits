@extends('layouts.app')

@section('content')

<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">

      <!-- Masthead Avatar Image -->
      <img class="masthead-avatar mb-0" src="img/portfolio/cabinhome.png" alt="" style="width:450px">

      <!-- Masthead Heading -->
      <h1 class="masthead-heading text-uppercase mb-0">CKITS</h1>

      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
      </div>

      <!-- Masthead Subheading -->
      <p class="masthead-subheading font-weight-light mb-0">Cari Kos sekitar ITS</p>

    </div>

  </header>

  <!-- Portfolio Section -->
  <section class="page-section portfolio" id="portfolio">
    <div class="container">

      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Tempat Kos</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
      </div>
    <!-- Portfolio Grid Items -->
    <div class="row">

        <!-- Portfolio Item 1 -->
        @if($kosts->count() > 0)
            @for($i=0; $i<$kosts->count() and $i<6; $i++)
                <div class="col-md-6 col-lg-4">
                    <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal1">
                        <a href="tempatkos/{{$kosts[0]->id_tempat_kos}}">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                        <div class="portfolio-item-caption-content text-center text-white">
                            <img class="masthead-avatar mb-0" src="img/portfolio/arrow.png" alt="" style="width:100px">
                        </div>
                        </div>
                        <img class='list-box-photo' src="/storage/image/{{$kosts[0]->foto_kos}}" alt="{{$kosts[0]->nama_tempat_kos}}">
                        <div class="list-box-text">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label">{{ __('Nama Kos') }}</label>   
                                <label class="col-md-6 col-form-label">: {{$kosts[0]->nama_tempat_kos}}</label>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            @endfor
        @endif

        <div class="col-md-6 col-lg-4">
            <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal1">
              <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                <div class="portfolio-item-caption-content text-center text-white">
                    <img class="masthead-avatar mb-0" src="img/portfolio/arrow.png" alt="" style="width:100px">
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/cabin.png" alt="">
              <p>Gambar tempat kos</p>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal1">
              <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                <div class="portfolio-item-caption-content text-center text-white">
                  <i class="fas fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/cabin.png" alt="">
              <p>Gambar tempat kos</p>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal1">
              <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                <div class="portfolio-item-caption-content text-center text-white">
                  <i class="fas fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/cabin.png" alt="">
              <p>Gambar tempat kos</p>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal1">
              <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                <div class="portfolio-item-caption-content text-center text-white">
                  <i class="fas fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/cabin.png" alt="">
              <p>Gambar tempat kos</p>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal1">
              <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                <div class="portfolio-item-caption-content text-center text-white">
                  <i class="fas fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/cabin.png" alt="">
              <p>Gambar tempat kos </p>
            </div>
        </div>
      </div>
      <!-- /.row -->

    </div>
  </section>

  <!-- About Section -->
  <section class="page-section bg-primary text-white mb-0" id="about">
    <div class="container">

      <!-- About Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-white">About Us</h2>

      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
      </div>

      <!-- About Section Content -->
      <div class="row">
        <p> bacot aja deskripsi aplikasi <p>
      </div>

      <!-- About Section Button -->
      <div class="text-center mt-4">
        <a class="btn btn-xl btn-outline-light" href=#>
          Syarat dan Ketentuan
        </a>
      </div>

    </div>
  </section>

  <!-- Footer -->
  <footer class="footer text-center">
    <div class="container">
      <div class="row">

        <!-- Footer Location -->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Location</h4>
          <p class="lead mb-0">Rumah Patrick
            <br>Galaxy Bumi Permai J3-29</p>
        </div>

        <!-- Footer Social Icons -->
        <div class="col-lg-4 mb-5 mb-lg-0">
        {{-- kalo butuh teks ditengah --}}
        </div>

        <!-- Footer About Text -->
        <div class="col-lg-4">
            <h4 class="text-uppercase mb-4">Social Media</h4>
            <a class="btn btn-outline-light btn-social mx-1" href="#">
              
            </a>
            <a class="btn btn-outline-light btn-social mx-1" href="#">
              
            </a>
            <a class="btn btn-outline-light btn-social mx-1" href="#">
              
            </a>
            <a class="btn btn-outline-light btn-social mx-1" href="#">
             
            </a>
        </div>

      </div>
    </div>
  </footer>

@endsection