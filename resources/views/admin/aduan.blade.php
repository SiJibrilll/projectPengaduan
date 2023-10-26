<x-admin>
    @foreach ($aduan->gambar as $gambar)
        <img src="{{asset("storage/" . Storage::files('images/gambarAduan/'. $gambar->folder. '/' . $gambar->gambar)[0])}}">
    @endforeach
    
    <p> {{$aduan->judul}} </p>

    <p> {{$aduan->deskripsi}} </p>
    
    <p> {{date("jS F, Y", strtotime($aduan->created_at))}}</p>
    
    @isset($aduan->tanggapan)
        <p> EMUUU OTORIIIII </p>
    @endisset
</x-admin>