<?php

namespace App\Http\Controllers;

use App\Scale;
use App\Note;
use Illuminate\Http\Request;

use App\Http\Requests;

class ScaleController extends Controller
{

    function index() {
        $scales = Scale::all();

        return view('scale.index', ['scales' => $scales]);
    }

    function detail($scaleId, $rootNoteId = null) {
        $scale = Scale::find($scaleId);
        $intervals = $scale->intervals()->orderBy('index')->get();
        $allNotes = Note::all();

        if($rootNoteId != null) {
            foreach($intervals as $interval) {
                $note = Note::find(($rootNoteId + $interval->length) % 12);
                $interval['note'] = $note;
            }

            $root = Note::find($rootNoteId);
        }

        return view('scale.detail', ['scale' => $scale, 'intervals' => $intervals, 'root' => (isset($root) ? $root : null), 'allNotes' => $allNotes]);
    }
}
