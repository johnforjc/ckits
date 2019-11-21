@extends('layouts.app')

@section('content')
@if(Auth::guest())
    <script type="text/javascript">
        window.location = "/";
    </script>

@elseif (Auth::user()->id != $users->id && Auth::user()->status != '0')
    <script type="text/javascript">
        window.location = "/";
    </script>

@else
<h1 style="text-align:center">Edit Profil User</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Profil Anda') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ action('UsersController@update', $users->id) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nama_user" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>   

                            <div class="col-md-6">
                                <input id="nama_user" type="text" class="form-control" name="nama_user" value="{{ $users->nama_user }}" required autocomplete="nama_user" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $users->email }}" required autocomplete="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="no_telp" class="col-md-4 col-form-label text-md-right">{{ __('Nomor telepon') }}</label>

                            <div class="col-md-6">
                                <input id="no_telp" type="text" class="form-control" name="no_telp" value="{{ $users->no_telp }}" required autocomplete="no_telp">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                            <input type="hidden" name="_method" value="PUT">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
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
