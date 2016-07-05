<?php

namespace App\Http\Controllers;

use App\Chord;
use App\Note;
use Illuminate\Http\Request;

use App\Http\Requests;

class ChordController extends Controller
{

    function index() {
        $chords = Chord::all();

        return view('chord.index', ['chords' => $chords]);
    }

    function detail($chordId, $rootNoteId = null) {
        $chord = Chord::find($chordId);
        $intervals = $chord->intervals()->orderBy('index')->get();
        $allNotes = Note::all();
        
        $activeNotesArr = [];
        
        if($rootNoteId != null) {
            foreach($intervals as $interval) {
                $note = Note::find(($rootNoteId + $interval->length) % 12);
                $interval['note'] = $note;
                $activeNotesArr[] = $note->id;
            }

            $root = Note::find($rootNoteId);
        }

        return view('chord.detail', ['chord' => $chord, 'intervals' => $intervals, 'root' => (isset($root) ? $root : null), 'allNotes' => $allNotes, 'activeNotes' => $activeNotesArr]);
    }
}
