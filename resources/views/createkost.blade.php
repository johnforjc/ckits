@extends('layouts.app')

@section('content')

@if(Auth::guest())
    <script type="text/javascript">
        window.location = "/home";
    </script>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Daftarkan Tempat Kos Anda!') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ action('TempatKosController@store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>   

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                <input id="alamat" type="alamat" class="form-control" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kamar" class="col-md-4 col-form-label text-md-right">{{ __('Jumlah kamar') }}</label>

                            <div class="col-md-6">
                                <input id="kamar" type="text" class="form-control" name="kamar" value="{{ old('kamar') }}" required autocomplete="kamar">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="harga" class="col-md-4 col-form-label text-md-right">{{ __('Harga') }}</label>

                            <div class="col-md-6">
                                <input id="harga" type="text" class="form-control" name="harga" value="{{ old('harga') }}" required autocomplete="harga">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="keterangan" class="col-md-4 col-form-label text-md-right">{{ __('Keterangan') }}</label>

                            <div class="col-md-6">
                                <input id="keterangan" type="text" class="form-control" name="keterangan" value="{{ old('keterangan') }}" required autocomplete="keterangan">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="foto" class="col-md-4 col-form-label text-md-right">{{ __('Foto') }}</label>

                            <div class="col-md-4 btn">
                                <input id="foto" type="file" name="foto" value="{{ old('foto') }}" required>
                            </div>
                        </div>

                        <input type="hidden" name="status" value="0">

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" method="_POST">
                                    {{ __('Daftarkan') }}
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
