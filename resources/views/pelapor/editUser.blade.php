<x-pelapor>
    <h1 class="mt-10 mb-6 font-bold text-[#585858] text-2xl">Ubah data profil</h1>


    <form action="/users/update/{{$user->id}}" method="POST">
        @csrf
        <h1 class="font-semibold text-[#585858] text-xl">Nama</h1>
        <input class="w-full border-b-2 border-[#ABABAB] focus:border-gray-600" name="username" placeholder="Masukan nama..." value="{{$user->username}}"/>
        
        <h1 class="font-semibold text-[#585858] text-xl mt-4">NIK</h1>
        <input class="w-full border-b-2 border-[#ABABAB] focus:border-gray-600" name="nik" placeholder="Masukan NIK" value="{{$user->nik}}"/>
        
        <h1 class="font-semibold text-[#585858] text-xl mt-4">Telepon</h1>
        <input class="w-full border-b-2 border-[#ABABAB] focus:border-gray-600" name="telepon" placeholder="Masukan telepon" value="{{$user->telepon}}"/>

        <div class="flex mt-10">
            <button onclick="goBack()" type="button" class="ml-36 font-bold rounded-full flex-2 bg-[#E47272] text-white py-2 px-9 sm:px-5 mr-2">Batal</button>
            <button type="submit" class="font-bold rounded-full flex-1 bg-[#31CAB8] text-white py-2 px-4 sm:px-6 ml-2">Simpan</button>
        </div>
    </form>

<script>
    function goBack() {
        window.location.href = '/users/show/' + @json($user->id);
    }
</script>

</x-pelapor>