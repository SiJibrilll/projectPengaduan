<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}

    <h1  class="mt-5 font-bold text-[#585858] text-3xl mb-10">Kelola Aduan</h1>

    <div class="mb-10 flex justify-between max-w-sm">
        <button class="font-semibold text-lg {{ $selected === 'diajukan' ? 'text-[#0FB5A1] underline' : 'text-[#585858]' }}" wire:click='getAduan("diajukan")'>Diajukan</button>
        <button class="font-semibold text-lg {{ $selected === 'diterima' ? 'text-[#0FB5A1] underline' : 'text-[#585858]' }}" wire:click='getAduan("diterima")'>Diterima</button>
        <button class="font-semibold text-lg {{ $selected === 'diproses' ? 'text-[#0FB5A1] underline' : 'text-[#585858]' }}" wire:click='getAduan("diproses")'>Diproses</button>
        <button class="font-semibold text-lg {{ $selected === 'selesai' ? 'text-[#0FB5A1] underline' : 'text-[#585858]' }}" wire:click='getAduan("selesai")'>Selesai</button>
        <button class="font-semibold text-lg {{ $selected === 'ditolak' ? 'text-[#0FB5A1] underline' : 'text-[#585858]' }}" wire:click='getAduan("ditolak")'>Ditolak</button>
    </div>

    <div class="grid mb-20 sm:mb-0 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($aduan as $index => $card)
        <a href="/aduan/show/{{$card->id}}">
            <div class="bg-white hover:bg-slate-100 rounded-lg shadow-md overflow-hidden">
                <img class="w-full h-52 object-cover" src="{{asset("storage/images/gambarAduan/" . $card->gambar[0]->gambar)}}" alt="Image">
                <div class="p-4">
                    <h2 class="text-xl font-bold text-gray-500 mb-2 truncate">{{$card->judul}}</h2>
                    <p class="text-sm font-medium text-[#717171] mb-2 truncate">{{$card->deskripsi}}</p>
                    <p class="text-xs text-gray-500">{{$card->created_at->format('l, F j, Y');}}</p>
                </div>
            </div>
        </a>
        @endforeach
    </div>

</div>
