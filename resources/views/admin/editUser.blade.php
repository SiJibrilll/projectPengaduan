<x-admin>
    <h1  class="mt-5 font-bold text-[#585858] text-3xl mb-20">Ubah data {{'pelapor' == $user->getRoleNames()->first()? 'Masyarakat' : 'Petugas'}} </h1>

    <form class="max-w-sm" action="/users/update/{{$user->id}}" method="POST">
        @csrf
        <h1 class="font-semibold mt-5 text-[#585858] text-xl">Nama</h1>
        <input class="w-full border-b-2 border-[#ABABAB] focus:border-gray-600" name="username" placeholder="Masukan nama..." value="{{null === old('username')? $user->username : old('username')}}"/>
        @error('username')
            <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
        @enderror


        @if ($user->hasRole('pelapor'))
        <h1 class="font-semibold mt-5 text-[#585858] text-xl">NIK</h1>
        <input class="w-full border-b-2 border-[#ABABAB] focus:border-gray-600" name="nik" placeholder="Masukan NIK" value="{{null === old('nik')? $user->nik : old('nik')}}"/>
        
        @error('nik')
            <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
        @enderror

        @elseif ($user->hasRole('petugas'))
        
        <h1 class="font-semibold mt-5 text-[#585858] text-xl">Email</h1>
        <input class="w-full border-b-2 border-[#ABABAB] focus:border-gray-600" name="email" placeholder="Masukan email..." value="{{null === old('email')? $user->email : old('email')}}"/>
        
        @error('email')
            <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
        @enderror

        @endif
        
        <h1 class="font-semibold mt-5 text-[#585858] text-xl">Telepon</h1>
        <input class="w-full border-b-2 border-[#ABABAB] focus:border-gray-600" name="telepon" placeholder="Masukan telepon" value="{{null === old('telepon')? $user->telepon : old('telepon')}}"/>
    
        @error('telepon')
            <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
        @enderror

        <h1 class="font-semibold mt-5 text-[#585858] text-xl">Password</h1>
        <input class="w-full border-b-2 border-[#ABABAB] focus:border-gray-600" name="password" placeholder="Masukan password"/>

        <h1 class="font-semibold mt-5 text-[#585858] text-xl">Ulangi Password</h1>
        <input class="w-full border-b-2 border-[#ABABAB] focus:border-gray-600" name="password_confirmation" placeholder="Masukan password"/>

        @error('password')
            <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
        @enderror

        <div class="flex mt-10 justify-end sm:justify-start">
            <button onclick="goBack()" type="button" class="font-bold rounded-full bg-[#E47272] transition-all hover:bg-[#d16868] text-white py-2 px-5 mr-2">Batal</button>
            <button type="submit" class="font-bold rounded-full bg-[#31CAB8] min-w-max hover:bg-[#2fbfae] transition-all text-white py-2 px-8 ml-2">Simpan</button>
        </div>
    </form>

    <script>
        function goBack() {
            window.location.href = '/users/show/' + @json($user->id);
        }
    </script>

</x-admin>