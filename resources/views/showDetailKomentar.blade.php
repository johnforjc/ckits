@extends('layouts.app')

@section('content')

@if(Auth::guest())
    <script type="text/javascript">
        window.location = "/";
    </script>

@elseif (Auth::user()->id != $komentar->id && Auth::user()->status != '0')
    <script type="text/javascript">
        window.location = "/";
    </script>

@else
<h1>Detail Komentar</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-body template-komentar">
                <div class="form-group row">
                    <label class="col-md-5 col-form-label">Nama User</label>
                    <label class="col-md-5 col-form-label">: {{$users->nama_user}}</label>
                </div>
                <div class="form-group row">
                    <label class="col-md-5 col-form-label">Nama Tempat Kos</label>
                    <label class="col-md-5 col-form-label">: {{$kosts->nama_tempat_kos}}</label>
                </div>
                <div class="form-group row">
                    <label class="col-md-5 col-form-label">Rating</label>
                    <label class="col-md-5 col-form-label bintang">:
                        <label class="output"></label>{{$komentar->rating}}
                    </label>
                </div>
                <div class="form-group row">
                    <label class="col-md-5 col-form-label">Komentar</label>
                    <label class="col-md-5 col-form-label">: {{$komentar->isi_komentar}}</label>
                </div>
                @if (Auth::user()->id == $komentar->id)
                <div class="col-md-5 offset-md-4">
                    <span>
                        <a href="/komentar/{{$komentar->id_komentar}}/edit">
                            <button class="btn btn-primary">
                                {{ __('Edit Komentar') }}
                            </button>
                        </a>
                    </span>
                </div>  
                @endif
            </div>    
        </div>
    </div>
</div>
@endif
@endsection