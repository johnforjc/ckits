@extends('layouts.app')

@section('content')

@if(Auth::guest())
    <script type="text/javascript">
        window.location = "/home";
    </script>

@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ceritakan Pengalamanmu Di Tempat Kos Ini') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ action('KomentarsController@store', $komentars->id_komentar) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="komentar" class="col-md-4 col-form-label text-md-right">{{ __('Komentar') }}</label>   

                            <div class="col-md-6">
                                <input id="komentar" type="text" class="form-control" name="komentar" value="{{ $komentars->isi_komentar }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rating" class="col-md-4 col-form-label text-md-right">{{ __('Rating') }}</label>

                            <div class="col-md-6">
                                <input id="rating" type="rating" class="form-control" name="rating" value="{{ $komentars->rating }}" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="hidden" name="_method" value="PUT">
                                <button type="submit" class="btn btn-primary" method="_POST">
                                    {{ __('Edit Komentar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
