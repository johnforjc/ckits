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
<h1 style="text-align:center">List User</h1>
    <table class="table">
        <tr class="tr">
            <th class="th">Nama User</th>
            <th class="th">Email User</th>
            <th class="th">Nomor Telepon</th>
            <th class="th">Status</th>
            <th class="th">Delete</th>
        </tr>
        @foreach ($users as $user)
            <tr class="tr">
                <td class="td"><a href="/users/{{ $user->id }}">{{$user->nama_user}}</a></td>
                <td class="td">{{$user->email}}</td>
                <td class="td">{{$user->no_telp}}</td>
                <td class="td">
                    @if ($user->status == '1')
                        Pencari Tempat Kos
                    @elseif ($user->status == '2')
                        Pemilik Tempat Kos
                    @else
                        Admin
                    @endif
                </td>
                <td class="td">
                    <form action="{{ action('UsersController@destroy', $user->id) }} " method="POST">
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