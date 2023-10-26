<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}

    <h1> Hello world im from live wire</h1>
    {{-- 'diajukan', 'diterima', 'diproses', 'selesai', 'ditolak' --}}
    <button wire:click='getAduan("diajukan")'>Diajukan</button>
    <button wire:click='getAduan("diproses")'>Diterima</button>
    <button wire:click='getAduan("diproses")'>Diproses</button>
    <button wire:click='getAduan("selesai")'>Selesai</button>
    <button wire:click='getAduan("ditolak")'>Ditolak</button>


    @foreach ($aduan as $card)
    <a class="underline" href="/aduan/show/{{$card->id}}">
        <div>
            <h1> {{$card->judul}} </h1>
        </div>
    </a>
    @endforeach
</div>
