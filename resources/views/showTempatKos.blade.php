@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 style="text-align:center">Profil Tempat Kos</h1>
            <div class="card-body col-md-8">
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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 style="text-align:center">Komentar</h2>
            <div class="card-body col-md-8">
                @if($kosts->komentar->count() > 0)
                    @for($i=0; $i<$kosts->komentar->count(); $i++)
                        <div class="form-group row">
                            <label class="col-md-5 col-form-label">{{$data[$i]['nama_user']}}</label>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-5 col-form-label">{{$kosts->komentar[$i]['isi_komentar']}}</label>
                        </div>
                    @endfor
                @else
                <div class="form-group row">
                    <h6>Tidak ada Komentar ditemukan</h6>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection