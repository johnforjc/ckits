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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 style="text-align:center">Profil User</h1>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-5 col-form-label">Nama User</label>
                        <label class="col-md-5 col-form-label">: {{$users->nama_user}}</label>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5 col-form-label">Email User</label>
                        <label class="col-md-5 col-form-label">: {{$users->email}}</label>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5 col-form-label">Nomor Telepon User</label>
                        <label class="col-md-5 col-form-label">: {{$users->no_telp}}</label>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5 col-form-label">Status User</label>
                        <label class="col-md-5 col-form-label">
                        @if ($users->status == '1')
                            : Pencari Tempat Kos
                        @elseif ($users->status == '2')
                            : Pemilik Tempat Kos
                        @else
                            : Admin
                        @endif
                        </label>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-5">
                        @if (Auth::user()->status == '0')
                            <span style="float:right">
                                <a href="/users">
                                    <button class="btn btn-primary">
                                        {{ __('List User') }}
                                    </button>
                                </a>
                            </span>
                        @endif
                        </div>
                        <div class="col-md-5">
                            <span>
                                <a href="/users/{{$users->id}}/edit">
                                    <button class="btn btn-primary">
                                        {{ __('Edit Profil') }}
                                    </button>
                                </a>
                            </span>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection