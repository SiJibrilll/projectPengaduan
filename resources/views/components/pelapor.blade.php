<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
    <link
        href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet"
    />

    <title>Document</title>
</head>
<body class="bg-gray-100">
    <div class="flex justify-center">
        <div class="max-w-md bg-[#0FB5A1] text-white p-4 fixed top-0 w-full z-50">
            <nav>
                <ul class="flex justify-between items-center">
                    <li><a class="font-extrabold text-4xl" href="/beranda">LaporIND</a></li>
                    <li>
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="flex flex-col justify-center">
                                <svg class="w-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                                </svg>
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="bg-white mx-auto p-4 max-w-md min-h-screen h-full">
        <div class="mt-20" ></div> {{-- Ini buat ngasih jarak antara nav bar dan content --}}
        <div class="mx-2">
            {{
                $slot
            }}
        </div>
    </div>
</body>
</html>

