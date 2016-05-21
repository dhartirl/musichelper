<div class="KeyboardLayout">
    @foreach ($allNotes as $note)
    <div class="KeyboardLayout-key key-{{$note->id}} {{strpos($note->name, '#') > 0 ? 'key-sharp' : ''}} {{in_array($note->id, $activeNotes) ? 'key-active' : ''}} {{$note->id == $root->id ? 'key-root' : ''}}">
        <div class="KeyboardLayout-key-internal"></div>
    </div>
    @endforeach
</div> 
