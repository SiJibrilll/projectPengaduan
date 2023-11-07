<div class="sm:-mt-10 w-full max-w-sm h-full flex flex-col items-center justify-center mt-10 sm:mt-0">
    <div class="w-full h-1/4  bg-[#31CAB8] roun text-white p-2 rounded-t-2xl text-center font-semibold text-3xl">
        Ubah Status
    </div>
    <div class="w-full h-1/2 rounded-b-2xl bg-white p-2 shadow-md">
        <form wire:submit='ubahStatus' class="my-10 flex flex-row justify-between px-8">
            <div class="relative inline-block text-left">
                <select wire:model='status' class="block w-full px-4 py-2 mt-2 text-gray-800 bg-white border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach (['diajukan', 'diterima', 'diproses', 'selesai', 'ditolak'] as $index => $item) 
                    <option value="{{ $index }}">
                        {{ ucfirst($item) }}
                    </option>
                    @endforeach
                </select>
              </div>
            <button class="px-4 py-2 rounded-md bg-[#0FB5A1] text-white hover:bg-[#0D9C8B] font-semibold" type="submit" class="">Simpan</button>
        </form>
    </div>
</div>
