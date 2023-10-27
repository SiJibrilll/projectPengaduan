@foreach ($aduan->gambar as $gambar)
    <img src="{{asset("storage/images/gambarAduan/" . $gambar->gambar)}}">
@endforeach

<p> {{$aduan->judul}} </p>

<p> {{$aduan->deskripsi}} </p>

<p> {{date("jS F, Y", strtotime($aduan->created_at))}}</p>

@if ('diajukan' == $aduan->status)
    <a class="underline" href="/aduan/edit/{{$aduan->id}}">Ubah Aduan</a>
@endif

@isset($aduan->tanggapan)
    <h1> Tanggapan </h1>

    @foreach ($aduan->tanggapan as $tanggapan)
        <p> test </p> 
    @endforeach
@endisset
    
