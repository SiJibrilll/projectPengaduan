<x-admin>
    <h1  class="mt-5 font-bold text-[#585858] text-3xl mb-10">Buat Laporan</h1>
    <form class="max-w-sm" action="/aduan/generate-laporan" method="POST">
        @csrf
        <h1 class="font-semibold text-[#585858] text-xl">Jangka Waktu</h1>
        {{-- <select name="period">
            <option value="" selected disabled>Pilih jangka waktu</option>
            <option value="harian">Harian</option>
            <option value="mingguan">Mingguan</option>
            <option value="bulanan">Bulanan</option>
            <option value="tahunan">Tahunan</option>
        </select> --}}

        <select name='period' class="block w-full px-4 py-2 mt-2 text-gray-800 bg-white border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            <option value="" selected disabled>Pilih jangka waktu</option>
            @foreach (['harian', 'mingguan', 'bulanan', 'tahunan'] as $item) 
            <option value="{{ $item }}">
                {{ ucfirst($item) }}
            </option>
            @endforeach
        </select>

        <h1 class="font-semibold text-[#585858] text-xl mt-5">Sortir</h1>

        <select name="sortOrder" class="block w-full px-4 py-2 mt-2 text-gray-800 bg-white border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            <option value="desc">Terbaru</option>
            <option value="asc">Terlama</option>
        </select>

        <div class="flex mt-24 max-w-sm">
            <button onclick="goBack()" type="button"
                class="font-bold rounded-full flex-2 bg-[#E47272] transition-all hover:bg-[#d16868] text-white py-2 px-9 sm:px-5 mr-2">Batal</button>
            <button type="submit"
                class="font-bold rounded-full flex-1 bg-[#31CAB8] hover:bg-[#2fbfae] transition-all text-white py-2 px-4 sm:px-6 ml-2">Simpan</button>
        </div>
    </form>

    <script>
        function goBack() {
            window.location.href = '/aduan';
        }
    </script>

</x-admin>