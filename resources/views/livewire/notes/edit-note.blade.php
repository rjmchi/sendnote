<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use App\Models\Note;

new #[Layout('layouts.app')] class extends Component {

    public Note $note;

    public function mount(Note $note) {
        $this->authorize('update', $note);
        $this->fill($note);
    }
}; ?>

<div class="p-4 m-3 border border-teal-800 rounded">
    <h1>Edit Note</h1>

    <div class="">
        <p>{{$note->id}}</p>
        <p>{{$note->title}}</p>
        <p>{{$note->body}}</p>
        <p>{{$note->recipient}}</p>

    </div>

</div>
