<x-layout>
    <x-page-header>Edit Note</x-page-header>

    <form action="/notes/{{ $note->id }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="title" class="block mb-2 text-2xl font-md text-gray-900 dark:text-white">Title</label>
            <input type="text" name="title" class="block p-2.5 w-full text-xl text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $note->title }}">

            @error("title")
            <p class="text-lg text-red-500 mt-1">
                {{ $message }}
            </p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="content" class="block mb-2 text-2xl font-md text-gray-900 dark:text-white">Content</label>
            <textarea id="content" name="content" rows="16" class="block p-2.5 w-full text-xl text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here...">
            {{ $note->content }}
            </textarea>

            @error("content")
            <p class="text-lg text-red-500 mt-1">
                {{ $message }}
            </p>
            @enderror
        </div>


        <div class="mt-4 space-x-2">
            <button class="text-white text-xl bg-blue-700 hover:bg-blue-800 rounded-lg text-lg px-5 py-2.5">Update</button>
            <button class="text-white text-xl bg-red-700 hover:bg-red-800 rounded-lg text-lg px-5 py-2.5" form="delete-form">Delete</button>
        </div>
    </form>

    <form action="/notes/{{ $note->id }}" method="POST" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-layout>