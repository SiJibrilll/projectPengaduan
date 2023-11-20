<div>
    
    {{-- Success is as dangerous as failure. --}}
    <h1 class="mt-5 font-bold text-[#585858] text-4xl mb-16">Kelola {{$role == 'pelapor'? 'Masyarakat' : 'Petugas'}}</h1>

    <div class="flex items-center mb-8">
        
        <input class="border-b-2 border-[#ABABAB] focus:border-gray-600" wire:model.live='search' placeholder="Cari {{$role == 'pelapor'? 'Masyarakat' : 'Petugas'}}...">
        
        <svg class="w-6 h-6 text-[#ABABAB] ml-2 mr-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
          </svg>
          

        @if (auth()->user()->hasRole('admin') && 'petugas' == $role)          
            <a href="/users/create" class="relative ml-6 group">
                <div class="group-hover:transition-[width]  sm:group-hover:-translate-x-5 sm:group-hover:w-52 w-10 h-10 rounded-full bg-[#0B8A7B] text-white absolute top-0 left-0 transform -translate-x-1/2 -translate-y-1/2 overflow-hidden">
                    <span class="whitespace-nowrap font-medium absolute top-2 group-hover:translate-x-14">
                        Tambah Petugas
                      </span>            
                </div>
                <div class="w-10 h-10 text-4xl rounded-full bg-[#0FB5A1] text-white absolute top-0 left-0 transform -translate-x-1/2 -translate-y-1/2">
                    <span class="font-bold absolute top-4  left-1/2 transform -translate-x-1/2 -translate-y-1/2">+</span>
                </div>
            </a>
        @endif

          
            
    </div>
            
   
       @if (count($users) > 0)
            <div class="overflow-auto">
                <table class="w-full bg-white rounded-lg shadow">
                    <thead>
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                            @if ('pelapor' == $role)
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">NIK</th>
                            
                            @else
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                            
                            @endif
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">Telepon</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($users as $index => $user)
                            <tr onclick="document.location = '/users/show/{{$user->id}}';" wire:key='{{$user->id}}' class="hover:bg-gray-100 transition duration-150 ease-in-out">
                                
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->username }}</td>
                                @if ('pelapor' == $role)
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->nik }}</td>
                                @else     
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->email }}</td>
                                @endif
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->telepon }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>        
        
        @else
        <div class="flex flex-col justify-center items-center">
            <svg class="w-28 h-28 text-[#585858]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M22 10.5h-6m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
            </svg>
            
            <h1  class="mt-5 font-bold text-[#585858] text-3xl mb-10 text-center">Maaf... belum ada pengguna</h1>
        </div>

        
          
       @endif
</div>
