<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use App\Chord;
use DB;

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
        $key = 'scale_'.$this->id.'_chords_'.$root;
        if($out = Cache::get($key) !== false) {
            $results = DB::select('
                select 
                    i.length as root_offset, 
                    n.name as root_name, 
                    c.id as chord_id, 
                    c.name as chord_name, 
                    c.notation_name as chord_n_name,
                    group_concat(((ci.interval + i.length) % 12) order by ci.index) as chord_notes
                from chords c
                inner join
                (
                    select chord, root_id, sum(s_int is null) as nulcount from
                        (
                        select 
                            cii.chord,
                            sii.scale,
                            sii.interval as s_int,
                            i.id as root_id
                        from chord_interval_index cii
                        inner join intervals i on 1
                        left join 
                            (
                                select * from scale_interval_index where scale = ?
                            ) sii 
                        on (cii.interval + i.length) % 12 = sii.interval % 12
                        inner join notes n on n.id = i.id
                        inner join chords c on c.id = cii.chord
                        ) src
                    group by chord, root_id
                ) chordmatch
                on c.id = chordmatch.chord
                inner join intervals i on i.id = chordmatch.root_id
                inner join notes n on n.id = i.id
                inner join chord_interval_index ci on ci.chord = c.id
                where chordmatch.nulcount = 0
                group by root_offset, chord_id
                order by root_offset, chord_id asc
            ', [$this->id]);
            $out = [];
            foreach($results as $result) {
                $cnotes = explode(',', $result->chord_notes);
                $cnotesfinal = [];
                foreach($cnotes as $note) {
                    $note = (int)$note;
                    $cnotesfinal[] = $this->noteToDetail($note);
                }
                $out[] = [
                    'id' => $result->chord_id,
                    'name' => $result->chord_name,
                    'notation_name' => $result->chord_n_name,
                    'root' => [
                        'id' => $result->root_offset,
                        'name' => $result->root_name
                    ],
                    'playData' => json_encode($cnotes),
                    'notes' => $cnotesfinal
                ];
            }
            Cache::put($key, $out, 3600);
        }
        return $out;
    }
    
    function noteToDetail($noteId) {
        $possibleNotes = [
            'C',
            'C#',
            'D',
            'D#',
            'E',
            'F',
            'F#',
            'G',
            'G#',
            'A',
            'A#',
            'B'
        ];
        return [
            'id' => $noteId,
            'name' => $possibleNotes[(int)$noteId]
        ];
    }
}
