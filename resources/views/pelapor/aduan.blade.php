<x-pelapor>
   <div class="relative">
      <div class="max-w-screen-lg mx-auto">
          <div class="flex overflow-x-auto scrollbar-hide">
          @foreach ($aduan->gambar as $gambar)
              <img class="max-h-72 w-full object-cover mr-4 rounded-3xl" src="{{asset("storage/images/gambarAduan/" . $gambar->gambar)}}">
              @endforeach
          </div>
      </div>
      @if (count($aduan->gambar) > 1)
          <div style="pointer-events: none" class="absolute right-0 top-0 bottom-0 flex items-center pr-2">
              <div class="bg-white bg-opacity-50 rounded-full p-1">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 text-gray-500">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
              </svg>
              </div>
          </div>        
      @endif
  </div>
  <style>
      .scrollbar-hide::-webkit-scrollbar {
        display: none;
      }
  </style>
  
  <p class="mt-14 font-bold text-[#585858] text-2xl"> {{$aduan->judul}} </p>
  
  <p class="my-2 text-lg text-[#585858]"> {{$aduan->deskripsi}} </p>
  
  
  
   <div class="flex flex-row mt-2">
         <p class="mr-1">Status:</p>
         <p class="font-medium {{ in_array($aduan->status, ['diajukan','diproses']) ? 'text-yellow-500' :
            ($aduan->status == 'selesai' ? 'text-green-500' :
            ($aduan->status == 'ditolak' ? 'text-red-500' : ($aduan->status == 'diterima'? 'text-blue-500': ''))) }}">
            {{ucfirst($aduan->status)}}
         </p>
   </div>

   <p class="text-[#585858] font-light text-sm mt-2"> {{date("jS F, Y", strtotime($aduan->created_at))}}</p>

   
  @if ('diajukan' == $aduan->status)
  <div class="mt-14">
      <a class="mt-10 font-semibold text-[#0FB5A1]" class="underline" href="/aduan/edit/{{$aduan->id}}">Ubah aduan</a>
      <div class="w-auto border-b-2 border-[#AAAAAA] my-2"></div>
      <form action="/aduan/delete/{{$aduan->id}}" method="POST">
         @csrf
         @method('DELETE')
         <button type="submit" class="font-semibold text-red-600">Hapus aduan</button>
      </form>
  </div>
  @endif

  <h1 class="mt-14 font-bold text-[#585858] text-2xl mb-4"> Tanggapan </h1>
  
  @if($aduan->tanggapan->count() > 0)
      @foreach ($aduan->tanggapan as $tanggapan)
         <div class="border-2 border-gray-500 rounded-xl p-2 text-sm mb-2" >
            <div class="flex">
               <p class="mr-1">Oleh:</p>
               <p class="font-bold"> {{$tanggapan->user->username}} </p>
            </div>

            <p class="mt-4"> {{$tanggapan->tanggapan}} </p>
            <div class="flex mt-2">
               <p class="mr-1">Status:</p>
               <p class="font-medium {{ in_array($tanggapan->status, ['diajukan','diproses']) ? 'text-yellow-500' :
                  ($tanggapan->status == 'selesai' ? 'text-green-500' :
                  ($tanggapan->status == 'ditolak' ? 'text-red-500' : ($tanggapan->status == 'diterima'? 'text-blue-500': ''))) }}">
                  {{ucfirst($tanggapan->status)}}
               </p>
            </div>
            <p class="font-light text-xs mt-2"> {{date("jS F, Y", strtotime($tanggapan->created_at))}}</p>
         </div>
      @endforeach
  @else
  <p> Belum ada tanggapan </p>
  @endif

   <div class="text-center mt-2">
      <a class="underline text-[#0FB5A1]" href="/beranda">Kembali</a>
   </div>
  <script>
      const slider = document.querySelector('.scrollbar-hide');
      let isDown = false;
      let startX;
      let scrollLeft;
      
      slider.addEventListener('mousedown', (e) => {
        isDown = true;
        slider.classList.add('active');
        startX = e.pageX - slider.offsetLeft;
        scrollLeft = slider.scrollLeft;
      });
      slider.addEventListener('mouseleave', () => {
        isDown = false;
        slider.classList.remove('active');
      });
      slider.addEventListener('mouseup', () => {
        isDown = false;
        slider.classList.remove('active');
      });
      slider.addEventListener('mousemove', (e) => {
        if(!isDown) return;
        e.preventDefault();
        const x = e.pageX - slider.offsetLeft;
        const walk = (x - startX) * 2; //scroll-fast
        slider.scrollLeft = scrollLeft - walk;
      });
      </script>
</x-pelapor>