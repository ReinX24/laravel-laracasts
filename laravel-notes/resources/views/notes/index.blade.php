<x-layout>

    <x-page-header>My Notes</x-page-header>

    <div class="mb-8">
        <a href="/notes/create" class="text-white text-xl bg-blue-700 hover:bg-blue-800 rounded-lg text-lg px-5 py-2.5">New Note</a>
    </div>

    <div>
        @foreach ($notes as $note)
        <a href="/notes/{{ $note->id }}" class="flex flex-col border rounded-lg hover:border-white/75 border-white/25 mb-4 p-8 transition-colors duration-300">
            <h1 class="text-xl">
                <div class="space-y-3">
                    <h1 class="text-xl font-bold">{{ $note->title }}</h1>
                    <p class="text-sm">Created at: {{ $note->created_at }}</p>
                </div>
            </h1>
        </a>
        @endforeach
    </div>

    <div>
        {{ $notes->links() }}
    </div>
</x-layout>