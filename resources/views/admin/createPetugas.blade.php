<x-admin>
<h1  class="mt-5 font-bold text-[#585858] text-3xl mb-20">Buat petugas </h1>

    <form class="max-w-sm" action="/users/store" method="POST">
        @csrf
        <h1 class="font-semibold mt-5 text-[#585858] text-xl">Nama</h1>
        <input value="{{old('username')}}" class="w-full border-b-2 border-[#ABABAB] focus:border-gray-600" name="username" placeholder="Masukan nama..." />
        @error('username')
            <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
        @enderror

        
        <h1 class="font-semibold mt-5 text-[#585858] text-xl">Email</h1>
        <input value="{{old('email')}}" class="w-full border-b-2 border-[#ABABAB] focus:border-gray-600" name="email" placeholder="Masukan email..." />
        @error('email')
            <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
        @enderror

        
        <h1 class="font-semibold mt-5 text-[#585858] text-xl">Telepon</h1>
        <input value="{{old('telepon')}}" class="w-full border-b-2 border-[#ABABAB] focus:border-gray-600" name="telepon" placeholder="Masukan telepon"/>
        @error('telepon')
            <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
        @enderror

        <h1 class="font-semibold mt-5 text-[#585858] text-xl">Password</h1>
        <input type="password" class="w-full border-b-2 border-[#ABABAB] focus:border-gray-600" name="password" placeholder="Masukan password"/>
        @error('password')
            <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
        @enderror

        <h1 class="font-semibold mt-5 text-[#585858] text-xl">Ulangi Password</h1>
        <input type="password" class="w-full border-b-2 border-[#ABABAB] focus:border-gray-600" name="password_confirmation" placeholder="Masukan password"/>
        @error('password_confirmation')
            <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
        @enderror

        <div class="flex mt-10 justify-end sm:justify-start">
            <button onclick="goBack()" type="button" class="font-bold rounded-full bg-[#E47272] transition-all hover:bg-[#d16868] text-white py-2 px-5 mr-2">Batal</button>
            <button type="submit" class="font-bold rounded-full bg-[#31CAB8] min-w-max hover:bg-[#2fbfae] transition-all text-white py-2 px-8 ml-2">Simpan</button>
        </div>
    </form>

    <script>
        function goBack() {
            window.location.href = '/users/petugas';
        }
    </script>
</x-admin>