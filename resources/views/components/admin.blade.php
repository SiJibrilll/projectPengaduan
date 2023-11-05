{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
    @livewireStyles
</head>
<body>
    <aside>
        <nav>
            <a class="sm:hover:bg-black sm:bg-blue-600" href="/aduan">Kelola Aduan</a>
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="btn btn-primary">Logout</button>
            </form>
        </nav>
    </aside>

    {{
        $slot
    }}
    @livewireScripts
</body>
</html> --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
    @livewireStyles
</head>
<body>
    <nav class="bg-[#0FB5A1] justify-between fixed group flex duration-75 transition-all sm:flex-col sm:w-24 sm:h-screen sm:hover:w-72">
        <ul>
            <li>
                <div class="hidden sm:ml-5 sm:mt-10 sm:mb-10 sm:items-center sm:justify-start sm:flex overflow-hidden">
                    <span class="text-white block sm:block sm:group-hover:hidden transition-all text-5xl font-extrabold mr-1">LI</span>
                    <div>
                        <span class="text-white block sm:invisible  sm:group-hover:visible text-4xl font-bold mr-1">LaporIND</span>
                        <span class="text-white block sm:invisible  sm:group-hover:visible text-xl">Panel Managemen</span>
                    </div>
                </div>
            </li>
            <li>
                <a href="/beranda" class="flex mb-4 items-center hover:bg-[#0FA896] max-h-14 p-3">
                    <svg class="text-white min-w-fit max-w-fit mr-2 p-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                      
                    <span class="text-white block sm:hidden sm:group-hover:block transition-all text-xl font-bold mr-1  whitespace-nowrap">Beranda</span>
                
                </a>
            </li>
            <li>
                <a href="/aduan" class="flex mb-4 items-center hover:bg-[#0FA896] max-h-14 p-3">
                    <svg class="text-white min-w-fit max-w-fit mr-2 p-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                    </svg>
                    <span class="text-white block sm:hidden sm:group-hover:block transition-all text-xl font-bold mr-1  whitespace-nowrap">Kelola Aduan</span>
                
                </a>
            </li>
            @if (auth()->user()->hasRole('admin'))
                <li>
                    <a href="/users/petugas" class="flex mb-4 items-center hover:bg-[#0FA896] max-h-14 p-3">
                        <svg class="text-white min-w-fit max-w-fit mr-2 p-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                        </svg>                      
                        <span class="text-white block sm:hidden sm:group-hover:block transition-all text-xl font-bold mr-1  whitespace-nowrap">Kelola Petugas</span>
                    
                    </a>
                </li>                
            @endif
            <li>
                <a href="/users/pelapor" class="flex mb-4 items-center hover:bg-[#0FA896] max-h-14 p-3">
                    <svg class="text-white min-w-fit max-w-fit mr-2 p-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>                      
                    <span class="text-white block sm:hidden sm:group-hover:block transition-all text-xl font-bold mr-1  whitespace-nowrap">Kelola Masyarakat</span>
                
                </a>
            </li>
        </ul>

        <form action="/logout" method="POST">
            @csrf
            <input type="submit" class="hidden" id="logout">
        </form>
       
        <label for="logout" class="flex items-center hover:bg-[#0FA896] max-h-14 p-3">
            <svg class="text-white min-w-fit max-w-fit mr-2 p-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
              </svg>
              
            <span class="text-white block sm:hidden sm:group-hover:block transition-all text-xl font-bold mr-1 whitespace-nowrap">Logout</span>
        </label>
       
    </nav>

    <div class="ml-1 sm:ml-24 p-4 sm:p-10">
        {{
            $slot
        }}
    </div>
    @livewireScripts
</body>
</html>