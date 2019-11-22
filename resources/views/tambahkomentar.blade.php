@extends('layouts.app')

@section('content')

@if(Auth::guest())
    <script type="text/javascript">
        window.location = "/home";
    </script>
@elseif(Auth::user()->id == $kost->id)
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

                            <div class="col-md-4">
                                <div class="rating">
                                    <input type="radio" name="rating" id="star5" value='5'><label for="star5"></label>
                                    <input type="radio" name="rating" id="star4" value='4'><label for="star4"></label>
                                    <input type="radio" name="rating" id="star3" value='3'><label for="star3"></label>
                                    <input type="radio" name="rating" id="star2" value='2'><label for="star2"></label>
                                    <input type="radio" name="rating" id="star1" value='1'><label for="star1"></label>
                                </div>
                            </div>
                        </div>
                        
                        <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
                        <input type="hidden" name="id_kost" value="{{$kost->id_tempat_kos}}">

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="syarat" id="syarat" required>

                                    <a href="/syaratketentuan">
                                        {{ __('Saya menyetujui syarat dan ketentuan') }}
                                    </a>
                                </div>
                            </div>
                        </div>

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
@endif
@endsection
