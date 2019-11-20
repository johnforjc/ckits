@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ceritakan Pengalamanmu Di Tempat Kos Ini') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ action('KomentarsController@store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="komentar" class="col-md-4 col-form-label text-md-right">{{ __('Komentar') }}</label>   

                            <div class="col-md-6">
                                <input id="komentar" type="text" class="form-control" name="komentar" value="{{ old('komentar') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rating" class="col-md-4 col-form-label text-md-right">{{ __('Rating') }}</label>

                            <div class="col-md-6">
                                <input id="rating" type="rating" class="form-control" name="rating" value="{{ old('rating') }}" required autocomplete="rating">
                            </div>
                        </div>
                        
                        <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
                        <input type="hidden" name="id_kost" value="id_kos">

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" method="_POST">
                                    {{ __('Tambah Komentar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
