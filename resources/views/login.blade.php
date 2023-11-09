<x-general>
    <div class="bg-white mx-auto p-4 max-w-md h-screen flex flex-col justify-between">
        

        <div class="p-6">
            <h1 class="mt-4 text-center font-extrabold text-3xl text-[#0FB5A1] font-inter">LaporIND</h1>
            <div class="mt-10">
                <h1 class="text-xl font-bold text-[#585858]">Hallo!</h1>
                <p class='text-base'>Login untuk masuk ke aplikasi!</p>
            </div>

            <div>
                <form action="/authenticate" method="POST">
                    @csrf
                    <h3 class="mt-10 text-xl font-semibold text-[#585858]">Email</h3>
                    <input value="{{old('email')}}" class="w-full border-b-2 border-[#ABABAB] focus:border-gray-600" type="email" name="email"
                        placeholder="Masukan email anda">
                        @error('email')
                            <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
                        @enderror
                
                    <h3 class=" mt-10 text-xl font-semibold text-[#585858]">Password</h3>
                    <input class="w-full border-b-2 border-[#ABABAB] focus:border-gray-600" type="password"
                        name="password">
                    <br>
                    @error('password')
                        <small class="text-red-500 text-xs mt-1">{{ $message }}</small>
                    @enderror
                    
                    <div class="flex justify-center mt-10">
                        <button type="submit"
                            class="text-xl bg-[#0FB5A1] w-64 h-11 hover:bg-[#0E9A89] text-white font-bold py-2 px-4 rounded-full">
                            Masuk
                        </button>
                    </div>
                </form>

                <div class="flex items-center justify-center mt-4">
                    <div class="w-1/3 border-b border-[#AAAAAA]"></div>
                    <div class="mx-2 text-gray-600">atau</div>
                    <div class="w-1/3 border-b border-[#AAAAAA]"></div>
                </div>

                <a href="/auth/google/redirect" class="flex justify-center items-center max-w-full mt-4">
                    <img class="w-7"
                        src="https://lh3.googleusercontent.com/COxitqgJr1sJnIDe8-jiKhxDx1FrYbtRHKJ9z_hELisAlapwE9LUPh6fcXIfb5vwpbMl4xl9H9TRFPc5NOO8Sb3VSgIBrfRYvW6cUA">
                    <p class="ml-4 text-lg">Masuk dengan Google</p>
                </a>
            </div>
        </div>
       
        <div class="flex justify-center">
            <p class="text-sm">Belum punya akun? <a href="/auth/google/redirect" class="text-[#0FB5A1] font-semibold">Daftar sekarang</a></p>
        </div>
    </div>

</x-general>