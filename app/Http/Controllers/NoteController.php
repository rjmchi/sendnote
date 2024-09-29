<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('notes/index',  ['notes'=>Note::all()]);}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notes/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        die('here');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        //
    }

    public function today() {
        // dd(now('America/Chicago'));

        $now = Carbon::now();
// dd ($now->toDateString());
        $notes = Note::where('is_published', true)
            ->where('send_date', $now->toDateString())
            ->get();

        dd($notes[0]->user->email);
    }
}
