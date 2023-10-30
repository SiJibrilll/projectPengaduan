<x-admin>
    <p> {{$user}} </p>
    @if (Auth()->user()->hasRole('admin'))
        <a href="/users/edit/{{$user->id}}">Ubah data petugas</a>
    @endif
</x-admin>