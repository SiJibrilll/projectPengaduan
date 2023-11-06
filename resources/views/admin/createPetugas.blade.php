<x-admin>
    <h1>Tambah Petugas</h1>

    <form action="/users/store" method="POST">
        @csrf
        <input name="username" placeholder="Nama" />
        <input name="email" placeholder="Email" />
        <input name="telepon" placeholder="Telepon" />
        <input name="password" placeholder="Passowrd" />
        <button type="submit" class="btn btn-primary">Simpan</button>

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

    </form>


</x-admin>