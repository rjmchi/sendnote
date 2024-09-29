<x-guest-layout>

<div class="p-4 border rounded bg-teal-50 border-teal-50">
    <h2 class="text-xl font-semibold leading-tight text-teal-800">
        {{$note->title}}
    </h2>

    <p class="mt-2">{{$note->body}}</p>
    <div class="flex items-center justify-end mt-12 space-x-2">
        <h3 class="mr-3 text-sm">Sent from {{$user->name}}</h3>
        <livewire:heartreact :note="$note" />
    </div>
</div>

</x-guest-layout>