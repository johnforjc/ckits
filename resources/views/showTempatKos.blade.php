@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h1 style="text-align:center">Profil Tempat Kos</h1>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-md-5 col-form-label">Nama Tempat Kos</label>
                <label class="col-md-5 col-form-label">: {{$kosts->nama_tempat_kos}}</label>
            </div>
            <div class="form-group row">
                <label class="col-md-5 col-form-label">Alamat</label>
                <label class="col-md-5 col-form-label">: {{$kosts->alamat}}</label>
            </div>
            <div class="form-group row">
                <label class="col-md-5 col-form-label">Jumlah Kamar</label>
                <label class="col-md-5 col-form-label">: {{$kosts->kamar_tersedia}}</label>
            </div>
            <div class="form-group row">
                <label class="col-md-5 col-form-label">Harga</label>
                <label class="col-md-5 col-form-label">: {{$kosts->harga}}</label>
            </div>
            @if(Auth::user()->status=='2')
            <div class="form-group row">
                <label class="col-md-5 col-form-label">Status Promosi</label>
                <label class="col-md-5 col-form-label">: {{$kosts->status_promosi}}</label>
            </div>
            @endif
            <div class="form-group row">
                <label class="col-md-5 col-form-label">Keterangan</label>
                <label class="col-md-5 col-form-label">: {{$kosts->keterangan_tempat_kos}}</label>
            </div>
            <div class="form-group row mb-0">
            @if(Auth::user()->status=='2')
                <div class="col-md-5 offset-md-5">
                    <button class="btn btn-primary">
                        <a href="/tempatkos/{{$kosts->id_tempat_kos}}/edit">{{ __('Edit Tempat Kos') }}</a>
                    </button>
                </div>
            @elseif(Auth::user()->status=='1')
            <div class="col-md-5 offset-md-5">
                    <button class="btn btn-primary">
                        <a href="/komentar/create/{{$kosts->id_tempat_kos}}">{{ __('Beri Komentar') }}</a>
                    </button>
                </div>
            @endif
            </div>
        </div>
    </div>
</div>
@endsection