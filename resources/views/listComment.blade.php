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
<h1>List Komentar</h1>
<table class="table">
    <tr class="tr">
        <th class="th">ID Penyewa Tempat Kos</th>
        <th class="th">ID Tempat Kos</th>
        <th class="th">Rating</th>
        <th class="th">Komentar</th>
        <th class="th">Delete</th>
    </tr>
    @foreach ($comments as $comment)   
    <tr class="tr">
        <td class="td"><a href="/users/{{ $comment->id }}">{{$comment->id}}</a></td>
        <td class="td"><a href="/tempatkos/{{ $comment->tempat_kos_id_tempat_kos }}">{{$comment->tempat_kos_id_tempat_kos}}</a></td>
        <td class="td">{{$comment->rating}}</td>
        <td class="td">{{$comment->isi_komentar}}</td>
        <td class="td">
            <form action="{{ action('KomentarsController@destroy', $comment->id_komentar) }} " method="POST">
                <input type="hidden" name="_method" value="Delete">
                <button type="submit" class="btn btn-danger" value="Delete">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {{ __('DELETE') }}
                </button>
            </form>
        </td>
    </tr>                   
    @endforeach
</table>
@endif
@endsection