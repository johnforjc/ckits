@extends('layouts.app')

@section('content')

<h1 style="text-align:center">List Tempat Kos</h1>


<form method="POST" action="{{ action('TempatKosController@clustering') }}" enctype="multipart/form-data">
    @csrf
    <div class="search-box">
        <input class="search-txt" type="text" placeholder="Harga Maksimum" name="harga_max">
        <input class="search-txt" type="text" placeholder="Rating Minimum" name="rating_min">
        <!-- <a action="{{ action('TempatKosController@clustering') }}" class="search-btn" type="submit" method="POST">
            &#xf002;
        </a> -->
        <button type="submit" class="btn btn-primary search-btn">
            &#xf002;
        </button>
    </div>
    
</form>


<div class="list-border">
@foreach ($kosts as $kost)  
    <a href="tempatkos/{{$kost->id_tempat_kos}}">
    <div class="list-box">
        <img class='list-box-photo' src="/storage/image/{{$kost->foto_kos}}" alt="{{$kost->nama_tempat_kos}}">
        <div class="list-box-text">
            <div class="form-group row">
                <label class="col-md-4 col-form-label">{{ __('Nama Kos') }}</label>   
                <label class="col-md-6 col-form-label">: {{$kost->nama_tempat_kos}}</label>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">{{ __('Alamat Kos') }}</label>   
                <label class="col-md-6 col-form-label">: {{$kost->alamat}}</label>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">{{ __('Jumlah Kamar') }}</label>   
                <label class="col-md-6 col-form-label">: {{$kost->kamar_tersedia}}</label>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">{{ __('Harga Kos') }}</label>   
                <label class="col-md-6 col-form-label">: {{$kost->harga}}</label>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label">{{ __('Keterangan') }}</label>   
                <label class="col-md-6 col-form-label">: {{$kost->keterangan_tempat_kos}}</label>
            </div>
        </div>
    </div>
    </a> 
@endforeach
</div>               

@endsection