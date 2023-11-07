<x-admin>
    <h1 class="mt-5 font-bold text-[#585858] text-3xl mb-10">Tambah Tanggapan</h1>

    <form class="mt-10" action="/tanggapan/store" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col sm:flex-row justify-between mr-10">
            <div class="flex grow flex-col">
                <h1 class="font-semibold text-[#585858] text-2xl mt-8">Tanggapan</h1>
                <div class="bg-white rounded-lg shadow-md p-4">
                    <textarea name="tanggapan" placeholder="Beri tanggapan..."
                        class="w-full h-32 border border-gray-300 rounded p-2 resize-none"></textarea>
                </div>
            </div>

            <div class="flex grow flex-col ml-10">
                <h1 class="font-semibold text-[#585858] text-2xl mt-8 mb-4">Status Tanggapan</h1>
                <select name="status"
                    class="block w-full px-4 py-2 mt-2 text-gray-800 bg-white border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach (['diajukan', 'diterima', 'diproses', 'selesai', 'ditolak'] as $index => $item)
                    <option value="{{ $index }}">
                        {{ ucfirst($item) }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="flex mt-24 max-w-sm">
            <button onclick="goBack()" type="button"
                class="font-bold rounded-full flex-2 bg-[#E47272] transition-all hover:bg-[#d16868] text-white py-2 px-9 sm:px-5 mr-2">Batal</button>
            <button type="submit"
                class="font-bold rounded-full flex-1 bg-[#31CAB8] hover:bg-[#2fbfae] transition-all text-white py-2 px-4 sm:px-6 ml-2">Simpan</button>
        </div>

        <input type="hidden" value="{{$aduan->id}}" name="aduan_id">
    </form>

    <script>
        function goBack() {
            window.location.href = '/aduan/show/' + @json($aduan->id);
        }
    </script>
</x-admin>