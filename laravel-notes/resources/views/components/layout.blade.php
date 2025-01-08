<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Notes</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>

<body class="bg-black text-white font-hanken-grotesk pb-20">
    <div class="px-10">
        <nav class="flex justify-between items-center py-4 border-b border-white/10">
            <div class="w-1/3">
                <a href="/">
                    <img src="{{ Vite::asset('resources/images/notes.png') }}" alt="" width="50">
                </a>
            </div>

            <div class="w-1/3 space-x-6 font-semibold flex justify-center text-lg">
                <a href="/" class="hover:underline underline-offset-8">Home</a>
                <a href="/notes" class="hover:underline underline-offset-8">Notes</a>
            </div>

            @auth
            <div class="w-1/3 space-x-6 font-semibold flex justify-end">
                <form method="POST" action="/logout">
                    @csrf
                    @method("DELETE")
                    <button class="text-white text-md bg-red-700 hover:bg-red-800 rounded-lg text-lg px-5 py-2.5">Logout</button>
                </form>
            </div>
            @endauth

            @guest
            <div class="w-1/3 space-x-4 font-semibold flex justify-end">
                <a href="/login" class="text-white text-md bg-blue-700 hover:bg-blue-800 rounded-lg text-lg px-5 py-2.5">Log In</a>
                <a href="/register" class="text-white text-md bg-gray-700 hover:bg-gray-800 rounded-lg text-lg px-5 py-2.5">Register</a>
            </div>
            @endguest
        </nav>

        <main class="mt-10 max-w-[986px] mx-auto">
            {{ $slot }}
        </main>
    </div>
</body>

</html>