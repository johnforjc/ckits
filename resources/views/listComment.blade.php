@extends('layouts.app')

@section('content')

@if(Auth::guest())
    <script type="text/javascript">
        window.location = "/";
    </script>
@elseif (Auth::user()->status != '0')
    <script type="text/javascript">
        window.location = "/";
    </script>

@else
<h1 style="text-align:center">List Komentar</h1>
<table class="table">
    <tr class="tr">
        <th class="th">Nama Penyewa Tempat Kos</th>
        <th class="th">Nama Tempat Kos</th>
        <th class="th">Rating</th>
        <th class="th">Komentar</th>
        <th class="th">Delete</th>
    </tr>
    @foreach ($comments as $comment)   
    <tr class="tr">
        <td class="td"><a href="/users/{{ $users[$comment->id-1]->id }}">{{$users[$comment->id-1]->nama_user}}</a></td>
        <td class="td"><a href="/tempatkos/{{ $kosts[$comment->tempat_kos_id_tempat_kos-1]->id_tempat_kos }}">{{$kosts[$comment->tempat_kos_id_tempat_kos-1]->nama_tempat_kos}}</a></td>
        <td class="td"><label class="col-md-5 col-form-label bintang">
                    <label class="output"></label>{{$comment->rating}}
                </label></td>
        <td class="td">{{$comment->isi_komentar}}</td>
    </tr>                   
    @endforeach
</table>
@endif
@endsection