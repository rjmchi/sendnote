<?php

use Livewire\Volt\Component;
use App\Models\Note;

new class extends Component {
    public function delete($id) {
        $n = Note::findOrFail($id);

        $this->authorize('delete', $n);
        $n->delete();
    }

    public function with() {
        return [
            'notes'=> Auth::user()->notes()->orderBy('send_date', 'asc')->get(),
    ];
    }
    //
}; ?>

<div class="space-y-2">
    <div class="grid grid-cols-2 gap-5 mt-8">

    @foreach ($notes as $note)

    <x-card wire:key='{{$note->id}}' color="bg-white border border-indigo-200">
        <div class="flex justify-between p-2 mb-2 rounded bg-teal-50">
            <p class="text-2xl font-bold text-teal-800">
                <a href="{{route('notes.edit', $note)}}">{{$note->title}}</a>
            </p>
            <div>
                <p class="text-xs font-bold text-teal-800">{{\Carbon\Carbon::parse($note->send_date)->format('M-d-Y')}}</p>
                <div class="flex space-x-1"><x-icon name="heart" class="w-5 h-5" solid /><span>{{$note->heart_count}}</span></div>
            </div>
        </div>
        <div class="flex justify-between">
            <p>To: {{$note->recipient}}</p>
            <div>
                <x-button icon="eye"></x-button>
                <x-button icon="trash" wire:click="delete('{{$note->id}}')"></x-button>
            </div>
        </div>
            <p>{{$note->body}}</p>
    </x-card>
    @endforeach
</div>

</div>
