var Chord = function(notes) {
  this.notes = notes;
  this.octaveShift = 0;
  this.inversion = 0;
  this.noteLength = 1;
};

Chord.prototype.play = function() {
  var lastNote = 0;
  var delay = 0;
  for(var i = this.inversion; i < this.notes.length + this.inversion; i++) {
    note = this.notes[i % this.notes.length];
    note += 48;
    note += (this.octaveShift * 12);
    if (note < lastNote) note += 12;
    lastNote = note;
    var velocity = 127; // how hard the note hits
    // play the note
    MIDI.setVolume(0, 127);
    MIDI.noteOn(0, note, velocity, delay);
    MIDI.noteOff(0, note, delay + this.noteLength);
  }
}
