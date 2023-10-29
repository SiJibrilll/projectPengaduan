@foreach ($aduan->gambar as $gambar)
    <img src="{{asset("storage/images/gambarAduan/" . $gambar->gambar)}}">
@endforeach

<p> {{$aduan->judul}} </p>

<p> {{$aduan->deskripsi}} </p>

<p> {{date("jS F, Y", strtotime($aduan->created_at))}}</p>

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
    