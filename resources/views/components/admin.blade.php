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
    <aside>
        <nav>
            <a href="/aduan">Kelola Aduan</a>
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
</html>