<x-pelapor>
    @isset(auth()->user()->password)
        <h1>Ubah password</h1>
        <form action="/users/update-password" method="post">
            @csrf
            <input name="old_password" type="password" placeholder="Masukan password lama..." required >
            <input name="new_password" type="password" placeholder="Masukan password baru..." required>
            <input name="new_password_confirmation" type="password" placeholder="Ulangi password baru..." required>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        
    @else
    <h1>Buat password</h1>
    <form action="/users/create-password" method="POST">
        @csrf
        <input name="new_password" type="password" placeholder="Masukan password baru..." required>
        <input name="new_password_confirmation" type="password" placeholder="Ulangi password baru..." required>
        <button type="submit" class="btn btn-primary">Simpan</button>
    @endisset
</x-pelapor>