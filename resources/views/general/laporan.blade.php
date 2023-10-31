<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Laporan</title>
</head>
<body>
    <div>
        <h1>LaporIND</h1>
    </div>
    <h1>Laporan Aduan {{$periode}}</h1>
    <p>Per: {{$time}}</p>

    @foreach ($aduan as $item)
        <p> {{var_dump($item)}} </p>
    @endforeach
</body>
</html>