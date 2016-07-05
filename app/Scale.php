<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use App\Chord;

class Scale extends Model
{
    public function intervals() {
        return $this->belongsToMany('App\Interval', 'scale_interval_index', 'scale', 'interval');
    }
    
    public function notes($root) {
        $intervals = $this->intervals()->get();
        $notes = [];
        foreach($intervals as $interval) {
            $note = ($root + $interval->length) % 12;
            $notes[] = Note::find($note);
        }
        return $notes;
    }
    
    public function chords($root = null) {
        if($root == null) {
            return [];
        }
        $intervals = $this->notes($root);
        $chords = Chord::all();
        $validChords = [];
        foreach($intervals as $interval) {
            foreach($chords as $chord) {
                $notes = $chord->notes($interval);
                $chordIsInScale = false;
                $baseNote = null;
                foreach($notes as $note) {
                    if($baseNote === null) {
                        $baseNote = $note;
                    }
                    if(in_array($note, $intervals)) {
                        $chordIsInScale = true;
                    } else {
                        $chordIsInScale = false;
                        break;
                    }
                }
                if($chordIsInScale) {
                    $jsonData = json_encode(array_map(create_function('$o', 'return $o->id;'), $notes));
                    $outNotes = array_map(create_function('$o', 'return ["id" => $o->id, "name" => $o->name];'), $notes);
                    $validChords[] = [
                        'root' => Note::find(($baseNote->id) % 12),
                        'chord' => $chord,
                        'jsonData' => $jsonData,
                        'notes' => $outNotes
                    ];
                }
            }
        }
        return $validChords;
    }
}
