<x-admin>
    {{-- <x-aduan :aduan="$aduan" /> --}}
    <div class="relative">
        <div class="flex-container max-w-screen">
            <div class="content flex overflow-x-auto scrollbar-hide">
            @foreach ($aduan->gambar as $gambar)
                <img class="max-h-96 w-max object-cover mr-4 rounded-3xl" src="{{asset("storage/images/gambarAduan/" . $gambar->gambar)}}">
                @endforeach
            </div>
        </div>
        
        @if (count($aduan->gambar) > 1)
            <div style="pointer-events: none" class="invisible popover absolute right-0 top-0 bottom-0 flex items-center pr-2">
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
    
    <div class="flex flex-col sm:flex-row sm:justify-between mt-14 w-full">
        <div class="max-w-sm grow">
            <p class=" font-bold text-[#585858] text-4xl"> {{$aduan->judul}} </p>
            
            <p class="my-2 text-xl text-[#585858]"> {{$aduan->deskripsi}} </p>
            
            
            
            <div class="flex flex-row mt-2">
                <p class="mr-1">Oleh:</p>
                <a href="/users/show/{{$aduan->user->id}}" class="font-medium text-[#0FB5A1]">
                    {{$aduan->user->username}}
                </a>
            </div>
        
            <p class="text-[#585858] font-light text-sm mt-2"> {{date("jS F, Y", strtotime($aduan->created_at))}}</p>
        </div>

        <livewire:ubah-status-aduan :aduan='$aduan'/>
    </div>
     
    
      
      
   
    <div class="mt-14">
        <form action="/aduan/delete/{{$aduan->id}}" method="POST">
           @csrf
           @method('DELETE')
           <button type="submit" class="font-semibold text-red-600">Hapus aduan</button>
        </form>
    </div>
    
  
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
  
     <div class="text-center mt-2 block mb-20 sm:hidden">
        <a class="underline text-[#0FB5A1]" href="/beranda">Kembali</a>
     </div>
    <script>

    window.addEventListener('DOMContentLoaded', () => {
        const flexContainer = document.querySelector('.flex-container');
        const content = document.querySelector('.content');
        const popover = document.querySelector('.popover');

        function checkOverflow() {
            if (null == popover) {
                return
            }
            if (content.scrollWidth > content.clientWidth) {
                // Overflow detected, show the pop-up
                popover.style.visibility = 'visible';
            } else {
                // No overflow, hide the pop-up
                popover.style.visibility = 'hidden';
            }

            console.log(content.scrollWidth > content.clientWidth);
        }

        // Call the checkOverflow function when the window and content are fully loaded
        window.onload = () => {
            checkOverflow();
        };

        // Check for overflow when the window is resized
        window.addEventListener('resize', checkOverflow);
    });

        


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
</x-admin>