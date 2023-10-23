<x-pelapor>

<a href="">
    <div> 
        <h1> {{auth()->user()->username}}</h1>
        <h3>{{auth()->user()->telepon}}</h3>
        <p class="underline">Ketuk untuk lihat profil</p>
    </div>
</a>

<button>Buat aduan</button>

<h1>Aduan saya</h1>
@foreach ($aduans as $aduan)
    <div>
        <h1> {{$aduan->judul}} </h1>
    </div>
@endforeach
</x-pelapor>