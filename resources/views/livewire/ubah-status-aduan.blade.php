<div>
    <form wire:submit='ubahStatus'>
        <select wire:model='status'>           
            @foreach (['diajukan', 'diterima', 'diproses', 'selesai', 'ditolak'] as $index => $item) 
                <option value="{{ $index }}">
                    {{ ucfirst($item) }}
                </option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
