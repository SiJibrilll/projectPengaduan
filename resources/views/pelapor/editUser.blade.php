<x-pelapor>
    <h1 class="mt-10 mb-6 font-bold text-[#585858] text-2xl">Ubah data profil</h1>


    <form action="/users/update/{{$user->id}}" method="POST">
        @csrf
        <h1 class="font-semibold text-[#585858] text-xl">Nama</h1>
        <input class="w-full border-b-2 border-[#ABABAB] focus:border-gray-600" name="username" placeholder="Masukan nama..." value="{{null == old('username')? $user->username : old('username')}}"/>
        @error('username')
            <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
        @enderror

        <h1 class="font-semibold text-[#585858] text-xl mt-4">NIK</h1>
        <input class="w-full border-b-2 border-[#ABABAB] focus:border-gray-600" name="nik" placeholder="Masukan NIK" value="{{null == old('nik')? $user->nik : old('nik')}}"/>

        @error('nik')
            <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
        @enderror


        <h1 class="font-semibold text-[#585858] text-xl mt-4">Telepon</h1>
        <input class="w-full border-b-2 border-[#ABABAB] focus:border-gray-600" name="telepon" placeholder="Masukan telepon" value="{{null == old('telepon')? $user->telepon : old('telepon')}}"/>

        @error('telepon')
            <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
        @enderror


        <div class="flex mt-10 justify-end">
            <button onclick="goBack()" type="button" class="font-bold rounded-full bg-[#E47272] transition-all hover:bg-[#d16868] text-white py-2 px-5 mr-2">Batal</button>
            <button type="submit" class="font-bold rounded-full bg-[#31CAB8] min-w-max hover:bg-[#2fbfae] transition-all text-white py-2 px-8 ml-2">Simpan</button>
        </div>
    </form>

<script>
    function goBack() {
        window.location.href = '/users/show/' + @json($user->id);
    }
</script>

</x-pelapor>