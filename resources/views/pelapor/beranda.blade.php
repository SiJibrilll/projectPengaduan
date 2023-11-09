<x-pelapor>
    <div class="bg-[#5FCABD] rounded-3xl p-2 mt-24">
        <a class="" href="/users/show/{{auth()->user()->id}}">
            <div class="flex items-center">
                <svg class="w-28 h-28 text-white mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <div class="flex flex-col">
                    <h1 class="font-bold text-white text-2xl sm:text-3xl"> {{auth()->user()->username}}</h1>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-white mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z" clip-rule="evenodd" />
                        </svg>
                        
                        <h3 class="font-semibold text-white text-lg sm:text-xl">{{auth()->user()->telepon}}</h3>
                    </div>
                </div>
            </div>
            <p class="text-white underline text-center mt-6">Ketuk untuk lihat profil</p>
        </a>
    </div>

    <a href="/aduan/create">
        <div class="bg-[#31CAB8] transition-all hover:bg-[#30c2b1] rounded-3xl p-4 flex flex-col items-center justify-center mt-14">
            <svg class="w-10 h-10 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" >
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
            </svg>
            
            <p class="font-semibold text-white mt-1">Buat aduan</p>
        </div>
    </a>

    <h1 class="mt-14 font-bold text-[#585858] text-2xl mb-8">Aduan saya</h1>
    @foreach ($aduans as $aduan)
    <a href="/aduan/show/{{$aduan->id}}">
        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-12">
                @isset($aduan->gambar[0])
                    <img class="max-h-72 w-full object-cover" src="{{asset("storage/images/gambarAduan/" . $aduan->gambar[0]->gambar)}}" alt="Image" class="w-full h-48 object-cover">
                @endisset
            <div class="p-4">
                <h2 class="text-xl font-bold text-gray-500 mb-2 mt-5">{{$aduan->judul}}</h2>
                <p class="text-sm font-medium text-[#717171] mb-2">{{$aduan->deskripsi}}</p>
                <p class="text-xs text-gray-500 mb-5">{{$aduan->created_at->format('l, F j, Y');}}</p>
            </div>
        </div>
    </a>
    @endforeach

</x-pelapor>