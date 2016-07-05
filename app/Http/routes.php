<?php
use App\Http\Controllers\ScaleController;
use App\Http\Controllers\ChordController;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/scales', function (ScaleController $scale) {
    return $scale->index();
});

Route::get('/scales/{scale_id}/{root_note?}', function (ScaleController $scale, $scaleId, $rootNote = null) {
    return $scale->detail($scaleId, $rootNote);
});

Route::get('/chords', function (ChordController $chord) {
    return $chord->index();
});

Route::get('/chords/{chord_id}/{root_note?}', function (ChordController $chord, $chordId, $rootNote = null) {
    return $chord->detail($chordId, $rootNote);
});
