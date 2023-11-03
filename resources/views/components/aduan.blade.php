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

<p class="text-[#585858] font-light text-sm"> {{date("jS F, Y", strtotime($aduan->created_at))}}</p>

@if (Auth()->user()->hasRole('pelapor'))
    <div class="flex flex-row">
        <p class="mr-1">Status:</p>
        <p class="font-medium {{ in_array($aduan->status, ['diajukan','diproses']) ? 'text-yellow-500' :
            ($aduan->status == 'selesai' ? 'text-purple-500' :
            ($aduan->status == 'ditolak' ? 'text-red-500' : ($aduan->status == 'diterima'? 'text-green-500': ''))) }}">
            {{ucfirst($aduan->status)}}
        </p>
    </div>
@endif

@if ('diajukan' == $aduan->status && $aduan->user_id == Auth()->user()->id)
    <a class="underline" href="/aduan/edit/{{$aduan->id}}">Ubah Aduan</a>
@endif

@if (Auth()->user()->hasRole('admin'))
    <livewire:ubah-status-aduan :aduan='$aduan'/>
@endif

<div class="flex inline-block">
    <h1 class="mr-5"> Tanggapan </h1>
    @if(Auth()->user()->hasRole('admin') || Auth()->user()->hasRole('petugas'))
        <a href="/tanggapan/create/{{$aduan->id}}"> Tambah tanggapan</a>
    @endif
</div>

@isset($aduan->tanggapan)
    @foreach ($aduan->tanggapan as $tanggapan)
        <a href="/tanggapan/edit/{{$tanggapan->id}}">
            <p> {{$tanggapan->tanggapan}} </p> 
        </a>
    @endforeach
@else
<p> Belum ada tanggapan </p>
@endisset
    
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