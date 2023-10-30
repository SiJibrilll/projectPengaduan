<x-admin>
    <h1>Ubah data {{$user->getRoleNames()->first()}} </h1>

    <form action="/users/update/{{$user->id}}" method="POST">
        @csrf
        <input name="username" placeholder="Masukan nama..." value="{{$user->username}}"/>

        @if ($user->hasRole('pelapor'))

        <input name="nik" placeholder="Masukan NIK" value="{{$user->nik}}"/>
        
        @elseif ($user->hasRole('petugas'))
        
        <input name="email" placeholder="Masukan email..." value="{{$user->email}}"/>

        @endif

        <input name="telepon" placeholder="Masukan telepon" value="{{$user->telepon}}"/>
        <input name="password" placeholder="Masukan password"/>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</x-admin>