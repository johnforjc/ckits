@extends('layouts.app')

@section('content')
    <h1 style="text-align:center">Profil User</h1>
        <div class="form-group row">
            <label class="col-md-4 col-form-label">Nama User</label>
            <label class="col-md-4 col-form-label">: {{$users->nama_user}}</label>
        </div>
        <div class="form-group row">
            <label class="col-md-4 col-form-label">Email User</label>
            <label class="col-md-4 col-form-label">: {{$users->email}}</label>
        </div>
        <div class="form-group row">
            <label class="col-md-4 col-form-label">Nomor Telepon User</label>
            <label class="col-md-4 col-form-label">: {{$users->no_telp}}</label>
        </div>
        <div class="form-group row">
            <label class="col-md-4 col-form-label">Status User</label>
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
@endsection