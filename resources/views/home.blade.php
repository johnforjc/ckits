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
      <p class="masthead-subheading font-weight-light mb-0">Cari Kos sekitar Institut Teknologi Sepuluh Nopember</p>

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
            @foreach ($kosts as $kost) 
                <div class="col-md-6 col-lg-4">
                    <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal1">
                        <a href="/tempatkos/{{$kost->id_tempat_kos}}">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                          <div class="portfolio-item-caption-content text-center text-white">
                              <img class="masthead-avatar mb-0" src="img/portfolio/arrow.png" alt="" style="width:100px">
                          </div>
                        </div>
                        <img class='list-box-photo' src="/storage/image/{{$kost->foto_kos}}" alt="{{$kost->nama_tempat_kos}}">
                        <div class="list-box-text">
                            <div class="form-group row">
                                <label class="col-md-5 col-form-label">{{ __('Nama Tempat Kos') }}</label>   
                                <label class="col-md-5 col-form-label">: {{$kost->nama_tempat_kos}}</label>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            @endforeach
        @endif
        <!-- /.row -->

    </div>
    <div class="text-center mt-4">
        <a class="btn btn-xl btn-outline-light" href="{{ route('list') }}">
        List Tempat Kos
        </a>
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
        <p> CKITS adalah aplikasi pencari tempat kos online berbasis web.
          Tujuan CKITS dibuat adalah untuk memberikan rekomendasi tempat kos 
          terfavorit yang ada di sekitar ITS kepada masyarakat yang sedang mencari 
          tempat kos di sekitar ITS sehingga tidak kesulitan mendapatkan informasi 
          kos secara detail di sekitar ITS tanpa harus langsung ke lokasi kos yang dicari tersebut. 
          CKITS juga memberikan kemudahan kepada para pemilik kos untuk mempromosikan kos melalui website. 
          Berikut ini adalah syarat dan ketentuan yang ada pada aplikasi kami.<p>
      </div>

      <!-- About Section Button -->
      <div class="text-center mt-4">
        <a class="btn btn-xl btn-outline-light" href="{{ url('syaratketentuan') }}">
          Syarat dan Ketentuan
        </a>
      </div>

    </div>
  </section>

@endsection