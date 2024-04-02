<x-guest-layout>
    <form method="POST" action="{{ route('notes.store') }}">
        @csrf

        <!-- Title -->
        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required />
        </div>

        <!-- Content -->
        <div class="mt-4">
            <x-input-label for="content" :value="__('Content')" />
            <textarea class="form-control block mt-1 w-full" aria-label="With textarea" name="content"></textarea>
        </div>

        <!-- Status -->
        <div class="mt-4">
            <x-input-label for="status" :value="__('Status')" />
            <select name="status" id="">
                <option value="incomplete">Incomplete</option>
                <option value="complete">Complete</option>
            </select>
        </div>

        <!-- Share -->
        <div class="mt-4">
            <x-input-label for="share" :value="__('Shareable')" />
            <select name="share" id="">
                <option value=false>not allow</option>
                <option value=true>allow</option>
            </select>
        </div>
        
        <!-- Target Date -->
        <div class="mt-4">
            <x-input-label for="target" :value="__('Target Time')" />

            <x-text-input id="target" class="block mt-1 w-full"
                            type="date"
                            name="target" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Submit') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
