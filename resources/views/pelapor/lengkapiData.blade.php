<x-pelapor>
    <form action="/lengkapi-data/store" method="POST">
        @csrf
        <h1>NIK</h1>
        <input type="number" name="nik" id="">
        
        <h1>telepon</h1>
        <input type="number" name="telepon">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-pelapor>