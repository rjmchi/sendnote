<?php

use Livewire\Volt\Component;

new class extends Component {
    public $title;
    public $body;
    public $recipient;
    public $send_date;

    public function submit() {
        $validated = $this->validate([
            'title'=>['required', 'string'],
            'body'=>['required', 'string'],
            'recipient'=>['required', 'email'],
            'send_date'=>['required', 'date'],
        ]);

        $n = auth()->user()->notes()->create($validated);

        redirect(route('notes.index'));
    }
}; ?>

<div class="max-w-2xl p-3 mx-auto my-4 border border-teal-600 rounded">
    <form wire:submit='submit' class="space-y-2">
        <x-input wire:model="title" label="Title" />
        <x-textarea wire:model='body' label="Body" />
        <x-input icon='user' wire:model="recipient" label="Recipient" />
        <x-input icon="calendar" wire:model="send_date" label="Send Date" type="date" />

        <x-button right-icon="calendar" type="submit" class="mt-3" spinner>Schedule</x-button>
    </form>
</div>

