<x-pelapor>
    <form class="mt-24" action="/aduan/update/{{$aduan->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        <h1 class="font-semibold text-[#585858] text-2xl">Judul</h1>
        <input class="mt-4 w-full border-b-2 border-[#ABABAB] focus:border-gray-600" type="text" name="judul" id="" placeholder="Masukan inti aduan disini" value="{{$aduan->judul}}">
        <h1 class="font-semibold text-[#585858] text-2xl mt-8">Deskripsi</h1>
        <div class="bg-white rounded-lg shadow-md p-4">
            <textarea name="deskripsi" placeholder="Deskripsikan aduan dengan lebih detail..." class="w-full h-32 border border-gray-300 rounded p-2 resize-none" placeholder="Enter your text...">{{$aduan->deskripsi}}</textarea>
        </div>
            
        <h1 class="font-semibold text-[#585858] text-2xl mt-8 mb-4">Gambar</h1>
        <input class="filepond" type="file" name='image[]' multiple credits='false'>
        <div class="flex mt-24">
            <button onclick="goBack()" type="button" class="font-bold rounded-full flex-2 bg-[#E47272] transition-all hover:bg-[#d16868] text-white py-2 px-9 sm:px-5 mr-2">Batal</button>
            <button type="submit" class="font-bold rounded-full flex-1 bg-[#31CAB8] hover:bg-[#2fbfae] transition-all text-white py-2 px-4 sm:px-6 ml-2">Ubah Aduan</button>
        </div>
            
            
            
    </form>
    <script>
        function goBack() {
            window.location.href = '/aduan/show/' + @json($aduan->id);
        }
    </script>
    
    
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
                revert: '/tmp-image/delete',
                headers: {
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },
                allowMultiple: true,
            },
        });

        let images = @json($aduan->gambar);
        let url = @json(asset("storage/images/gambarAduan/"));
       
        images.forEach(image => {
            pond.addFile(url + '/' + image.gambar)
        });
        
    </script>
</x-pelapor>