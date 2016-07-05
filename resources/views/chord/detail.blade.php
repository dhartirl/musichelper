@extends('common.layout')
@section('content')
    <div class="progression progression-{{$chord->id}}">
        <div class="progression-title">@if ($root != null) {{$root->name}} @endif{{ $chord->name }}</div>
        @if(count($activeNotes) > 0)
            @include('common.keyboard')
            @include('common.chordControls')
        @endif
        <table class="progression-intervals">
        @foreach ($intervals as $interval)
            <tr class="progression-interval">
                <th class="interval-length">{{$interval->length}}</th>
                @if ($interval->note != null)
                <td class="interval-note note-{{$interval->note->id}}">{{$interval->note->name}}</td>
                @endif
                <td class="interval-name">{{$interval->name}}</td>
            </tr>
        @endforeach
        </table>
    </div>
    <div class="note-options">
        <span class="notes-explain">View this chord in:</span>
        <div class="notes-choices">
            @foreach ($allNotes as $note)
                <a href="/chords/{{$chord->id}}/{{$note->id}}/" class="note-box note-{{$note->id}}">{{$note->name}}</a>
            @endforeach
        </div>
    </div>
@endsection
