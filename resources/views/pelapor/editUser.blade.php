<x-pelapor>
    <h1>Ubah data profil</h1>

    <form action="/users/update/{{$user->id}}" method="POST">
        @csrf
        <input name="username" placeholder="Masukan nama..." value="{{$user->username}}"/>

        <input name="nik" placeholder="Masukan NIK" value="{{$user->nik}}"/>

        <input name="telepon" placeholder="Masukan telepon" value="{{$user->telepon}}"/>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</x-pelapor>