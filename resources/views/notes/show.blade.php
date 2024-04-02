<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Note Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                @if($user == $note->user_id || $note->share == 'true')
                    <div>
                        <p><strong>Title:</strong> {{ $note->title }}</p>
                        <p><strong>Content:</strong> {{ $note->content }}</p>
                        <p><strong>Target Date:</strong> {{ $note->target }}</p>
                        <p><strong>Status:</strong> {{ ucfirst($note->status) }}</p>
                        <p><strong>Share:</strong> {{ $note->share == 'true' ? 'Allowed' : 'Not Allowed' }}</p>
                        <a href="{{ route('notes.edit', ['note' => $note->id]) }}">
                            <button class="bg-green-500 text-white px-3 py-1 rounded">Edit</button>
                        </a>
                        <form action="{{ route('notes.destroy', ['note' => $note->id]) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <x-danger-button class="ms-2">
                                Delete
                            </x-danger-button>
                        </form>
                    </div>
                @else
                    <h3>Not Have Permission</h3>
                @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
