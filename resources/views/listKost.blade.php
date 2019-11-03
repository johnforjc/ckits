<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table>
    @foreach ($kosts as $kost)
        <tr>{{$kost->nama_tempat_kos}}</tr>
        <tr>{{$kost->alamat}}</tr>
        <tr>{{$kost->kamar_tersedia}}</tr>
    @endforeach
</table>
    
</body>
</html>