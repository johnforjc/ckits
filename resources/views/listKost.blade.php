@extends('layouts.app')

@section('content')
@foreach ($kosts as $kost)   
    <div class="list-border">
        <div class="list-box">
            <img class='list-box-photo' src="/storage/image/{{$kost->foto_kos}}" alt="{{$kost->nama_tempat_kos}}">
            <div class="list-box-text">
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{ __('Nama Kos') }}</label>   
                    <div class="col-md-6"> {{$kost->nama_tempat_kos}}</div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{ __('Alamat Kos') }}</label>   
                    <div class="col-md-6"> {{$kost->alamat}}</div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{ __('Jumlah Kamar') }}</label>   
                    <div class="col-md-6"> {{$kost->kamar_tersedia}}</div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{ __('Harga Kos') }}</label>   
                    <div class="col-md-6"> {{$kost->harga}}</div>
                </div>
                <div class="form-group row">
                    <label class="col-md-4 col-form-label text-md-right">{{ __('Keterangan') }}</label>   
                    <div class="col-md-6">>{{$kost->keterangan_tempat_kos}}</div>
                </div>
            </div>
        </div>
    </div>               
@endforeach
@endsection