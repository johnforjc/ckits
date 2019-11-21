@extends('layouts.app')

@section('content')

<table class="table">
    <tr class="tr">
        <th class="th">Nama Kos</th>
        <th class="th">Alamat Kos</th>
        <th class="th">Jumlah Kamar</th>
        <th class="th">Harga</th>
        <th class="th">Keterangan</th>
        <th class="th">Foto</th>
    </tr>
    @foreach ($kosts as $kost)   
        <tr class="tr">
            <td class="td"> <a href="tempatkos/{{$kost->id_tempat_kos}}">{{$kost->nama_tempat_kos}}</a></td>
            <td class="td">{{$kost->alamat}}</td>
            <td class="td">{{$kost->kamar_tersedia}}</td>
            <td class="td">{{$kost->harga}}</td>
            <td class="td">{{$kost->keterangan_tempat_kos}}</td>
            <td class="td"><img src="/storage/image/{{$kost->foto_kos}}" alt="{{$kost->nama_tempat_kos}}" height="400" weight="400"></td>
        </tr>                   
    @endforeach
</table>

@endsection