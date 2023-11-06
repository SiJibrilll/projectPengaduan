<x-admin>
    <div class="flex items-center">
        <svg class="w-28 h-28 text-[#585858] mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        <div class="flex flex-col">
            <h1 class="font-bold text-[#585858] text-4xl sm:text-5xl"> {{$user->username}}</h1>
            <div class="flex items-center mt-4">
                <svg class="w-5 h-5 text-[#585858] mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z" clip-rule="evenodd" />
                </svg>
                
                <h3 class="font-semibold text-[#585858] text-xl sm:text-2xl">{{$user->telepon}}</h3>
            </div>
        </div>
    </div>

    @if ($user->hasRole('petugas'))
        <h1 class="mt-14 font-medium text-[#585858] text-3xl">Email</h1>
        <h1 class="mt-2 text-[#585858] text-lg mb-8"> {{$user->email}} </h1>
    @else        
        <h1 class="mt-14 font-medium text-[#585858] text-3xl">NIK</h1>
        <h1 class="mt-2 text-[#585858] text-lg mb-8"> {{$user->nik}} </h1>
    @endif


    <a class="font-semibold text-lg text-[#0FB5A1]" href="/users/edit/{{$user->id}}">Ubah data {{$user->hasRole('pelapor')? 'Masyarakat' : 'Petugas'}} </a>
    <div class="w-52 border-b-2 border-[#AAAAAA] my-2"></div>
    <a class="font-semibold text-lg text-[#E15C5C]" href="/users/edit-password">Blokir akun</a>
    <div class="w-52 border-b-2 border-[#AAAAAA] my-2"></div>
    <a class="font-semibold text-lg text-[#E15C5C]" href="/users/edit-password">Hapus akun</a>

</x-admin>