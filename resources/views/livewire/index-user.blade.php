<div>
    {{-- Success is as dangerous as failure. --}}

    <div class="inline-block">
        <input wire:model.live='search' placeholder="Cari Pengguna...">
        <a href="/users/create"> Tambah Petugas </a>
    </div>
            
    @foreach ($users as $user)
        <p wire:key='{{$user->id}}'> {{$user->username}} </p>
    @endforeach
</div>
