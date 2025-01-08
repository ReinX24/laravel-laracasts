<x-layout>
    <x-page-header>Log In</x-page-header>

    <form action="/login" method="POST">
        @csrf

        <div class="mb-4">
            <label for="email" class="block mb-2 text-xl font-md text-gray-900 dark:text-white">Email</label>
            <input type="email" name="email" class="block p-2.5 w-full text-xl text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

            @error("email")
            <p class="text-lg text-red-500 mt-1">
                {{ $message }}
            </p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block mb-2 text-xl font-md text-gray-900 dark:text-white">Password</label>
            <input type="password" name="password" class="block p-2.5 w-full text-xl text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

            @error("password")
            <p class="text-lg text-red-500 mt-1">
                {{ $message }}
            </p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block mb-2 text-xl font-md text-gray-900 dark:text-white">Password Confirmation</label>
            <input type="password" name="password_confirmation" class="block p-2.5 w-full text-xl text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

            @error("password_confirmation")
            <p class="text-lg text-red-500 mt-1">
                {{ $message }}
            </p>
            @enderror
        </div>

        <div class="space-x-2">
            <button class="text-white text-xl bg-blue-700 hover:bg-blue-800 rounded-lg text-lg px-5 py-2.5">Login</button>
            <a href="/" class="text-white text-xl bg-gray-700 hover:bg-gray-800 rounded-lg text-lg px-5 py-2.5">Cancel</a>
        </div>
    </form>
</x-layout>