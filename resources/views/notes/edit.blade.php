<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                @if($user == $note->user_id)
                    <form method="POST" action="{{ route('notes.update', ['note' => $note]) }}">
                        @csrf
                        @method("PUT")      
                        <div class="grid grid-cols-1 gap-6">
                            <label for="note_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Note Title</label>
                            <input type="text" name="title" id="note_title" class="form-input block w-full mt-1" placeholder="Enter note title" value="{{ old('title', $note->title) }}">

                            <label for="note_content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Note Content</label>
                            <textarea name="content" id="note_content" class="form-textarea block w-full mt-1" rows="3" placeholder="Enter note content">{{ old('content', $note->content) }}</textarea>
                            
                            <label for="note_status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                            <select name="status" id="note_status" class="form-select block w-full mt-1">
                                <option value="incomplete" {{ old('status', $note->status) == 'incomplete' ? 'selected' : '' }}>Incomplete</option>
                                <option value="complete" {{ old('status', $note->status) == 'complete' ? 'selected' : '' }}>Complete</option>
                            </select>
                            
                            <label for="note_share" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Share</label>
                            <select name="share" id="note_share" class="form-select block w-full mt-1">
                                <option value="false" {{ old('share', $note->share) == 'not allow' ? 'selected' : '' }}>Not Allow</option>
                                <option value="true" {{ old('share', $note->share) == 'allow' ? 'selected' : '' }}>Allow</option>
                            </select>
                            
                            <label for="note_start_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Start date</label>
                            <input type="date" name="target" id="note_start_date" class="form-input block w-full mt-1" value="{{ old('target', $note->target) }}">
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded">Update</button>
                        </div>
                    </form>
                    <form action="{{ route('notes.destroy', ['note' => $note->id]) }}" method="POST"        class="inline">
                        @csrf
                        @method('DELETE')
                        <x-danger-button class="ms-2">
                            Delete
                        </x-danger-button>
                    </form>
                @else
                    <p>Sorry: You are not Allowed...</p>
                @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
