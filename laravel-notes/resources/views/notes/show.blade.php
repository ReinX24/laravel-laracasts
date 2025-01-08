<x-layout>
    <x-page-header>{{ $note->title }}</x-page-header>

    <a href="/notes/{{ $note->id }}/edit" class="text-white text-xl bg-gray-700 hover:bg-gray-800 rounded-lg px-5 py-2.5">Edit</a>

    <div class="mt-8 space-y-3">
        <p class="text-xl font-bold">Created at: {{ $note->created_at }}</p>
        <hr>
        <textarea id="content" name="content" rows="16" class="block p-2.5 w-full text-xl text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..." disabled>
        {{ $note->content }}
        </textarea>
    </div>
</x-layout>