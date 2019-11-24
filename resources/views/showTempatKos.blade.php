@extends('layouts.app')

@section('content')

@if(Auth::guest())
    <script type="text/javascript">
        window.location = "/";
    </script>
@else
<h1>Profil Tempat Kos</h1>
<div class="container white-font">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card-body template-kost">
            <img class="template-kos-image col-md-12" src="/storage/image/{{$kosts->foto_kos}}">
            <div class="form-group row">
                <label class="col-md-5 col-form-label">Nama Tempat Kos</label>
                <label class="col-md-5 col-form-label">: {{$kosts->nama_tempat_kos}}</label>
            </div>
            <div class="form-group row">
                <label class="col-md-5 col-form-label">Nama Pemilik Tempat Kos</label>
                <label class="col-md-5 col-form-label">: {{$users->nama_user}}</label>
            </div>
            <div class="form-group row">
                <label class="col-md-5 col-form-label">Nomor Telepon Pemilik Tempat Kos</label>
                <label class="col-md-5 col-form-label">: {{$users->no_telp}}</label>
            </div>
            <div class="form-group row">
                <label class="col-md-5 col-form-label">Alamat</label>
                <label class="col-md-5 col-form-label">: {{$kosts->alamat}}</label>
            </div>
            <div class="form-group row">
                <label class="col-md-5 col-form-label">Jumlah Kamar Yang Tersedia</label>
                <label class="col-md-5 col-form-label">: {{$kosts->kamar_tersedia}}</label>
            </div>
            <div class="form-group row">
                <label class="col-md-5 col-form-label">Harga</label>
                <label class="col-md-5 col-form-label">: {{$kosts->harga}}</label>
            </div>
            <div class="form-group row">
                <label class="col-md-5 col-form-label">Rating Rata - Rata</label>
                <label class="col-md-5 col-form-label bintang">:
                    <label class="output"></label>{{$kosts->rating}}
                </label>
            </div>
            @if(Auth::user()->id == $kosts->id || Auth::user()->status == 0)
            <div class="form-group row">
                <label class="col-md-5 col-form-label">Status Promosi</label>
                <label class="col-md-5 col-form-label">
                @if($kosts->status_promosi == 1)
                    : Terdaftarkan
                @else
                    : Tidak Terdaftar
                @endif
                </label>
            </div>
            <div class="form-group row">
                <label class="col-md-5 col-form-label">Promosi Berlaku Sampai</label>
                <label class="col-md-5 col-form-label">
                @if($kosts->expired_promotion)
                    : {{$kosts->expired_promotion}}
                @else
                    : Tidak Ada
                @endif
                </label>
            </div>
            @endif
            <div class="form-group row">
                <label class="col-md-5 col-form-label">Keterangan</label>
                <label class="col-md-5 col-form-label">: {{$kosts->keterangan_tempat_kos}}</label>
            </div>
            <div class="form-group row mb-0">
                @if(Auth::user()->id == $kosts->id)
                    <div class="col-md-5">
                    @if($kosts->status_promosi == 0)
                        <a href="/pembayaran/create/{{$kosts->id_tempat_kos}}">
                            <button class="btn btn-primary">
                                {{ __('Daftar Promosi Tempat Kos') }}
                            </button>
                        </a>
                    @endif
                    </div>
                <div class="col-md-5">
                    <a href="/tempatkos/{{$kosts->id_tempat_kos}}/edit">
                        <button class="btn btn-primary">
                            {{ __('Edit Tempat Kos') }}
                        </button>
                    </a>
                </div>
                @elseif(Auth::user()->status == 1)
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
    <div class="row justify-content-center">
        <div class="komentarcontainer">
            <br>
            <h2 style="text-align:center">Komentar</h2>
            <div class="card-body">
                @if($kosts->komentar->count() > 0)
                    @for($i=0; $i<$kosts->komentar->count(); $i++)
                    <div class="list-komentar-row">
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label">Nama</label>
                            <label class="col-md-6 col-form-label">: {{$data[$i]['nama_user']}}</label>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label">Rating</label>
                            <label class="col-md-6 col-form-label bintang">:
                                <label class="output"></label>{{$kosts->komentar[$i]['rating']}}
                            </label>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label">Komentar</label>
                            <label class="col-md-6 col-form-label">: {{$kosts->komentar[$i]['isi_komentar']}}</label>
                        </div>
                        @if (Auth::user()->id == $data[$i]['id'])
                        <div class="form-group row">
                            <div class="col-md-4">
                                <form action="{{ action('KomentarsController@destroy', $kosts->komentar[$i]['id_komentar']) }} " method="POST">
                                    <input type="hidden" name="_method" value="Delete">
                                    <button type="submit" class="btn btn-danger" value="Delete">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        {{ __('DELETE') }}
                                    </button>
                                </form>
                            </div>
                            <div class="col-md-5">
                                <a href="/komentar/{{$kosts->komentar[$i]['id_komentar']}}/edit">
                                    <button class="btn btn-primary">
                                        {{ __('Edit Komentar') }}
                                    </button>
                                </a>
                            </div>
                        </div>
                          
                        @endif
                    </div>    
                    @endfor
                @else
                    <h6 style="text-align:center">Tidak ada Komentar ditemukan</h6>
                @endif
            </div>
        </div>
    </div>
</div>
    

@endif

@endsection