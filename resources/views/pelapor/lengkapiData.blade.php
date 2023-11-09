<x-general>
    <div class="bg-white mx-auto p-4 max-w-md h-screen flex flex-col justify-between">
        <div class="p-6">
            <h1 class="mt-16 text-center font-extrabold text-3xl text-[#0FB5A1] font-inter">LaporIND</h1>
            <div class="mt-10">
                <h1 class="text-xl font-bold text-[#585858]">Sedikit lagi!</h1>
                <p class='text-base'>Lengkapi data untuk lanjut menggunakan website</p>
            </div>

            <div>
                <form action="/lengkapi-data/store" method="POST">
                    @csrf
                    <h3 class="mt-10 text-xl font-semibold text-[#585858]">NIK</h3>
                    <input value="{{old('nik')}}" class="w-full border-b-2 border-[#ABABAB] focus:border-gray-600" type="text" name="nik"
                        placeholder="Masukan nik anda">
                        @error('nik')
                            <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
                        @enderror
                
                    <h3 class=" mt-10 text-xl font-semibold text-[#585858]">Telepon</h3>
                    <input value="{{old('telepon')}}" class="w-full border-b-2 border-[#ABABAB] focus:border-gray-600" type="text"
                        placeholder="Masukan nomor telepon anda" name="telepon">
                        @error('telepon')
                            <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
                        @enderror
                
                    <br>
                    <div class="flex justify-center mt-10">
                        <button type="submit"
                            class="mt-16 text-xl bg-[#0FB5A1] w-64 h-11 hover:bg-[#0E9A89] text-white font-bold py-2 px-4 rounded-full">
                            Simpan
                        </button>
                    </div>
                </form>


            </div>
        </div>
    </div>
    
</x-general>