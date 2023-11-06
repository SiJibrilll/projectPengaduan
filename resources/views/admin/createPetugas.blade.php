{{-- <x-admin>
    <h1>Tambah Petugas</h1>

    <form  method="POST">
        @csrf
        <input name="username" placeholder="Nama" />
        <input name="email" placeholder="Email" />
        <input name="telepon" placeholder="Telepon" />
        <input name="password" placeholder="Passowrd" />
        <button type="submit" class="btn btn-primary">Simpan</button>

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

    </form>


</x-admin> --}}
<x-admin>
<h1  class="mt-5 font-bold text-[#585858] text-3xl mb-20">Buat petugas </h1>

    <form class="max-w-sm" action="/users/store" method="POST">
        @csrf
        <h1 class="font-semibold mt-5 text-[#585858] text-xl">Nama</h1>
        <input class="w-full border-b-2 border-[#ABABAB] focus:border-gray-600" name="username" placeholder="Masukan nama..." />

        
        <h1 class="font-semibold mt-5 text-[#585858] text-xl">Email</h1>
        <input class="w-full border-b-2 border-[#ABABAB] focus:border-gray-600" name="email" placeholder="Masukan email..." />
    
        
        <h1 class="font-semibold mt-5 text-[#585858] text-xl">Telepon</h1>
        <input class="w-full border-b-2 border-[#ABABAB] focus:border-gray-600" name="telepon" placeholder="Masukan telepon"/>
        <h1 class="font-semibold mt-5 text-[#585858] text-xl">Password</h1>
        <input class="w-full border-b-2 border-[#ABABAB] focus:border-gray-600" name="password" placeholder="Masukan password"/>

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