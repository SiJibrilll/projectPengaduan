<x-admin>
    <h1>Tambah Petugas</h1>

    <form action="/users/store" method="POST">
        @csrf
        <input name="username" placeholder="Nama" />
        <input name="email" placeholder="Email" />
        <input name="telepon" placeholder="Telepon" />
        <input name="password" placeholder="Passowrd" />
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</x-admin>