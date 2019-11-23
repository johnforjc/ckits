@extends('layouts.app')

@section('content')

@if(Auth::guest())
    <script type="text/javascript">
        window.location = "/";
    </script>

@elseif (Auth::user()->id != $kost->id && Auth::user()->status != '0')
    <script type="text/javascript">
        window.location = "/";
    </script>

@else
<h1 style="text-align:center">Pembayaran</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Lakukan Pembayaran') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ action('PembayaransController@update', $payment->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-12 col-form-label text-md-center">Lakukan pembayaran dengan mengirimkan sesuai nilai yang tertera</label>   
                    </div>

                    <div class="form-group row">
                        <label class="col-md-6 col-form-label">Nama Tempat Kos</label>
                        <label class="col-md-6 col-form-label">{{ $kost->nama_tempat_kos }}</label>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-6 col-form-label">Harga</label>
                        <label class="col-md-6 col-form-label">{{ $payment->harga }}</label>
                    </div>

                    <div class="form-group row">
                        <label for="kamar" class="col-md-4 col-form-label text-md-right">Upload bukti pembayaran</label>
                    </div>

                    <div class="form-group row">
                        <label for="foto" class="col-md-4 col-form-label text-md-right">{{ __('Foto') }}</label>

                        <div class="col-md-4 btn">
                            <input id="foto" type="file" name="foto" value="{{ old('foto') }}">
                        </div>
                    </div>

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
@endif
@endsection
