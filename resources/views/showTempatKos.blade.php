@extends('layouts.app')

@section('content')

@if(Auth::guest())
    <script type="text/javascript">
        window.location = "/";
    </script>
@else
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
                <label class="col-md-5 col-form-label">Nama Pemilik Tempat Kos</label>
                <label class="col-md-5 col-form-label">: {{$users->nama_user}}</label>
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
            @if(Auth::user()->id == $kosts->id)
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
                @if(Auth::user()->id == $kosts->id)
                    <div class="col-md-5 offset-md-5">
                        <a href="/tempatkos/{{$kosts->id_tempat_kos}}/edit">
                            <button class="btn btn-primary">
                                {{ __('Edit Tempat Kos') }}
                            </button>
                        </a>
                    </div>
                @elseif(Auth::user()->id == $kosts->id)
                    <div class="col-md-5 offset-md-5">
                        <a href="/komentar/create/{{$kosts->id_tempat_kos}}">
                            <button class="btn btn-primary">
                                {{ __('Beri Komentar') }}
                            </button>
                        </a>
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
@endif

@endsection