<x-pelapor>
    <form action="/aduan/update" method="POST" enctype="multipart/form-data">
        @csrf
        <h1> Judul </h1>
        <input type="text" name="judul" id="" placeholder="Masukan inti aduan disini">
        <h1>Deskripsi</h1>
        <textarea name="deskripsi" placeholder="Deskripsikan aduan dengan lebih detail..."></textarea>
        <h1>Gambar</h1>
        <input class="filepond" type="file" name='image[]' multiple credits='false'>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script>
        // Register the plugin
        FilePond.registerPlugin(FilePondPluginImagePreview);
    
        // ... FilePond initialisation code here
        // Get a reference to the file input element
        const inputElement = document.querySelector('input[type="file"]');
    
        // Create a FilePond instance
        const pond = FilePond.create(inputElement);
    
        FilePond.setOptions({
        server: {
            process: '/tmp-image/create',
            fetch: null,
            revert: '/tmp-image/delete',
            headers: {
                'X-CSRF-TOKEN' : '{{ csrf_token() }}'
            },
            allowMultiple: true,
        },
    });
    </script>
    </x-pelapor>