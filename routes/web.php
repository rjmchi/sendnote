<?php

use App\Http\Controllers\NoteController;
use App\Models\Note;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');
    Route::get('/notes/create', [NoteController::class, 'create'])->name('notes.create');
});

Volt::route('notes/{note}/edit', 'notes.edit-note')->middleware('auth')->name('notes.edit');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::get('/note/{note}', function (Note $note) {
    if (! $note->is_published){
        abort(404);
    }
    $user = $note->user;
    return view('notes.view', ['note'=>$note, 'user'=>$user]);
})->name('notes.view');

require __DIR__.'/auth.php';
