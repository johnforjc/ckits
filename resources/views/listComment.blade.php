@extends('layouts.app')

@section('content')

@if(Auth::guest())
    <script type="text/javascript">
        window.location = "/home";
    </script>

@else
<table class="table">
    <tr class="tr">
        <th class="th">Komentar</th>
        <th class="th">Rating</th>
    </tr>
    @foreach ($comments as $comment)   
        <tr class="tr">
            <td class="td">{{$comment->isi_komentar}}</td>
            <td class="td">{{$comment->rating}}</td>
        </tr>                   
    @endforeach
</table>
@endif
@endsection