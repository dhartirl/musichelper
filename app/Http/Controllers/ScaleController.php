<?php

namespace App\Http\Controllers;

use App\Scale;
use App\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use App\Http\Requests;

class ScaleController extends Controller
{

    function index() {
        $scales = Scale::all();

        return view('scale.index', ['scales' => $scales]);
    }

    function detail($scaleId, $rootNoteId = null) {
        $key = 'scale_detail_'.$scaleId.'_'.$rootNoteId;
        if(!($retData = Cache::get($key))) {
            $scale = Scale::find($scaleId);
            $chords = $scale->chords($rootNoteId);
            $intervals = $scale->intervals()->orderBy('index')->get();
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
            
            $retData = [
                'scale' => $scale, 
                'intervals' => $intervals, 
                'root' => (isset($root) ? $root : null), 
                'allNotes' => $allNotes, 
                'activeNotes' => $activeNotesArr, 
                'relatedChords' => $chords,
                'builder' => $this->builderData($scale, $chords, $intervals, $rootNoteId)
            ];
            Cache::put($key, $retData, 3600);
        }
        return view('scale.detail', $retData);
    }
    
    function builderData($scale, $chords, $intervals, $rootNoteId) {
        return [
            'root' => json_encode(Note::find($rootNoteId)),
            'scale' => json_encode($scale),
            'chords' => json_encode($chords),
            'intervals' => json_encode($intervals)
        ];
    }
}
