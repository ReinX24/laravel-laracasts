<x-layout>
    <x-page-header>{{ $note->title }}</x-page-header>

    <a href="" class="text-white text-xl bg-gray-700 hover:bg-gray-800 rounded-lg px-5 py-2.5">Edit</a>

    <div class="mt-8">
        <article class="text-xl">
            {{ $note->content }}
        </article>
    </div>
</x-layout>