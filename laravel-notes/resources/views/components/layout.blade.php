<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Notes</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-black text-white pb-20">
    <div class="px-10">
        <nav class="flex justify-between items-center border-b border-white/10 py-4">
            <!-- Logo -->
            <div>
                <a href="">
                    <img src="https://placehold.co/100x100" alt="" width="50">
                </a>
            </div>

            <!-- Links -->
            <div class="space-x-6 font-semibold">
                <a href="/" class="hover:underline">Home</a>
                <a href="/notes" class="hover:underline">Notes</a>
                <a href="/about" class="hover:underline">About</a>
            </div>

            <!-- Login, Register, Logout -->
            <div class="">
                <a href="" class="text-white text-xl bg-red-700 hover:bg-red-800 rounded-lg px-5 py-2.5">Logout</a>
            </div>
        </nav>

        <main class="mt-10 max-w-[986px] mx-auto">
            {{ $slot }}
        </main>
    </div>

</body>

</html>