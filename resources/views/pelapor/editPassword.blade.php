<x-pelapor>
    @isset(auth()->user()->password)
        <h1 class="mt-10 mb-6 font-bold text-[#585858] text-2xl">Ubah password</h1>
        <form action="/users/update-password" method="post">
            @csrf
            <input class="w-full border-b-2 border-[#ABABAB] focus:border-gray-600" name="old_password" type="password" placeholder="Masukan password lama..." required >
            <input class=" mt-6 w-full border-b-2 border-[#ABABAB] focus:border-gray-600" name="new_password" type="password" placeholder="Masukan password baru..." required>
            <input class=" mt-6 w-full border-b-2 border-[#ABABAB] focus:border-gray-600" name="new_password_confirmation" type="password" placeholder="Ulangi password baru..." required>
            <div class="flex mt-10 justify-end">
                <button onclick="goBack()" type="button" class="font-bold rounded-full bg-[#E47272] transition-all hover:bg-[#d16868] text-white py-2 px-5 mr-2">Batal</button>
                <button type="submit" class="font-bold rounded-full bg-[#31CAB8] min-w-max hover:bg-[#2fbfae] transition-all text-white py-2 px-8 ml-2">Simpan</button>
            </div>
        </form>
        
    @else
    <h1 class="mt-10 mb-6 font-bold text-[#585858] text-2xl">Buat password</h1>

    <form action="/users/create-password" method="POST">
        @csrf
        <input class="w-full border-b-2 border-[#ABABAB] focus:border-gray-600" name="new_password" type="password" placeholder="Masukan password baru..." required>
        <input class=" mt-6 w-full border-b-2 border-[#ABABAB] focus:border-gray-600" name="new_password_confirmation" type="password" placeholder="Ulangi password baru..." required>
        <div class="flex mt-10 justify-end">
            <button onclick="goBack()" type="button" class="font-bold rounded-full bg-[#E47272] transition-all hover:bg-[#d16868] text-white py-2 px-5 mr-2">Batal</button>
            <button type="submit" class="font-bold rounded-full bg-[#31CAB8] min-w-max hover:bg-[#2fbfae] transition-all text-white py-2 px-8 ml-2">Simpan</button>
        </div>
    @endisset

    <script>
        function goBack() {
            window.location.href = '/users/show/' + @json(Auth()->user()->id);
        }
    </script>
    
</x-pelapor>