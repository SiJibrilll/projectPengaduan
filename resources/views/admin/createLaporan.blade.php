<x-admin>
    <h1>Download Laporan</h1>
    <form action="/aduan/generate-laporan" method="POST">
        @csrf
        <h1>Jangka waktu aduan</h1>
        <select name="period">
            <option value="" selected disabled>Pilih jangka waktu</option>
            <option value="daily">Harian</option>
            <option value="weekly">Mingguan</option>
            <option value="monthly">Bulanan</option>
            <option value="annually">Tahunan</option>
        </select>

        <h1>Sortir</h1>
        <select name="sortOrder">
            <option value="desc">Terbaru</option>
            <option value="asc">Terlama</option>
        </select>
        <button type="submit" class="btn btn-primary">Download</button>
    </form>
</x-admin>