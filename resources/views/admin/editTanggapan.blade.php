<x-admin>
    <h1> Edit Tanggapan </h1>
    <form action="/tanggapan/update/{{$tanggapan->id}}" method="POST">
        @csrf
        <h1> Tanggapan </h1>
        <textarea name="tanggapan" placeholder="Masukan tanggapan anda..."> {{$tanggapan->tanggapan}} </textarea>

        <h1> Status </h1>
        <select name="status">

            @foreach (['diajukan', 'diterima', 'diproses', 'selesai', 'ditolak'] as $index => $item) 
                <option value="{{ $index }}" {{$item == $tanggapan->status ? 'selected' : ''}}>
                    {{ ucfirst($item) }}
                </option>
            @endforeach
            
        </select>
        <br>
        <div class="inline-block">
            <a href="/aduan/show/{{$tanggapan->aduan_id}}">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

        <input type="hidden" value="{{$tanggapan->aduan_id}}" name="aduan_id">
    </form>
</x-admin>