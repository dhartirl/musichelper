@extends('common.layout')
@section('head')
    <script type="text/javascript" src="/js/builder.js"></script>
    <script type="text/javascript">
        var builder;
        $(document).ready(function() {
            builder = new Builder({!!$builder['chords']!!}, {!!$builder['scale']!!}, {!!$builder['root']!!}, {!!$builder['intervals']!!});
            builder.draw();
            $('body').on('change', '.interval-selector', function() {
                builder.setProgression($('.interval-selector').map(function(){return parseInt(this.value)}).get());
            });
            $('body').on('change', '.chord-selector', function() {
                builder.setChords($('.chord-selector').map(function(){return parseInt(this.value)}).get());
            });
            $('#builder_controls').on('click', '#play_button', function() {
                builder.play(1.5);
            });
            $('#builder_controls').on('click', '#add_button', function() {
                builder.addInterval();
            });
            $('#builder_controls').on('click', '#remove_button', function() {
                builder.removeInterval();
            });
        });
    </script>
@endsection
@section('content')
    <div class="progression progression-{{$scale->id}}">
        <div class="progression-title">@if ($root != null) {{$root->name}} @endif{{ $scale->name }}</div>
        @if(count($activeNotes) > 0)
            @include('common.keyboard')
            @include('common.scaleControls')
        @endif
        <div class="progression-builder">
            <div id="interval_section"></div>
            <div id="chord_section"></div>
            <div id="builder_controls"><button id="add_button">Add Interval</button><button id="remove_button">Remove Interval</button><button id="play_button">Play</button></div>
        </div>
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
        <span class="notes-explain">View this scale in the key of:</span>
        <div class="notes-choices">
            @foreach ($allNotes as $note)
                <a href="/scales/{{$scale->id}}/{{$note->id}}/" class="note-box note-{{$note->id}}">{{$note->name}}</a>
            @endforeach
        </div>
    </div>
    <div class="related-items">
        <span class="related-explain">Chords in this scale:</span>
        <div class="notes-choices">
            @foreach ($relatedChords as $chord)
                <div class="note-box note-{{$chord['root']->id}}">
                    @include('chord._preview', ['chord' => $chord])
                    <a class="noLink" href="/chords/{{$chord['chord']->id}}/{{$chord['root']->id}}/">{{$chord['root']->name}}{!!$chord['chord']->notation_name!!}</a>
                    <a class="noLink" href="javascript:void(0);" class="chord-play" onClick="playChord({{$chord['jsonData']}});">&#9654;</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
