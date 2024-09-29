<?php

namespace App\Jobs;

use App\Models\Note;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Note $note)
    {

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $noteUrl = config('app.url').'/note/'.$this->note->id;
        $emailContent = "Hello, you've received a new note.  View it here: {$noteUrl}";
        Mail::raw($emailContent, function ($message){
            $message
                ->from('info@sendnotes.org', 'SendNotes')
                ->to($this->note->recipient)
                ->subject('you have a new note from '. $this->note->user->name);
        });
    }
}
