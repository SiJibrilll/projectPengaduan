<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}

    <h1  class="mt-5 font-bold text-[#585858] text-3xl mb-10">Kelola Aduan</h1>

    <div class="flex mb-10 justify-between items-center">
        <div class=" flex justify-between max-w-sm sm:max-w-lg grow">
            <button class="font-semibold text-xs sm:text-lg {{ $selected === 'diajukan' ? 'text-[#0FB5A1] underline' : 'text-[#585858]' }}" wire:click='getAduan("diajukan")'>Diajukan: {{$jumlahDiajukan}} </button>
            <button class="font-semibold text-xs sm:text-lg {{ $selected === 'diterima' ? 'text-[#0FB5A1] underline' : 'text-[#585858]' }}" wire:click='getAduan("diterima")'>Diterima: {{$jumlahDiterima}}</button>
            <button class="font-semibold text-xs sm:text-lg {{ $selected === 'diproses' ? 'text-[#0FB5A1] underline' : 'text-[#585858]' }}" wire:click='getAduan("diproses")'>Diproses : {{$jumlahDiproses}}</button>
            <button class="font-semibold text-xs sm:text-lg {{ $selected === 'selesai' ? 'text-[#0FB5A1] underline' : 'text-[#585858]' }}" wire:click='getAduan("selesai")'>Selesai: {{$jumlahSelesai}}</button>
            <button class="font-semibold text-xs sm:text-lg {{ $selected === 'ditolak' ? 'text-[#0FB5A1] underline' : 'text-[#585858]' }}" wire:click='getAduan("ditolak")'>Ditolak: {{$jumlahDitolak}}</button>
        </div>

        <a href="/aduan/create-laporan" class="hidden px-4 py-2 rounded-md bg-[#0FB5A1] text-white sm:block hover:bg-[#0D9C8B] font-semibold" type="submit" class="">buat laporan</a>
    </div>

    <a href="/aduan/create-laporan" class="mb-10 block text-center sm:hidden px-4 py-2 rounded-md bg-[#0FB5A1] text-white hover:bg-[#0D9C8B] font-semibold" type="submit" class="">buat laporan</a>


    @if (count($aduan) > 0)
        <div class="grid mb-20 sm:mb-0 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($aduan as $index => $card)
            <a href="/aduan/show/{{$card->id}}">
                <div class="bg-white hover:bg-slate-100 rounded-lg shadow-md overflow-hidden">
                    @isset($card->gambar[0])
                        <img class="max-h-72 w-full object-cover" src="{{asset("storage/images/gambarAduan/" . $card->gambar[0]->gambar)}}" alt="Image" class="w-full h-48 object-cover">
                    @endisset
                    <div class="p-4">
                        <h2 class="text-xl font-bold text-gray-500 mb-2 truncate">{{$card->judul}}</h2>
                        <p class="text-sm font-medium text-[#717171] mb-2 truncate">{{$card->deskripsi}}</p>
                        <p class="text-xs text-gray-500">{{$card->created_at->format('l, F j, Y');}}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    
    @else
    <div class="flex flex-col justify-center items-center">
        <svg class="w-28 h-28 text-[#585858]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 00-1.883 2.542l.857 6a2.25 2.25 0 002.227 1.932H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-1.883-2.542m-16.5 0V6A2.25 2.25 0 016 3.75h3.879a1.5 1.5 0 011.06.44l2.122 2.12a1.5 1.5 0 001.06.44H18A2.25 2.25 0 0120.25 9v.776" />
        </svg>
        
        <h1  class="mt-5 font-bold text-[#585858] text-3xl mb-10 text-center">Maaf... belum ada aduan</h1>
    </div>

    @endif
   

</div>
