<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Note;

class Chord extends Model
{
    public function intervals() {
        return $this->belongsToMany('App\Interval', 'chord_interval_index', 'chord', 'interval');
    }
    
    public function notes($root) {
        $intervals = $this->intervals()->get();
        $notes = [];
        foreach($intervals as $interval) {
            $note = ($root->id + $interval->length) % 12;
            $notes[] = Note::find($note);
        }
        return $notes;
    }
}
