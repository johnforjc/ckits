@extends('layouts.app')

@section('content')

@if(Auth::guest())
    <script type="text/javascript">
        window.location = "/";
    </script>
@elseif(Auth::user()->status != '2')
    <script type="text/javascript">
        window.location = "/";
    </script>
@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Promosikan Tempat Kos Anda!') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ action('PembayaransController@store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="promosi" class="col-md-4 col-form-label text-md-right">{{ __('Pilih jenis promosi anda') }}</label>   

                            <div class="col-md-6" style="display:inline-block">
                                <input type="radio" name="promosi" value="1"> 6 bulan hanya dengan Rp. 150000 <br>
                                <input type="radio" name="promosi" value="2"> 12 bulan hanya dengan Rp. 250000 <br>
                                <input type="radio" name="promosi" value="3"> 24 bulan hanya dengan Rp. 450000
                            </div>
                            
                        </div>

                        <input type="hidden" class="form-control" name="id_kos" value="{{$kost->id_tempat_kos}}">

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="syarat" id="syarat" required>

                                    <a href="/syaratketentuan">
                                        {{ __('Saya menyetujui syarat dan ketentuan') }}
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" method="_POST">
                                    {{ __('Daftarkan') }}
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