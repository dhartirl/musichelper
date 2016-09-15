function playScale(scale, octaveBegin = 48, delay = 0) {
    var lastNote = 0;
    if (scale.length < 8) {
        scale.push(scale[0]);
    }
    scale.forEach(function(note) {
        note += octaveBegin;
        if (note < lastNote) note += 12;
        lastNote = note;
        delay++;
        var velocity = 127; // how hard the note hits
        // play the note
        MIDI.setVolume(0, 127);
        MIDI.noteOn(0, note, velocity, delay);
        MIDI.noteOff(0, note, delay + 0.75);
    });
}

function noteToObject(noteId) {
    var allNotes = [
      "C",
      "C#",
      "D",
      "D#",
      "E",
      "F",
      "F#",
      "G",
      "G#",
      "A",
      "A#",
      "B"
    ];
    
    return {
      'id': noteId,
      'name': allNotes[noteId]
    };
}

function playChord(chord, octaveBegin = 48, delay = 0, noteLength = 1) {
    var lastNote = 0;
    chord.forEach(function(note) {
        note = parseInt(note);
        note += octaveBegin;
        if (note < lastNote) note += 12;
        lastNote = note;
        var velocity = 127; // how hard the note hits
        // play the note
        MIDI.setVolume(0, 127);
        MIDI.noteOn(0, note, velocity, delay);
        MIDI.noteOff(0, note, delay + noteLength);
    });
}
window.onload = function() {
    MIDI.loadPlugin({
        soundfontUrl: "/soundfont/",
        instrument: "acoustic_guitar_nylon",
        onprogress: function(state, progress) {
        },
        onsuccess: function() {
            MIDI.programChange(0, MIDI.GM.byName["acoustic_guitar_nylon"].number);
            window.noteOnCallback = function(note) {
                document.querySelector(".KeyboardLayout-key.key-" + (note % 12)).classList.add('is-playing');
                window.setTimeout(
                    "document.querySelector('.KeyboardLayout-key.key-" + (note % 12) + "').classList.remove('is-playing')",
                    750
                );
            };
            document.querySelector('.loadingNotify').innerHTML = "Note: First play may be out of order";
            document.querySelector('.playButton').classList.remove('is-hidden');
        }
    });
    $('body').on('click', '.js-expandTitle', function(event) {
        $(this).next('.js-expandContent').toggleClass('expandHidden');
    });
    $('body').on('input', '.rangeSelf', function(event) {
        $(this).next('.rangeVal').text(this.value);
    });
};
