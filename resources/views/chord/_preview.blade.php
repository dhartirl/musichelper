<div class="ChordPreview">
    <div class="ChordPreview-notes">
        @foreach ($chord['notes'] as $note)
            <span class="note-box note-{{$note['id']}}">{!!$note['name']!!}</span>
        @endforeach
    </div>
    <div class="ChordPreview-label">{{$chord['root']['name']}} {{$chord['name']}}</div>
</div>
