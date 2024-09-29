<?php

use Livewire\Volt\Component;

new class extends Component {
    public function with() {
        return [
            'notesSentCount' =>
                Auth::user()
                ->notes()
                ->where('send_date', '<', now('America/Chicago'))
                ->where('is_published', true)
                ->count(),
            'notesHeartCount'=>Auth::user()->notes->sum('heart_count'),
    ];
    }
}; ?>

<div class="flex space-x-2">
    <p class="p-10 text-xl font-bold text-teal-900 rounded-lg bg-teal-50">Notes Sent: {{$notesSentCount}}</p>
    <p class="p-10 text-xl font-bold text-teal-900 rounded-lg bg-teal-50">Note Hearts: {{$notesHeartCount}}</p>
</div>
