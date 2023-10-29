<x-admin>
    <h1> Create Tanggapan </h1>
    <form action="/tanggapan/store" method="POST">
        @csrf
        <h1> Tanggapan </h1>
        <textarea name="tanggapan" placeholder="Masukan tanggapan anda..."></textarea>

        <h1> Status </h1>
        <select name="status">
            <option value="0"> Diajukan</option>
            <option value="1"> Diterima</option>
            <option value="2"> Diproses</option>
            <option value="3"> Selesai</option>
            <option value="4"> Ditolak</option>
        </select>
        <br>
        <div class="inline-block">
            <a href="/aduan/show/{{$aduan->id}}">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

        <input type="hidden" value="{{$aduan->id}}" name="aduan_id">
    </form>
</x-admin>