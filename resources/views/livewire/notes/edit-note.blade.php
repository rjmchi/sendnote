<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use App\Models\Note;

new #[Layout('layouts.app')] class extends Component {

    public Note $note;
    public $title;
    public $body;
    public $recipient;
    public $send_date;

    public function mount(Note $note) {
        $this->authorize('update', $note);
        $this->fill($note);
    }

    public function save() {
        $validated = $this->validate([
            'title'=>['required', 'string'],
            'body'=>['required', 'string'],
            'recipient'=>['required', 'email'],
            'send_date'=>['required', 'date'],
        ]);

        $this->note->update($validated);

        redirect(route('notes.index'));
    }
}; ?>

<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Note') }}
        </h2>
    </x-slot>

    <div class="max-w-2xl p-3 mx-auto my-4 border border-teal-600 rounded">
        <form wire:submit='save' class="space-y-2">
            <x-input wire:model="title" label="Title"/>
            <x-textarea wire:model='body' label="Body" />
            <x-input icon='user' wire:model="recipient" label="Recipient" />
            <x-input icon="calendar" wire:model="send_date" label="Send Date" type="date" />

            <x-button right-icon="calendar" type="submit" class="mt-3" spinner>Schedule</x-button>
        </form>

    </div>
</div>
