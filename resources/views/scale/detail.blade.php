@extends('common.layout')
@section('content')
    <div class="scale scale-{{$scale->id}}">
        <div class="scale-title">@if ($root != null) {{$root->name}} @endif{{ $scale->name }}</div>
        @if(count($activeNotes) > 0)
            @include('common.keyboard')
            @include('common.scaleControls')
        @endif
        <table class="scale-intervals">
        @foreach ($intervals as $interval)
            <tr class="scale-interval">
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
        <span class="notes-explain">View this scale in the key of:</span>
        <div class="notes-choices">
            @foreach ($allNotes as $note)
                <a href="/scales/{{$scale->id}}/{{$note->id}}" class="note-box note-{{$note->id}}">{{$note->name}}</a>
            @endforeach
        </div>
    </div>
@endsection
