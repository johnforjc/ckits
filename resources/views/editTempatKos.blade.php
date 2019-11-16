@extends('layouts.app')

@section('content')
<h1 style="text-align:center">Edit Profil Tempat Kos</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Profil Tempat Kos') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ action('TempatKosController@update', $kosts->id_tempat_kos) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>   

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $kosts->nama_tempat_kos }}" required autocomplete="name" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                        <div class="col-md-6">
                            <input id="alamat" type="alamat" class="form-control" name="alamat" value="{{ $kosts->alamat }}" required autocomplete="alamat">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="kamar" class="col-md-4 col-form-label text-md-right">{{ __('Jumlah kamar') }}</label>

                        <div class="col-md-6">
                            <input id="kamar" type="text" class="form-control" name="kamar" value="{{ $kosts->kamar_tersedia }}" required autocomplete="kamar">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="keterangan" class="col-md-4 col-form-label text-md-right">{{ __('Keterangan') }}</label>

                        <div class="col-md-6">
                            <input id="keterangan" type="text" class="form-control" name="keterangan" value="{{ $kosts->keterangan_tempat_kos }}" required autocomplete="keterangan">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="foto" class="col-md-4 col-form-label text-md-right">{{ __('Foto') }}</label>

                        <div class="col-md-4 btn">
                            <input id="foto" type="file" name="foto" value="{{ $kosts->foto_kos }}">
                        </div>
                    </div>

                    <input type="hidden" name="status" value="{{ $kosts->status_promosi }}">

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                            <input type="hidden" name="_method" value="PUT">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit Tempat Kos') }}
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
