@extends('layouts.app')

@section('content')
<h1 style="text-align:center">Profil User</h1>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Nama User</label>
        <label class="col-md-4 col-form-label">: {{$users->nama_user}}</label>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Email User</label>
        <label class="col-md-4 col-form-label">: {{$users->email}}</label>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Nomor Telepon User</label>
        <label class="col-md-4 col-form-label">: {{$users->no_telp}}</label>
    </div>
    <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">Status User</label>
        <label class="col-md-4 col-form-label">
        @if ($users->status == '1')
            : Pencari Kos
        @elseif ($users->status == '2')
            : Pemilik Kos
        @else
            : Admin
        @endif
        </label>
    </div>
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button class="btn btn-primary">
                <a href="/users/{{$users->id}}/edit">{{ __('Edit Profil') }}</a>
            </button>
        </div>
    </div>
@endsection