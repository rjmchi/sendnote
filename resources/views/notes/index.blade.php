<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('My Notes') }}
        </h2>
    </x-slot>

    <div class="py-4">

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 py-2">
                    <div class="flex justify-between">
                        <span class="text-xl font-bold text-teal-900">{{ __("Here are your notes") }}</span>
                        <x-button right-icon="plus" href="{{route('notes.create')}}" wire:navigate>Create a Note</x-button>
                    </div>

                    <livewire:notes.show-notes lazy />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>