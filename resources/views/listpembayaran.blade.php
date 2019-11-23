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
<h1>List Pembayaran</h1>
<table class="table">
    <tr class="tr">
        <th class="th">ID Pembayaran</th>
        <th class="th">ID Tempat Kos</th>
        <th class="th">Valid</th>
        <th class="th">Jenis Promosi</th>
        <th class="th">Harga</th>
        <th class="th">Foto Bukti</th>
        <th class="th">Validasi</th>
        <th class="th">Delete</th>
    </tr>
    @foreach ($payments as $payment)
    <tr class="tr">
        <td class="td">{{$payment->id_pembayaran}}</a></td>
        <td class="td">{{$payment->id_tempat_kos}}</td>
        <td class="td">{{$payment->valid}}</td>
        <td class="td">{{$payment->jenis_promosi}}</td>
        <td class="td">{{$payment->harga}}</td>
        <td class="td">
            @if({{$payment->foto}} != "no_image.jpg")
                <img src="/public/valid/{{$payment->foto}}" alt="">
            @endif
        </td>
        <td class="td">
            <form action="{{ action('TempatKosController@show', $payment->id_tempat_kos) }} " method="POST">
                <input type="hidden" name="_method" value="Validasi">
                <button type="submit" class="btn btn-primary" value="Validasi">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {{ __('Validasi') }}
                </button>
            </form>
        </td>
        <td class="td">
            <form action="{{ action('PembayaransController@destroy', $payment->id_pembayaran) }} " method="POST">
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