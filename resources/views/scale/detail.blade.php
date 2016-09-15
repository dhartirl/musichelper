@extends('common.layout')
@section('head')
    <script type="text/javascript" src="/js/classes/builder.js"></script>
    <script type="text/javascript" src="/js/classes/chord.js"></script>
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
            $('#chordEditForm').on('submit', function() {
                var ind = parseInt($('#chordEditId').val());
                var inv = parseInt($('#chordEditInversion').val());
                var oct = parseInt($('#chordEditOctave').val());
                builder.progressionChords[ind].chordObject.inversion = inv;
                builder.progressionChords[ind].chordObject.octaveShift = oct;
                $('#modalFormInner').html("");
                $('.modalOverlay').addClass("is-hidden");
            });
        });
    </script>
@endsection

@section('forms')
    <form id="chordEditForm" class="modalForm" action="javascript:void(0);" method="post">
        <h3 class="modalFormHeader">Edit Chord</h3>
        <div id="modalFormInner"></div>
        <input type="submit" class="modalFormSubmit">
    </form>
@endsection

@section('content')
    <div class="progression progression-{{$scale->id}}">
        <div class="progression-title">@if ($root != null) {{$root->name}} @endif{{ $scale->name }}</div>
        <div class="note-options">
            <span class="notes-explain">View in:</span>
            <div class="notes-choices">
                @foreach ($allNotes as $note)
                    <a href="/scales/{{$scale->id}}/{{$note->id}}/" class="note-box note-{{$note->id}}">{{$note->name}}</a>
                @endforeach
            </div>
        </div>
        @if(count($activeNotes) > 0)
            @include('common.keyboard')
            @include('common.scaleControls')
        @endif
        <h2 class="section-title js-expandTitle">Intervals Table</h2>
        <table class="progression-intervals js-expandContent expandHidden">
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
        <h2 class="section-title js-expandTitle">Progression Builder</h2>
        <div class="progression-builder js-expandContent expandHidden">
            <div id="builder_selectors">
                <div id="interval_section"></div>
                <div id="chord_section"></div>
                <div id="chord_edit_section"></div>
            </div>
            <div id="builder_controls"><button id="add_button">Add Interval</button><button id="remove_button">Remove Interval</button><button id="play_button">Play</button></div>
        </div>
        <h2 class="section-title js-expandTitle">Chords in Scale</h2>
        <div class="related-items js-expandContent expandHidden">
            <div class="notes-choices">
                @foreach ($relatedChords as $chord)
                    <div class="note-box note-{{$chord['root']['id']}}">
                        @include('chord._preview', ['chord' => $chord])
                        <a class="noLink" href="/chords/{{$chord['id']}}/{{$chord['root']['id']}}/">{{$chord['root']['name']}}{!!$chord['notation_name']!!}</a>
                        <a class="noLink" href="javascript:void(0);" class="chord-play" onClick="playChord({{$chord['playData']}});">&#9654;</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
