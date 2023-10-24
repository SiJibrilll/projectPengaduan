<x-general>
    <form action="/authenticate" method="POST">
        @csrf
        <h3>Email</h3>
        <input name="email">
        <h3>password</h3>
        <input name="password">
        @error('email')
            <p> $error </p>
        @enderror
        <button type="submit" class="">Kirim</button>
    </form>

    <a href="/auth/google/redirect">Masuk dengan google</a>
</x-general>