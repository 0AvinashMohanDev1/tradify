<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('notes.create')" :active="request()->routeIs('dashboard')">
                        {{ __('Create Notes') }}
                    </x-nav-link>
                </div>
                <div class="hidden sm:flex sm:items-center lg:ms-25">
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Sr. No.</th>
                                    <th class="px-4 py-2">Id</th>
                                    <th class="px-4 py-2">Title</th>
                                    <th class="px-4 py-2">Content</th>
                                    <th class="px-4 py-2">Status</th>
                                    <th class="px-4 py-2">Target</th>
                                    <th class="px-4 py-2">Share</th>
                                    <th class="px-4 py-2">Edit</th>
                                    <th class="px-4 py-2">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($notes as $note)
                                <tr>
                                    <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="border px-4 py-2"><a href="{{route('notes.show',['note'=>$note])}}">{{$note->id}}</a></td>
                                    <td class="border px-4 py-2">{{$note->title}}</td>


                                    <td class="border px-4 py-2">{{strlen($note->content)>15 ? substr($note->content,0,10). '...':$note->content}}</td>
                                    <td class="border px-4 py-2">{{$note->status}}</td>
                                    <td class="border px-4 py-2">{{$note->target}}</td>
                                    <td class="border px-4 py-2">
                                        <select id="shareSelect">
                                            <option value="true" {{ $note->share == 'true' ? 'selected' : '' }}>Shared</option>
                                            <option value="false" {{ $note->share == 'false' ? 'selected' : '' }}>Not Shared</option>
                                        </select>
                                        <button type="button" onclick="copyToClipboard('{{$note->id}}', '{{ $note->title }}', '{{ $note->content }}', '{{ $note->status }}','{{$note->target}}','{{$note->share}}')" class="bg-blue-500 text-white px-3 py-1 rounded">Copy Link</button>
                                    </td>
                                    <td class="border px-4 py-2"><a href="{{route('notes.edit',['note'=>$note])}}"><button class="bg-green-500 text-white px-3 py-1 rounded">Edit</button></a></td>
                                    <td class="border px-4 py-2">
                                        <form action="{{route('notes.destroy', ['note' => $note])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button class="ms-2">
                                            Delete
                                            </x-danger-button>
                                        </form>                                        
                                    </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
<script>
     function copyToClipboard(id,title, content, status, target, shared) {
        console.log(shared);
        if (shared=='true') {
            var baseUrl = window.location.origin; // Get the base URL
            var noteDetails = `${baseUrl}/notes/${id}`;
            var textarea = document.createElement('textarea');
            textarea.value = noteDetails;
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand('copy');
            document.body.removeChild(textarea);
            alert("Content copied to clipboard!");
        } else {
            alert("This note is not shareable.");
        }
    }
// Title: ${title}\nContent: ${content}\nStatus: ${status}\nShare: Shared\nTarget: ${target}\nUrl:
</script>
