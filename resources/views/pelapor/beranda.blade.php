<x-pelapor>

<a href="/users/show/{{auth()->user()->id}}">
    <div>
        <h1> {{auth()->user()->username}}</h1>
        <h3>{{auth()->user()->telepon}}</h3>
        <p class="underline">Ketuk untuk lihat profil</p>
    </div>
</a>

<a href="/aduan/create">Buat aduan</a>

<h1>Aduan saya</h1>
@foreach ($aduans as $aduan)
<a href="/aduan/show/{{$aduan->id}}">
    <div class="outline">
        <h1> {{$aduan->judul}} </h1>
        <p> {{$aduan->deskripsi}}</p>
    </div>
</a>
@endforeach

<form action="/logout" method="POST">
    @csrf
    <button type="submit" class="btn btn-primary">Logout sementara</button>
</form>
</x-pelapor>