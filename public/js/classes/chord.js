var Chord = function(notes, scaleRoot = 0) {
  tempNotes = [];
  notes.forEach(function(item) {
    tempNotes.push(noteToObject(item));
  });
  this.scaleRoot = scaleRoot;
  this.notes = tempNotes;
  this.octaveShift = 0;
  this.inversion = 0;
  this.noteLength = 1;
  if (scaleRoot > this.notes[0].id) {
    this.octaveShift++;
  }
};

Chord.prototype.play = function(delay = 0) {
  var lastNote = 0;
  for(var i = this.inversion; i < (this.notes.length + this.inversion); i++) {
    note = this.notes[i % this.notes.length].id;
    note += 48;
    note += (this.octaveShift * 12);
    if (note < lastNote) note += 12;
    lastNote = note;
    var velocity = 127;
    MIDI.setVolume(0, 127);
    MIDI.noteOn(0, note, velocity, delay);
    MIDI.noteOff(0, note, delay + this.noteLength);
  }
};

Chord.prototype.shiftOctave = function(offset) {
  var newOffset = this.octaveShift + offset;
  if(newOffset > -3 && newOffset < 4) {
    this.octaveShift = newOffset;
    return true;
  } else {
    return false;
  }
};

Chord.prototype.edit = function(intervalId) {
  outHtml = '<input type="hidden" id="chordEditId" name="chordId" value="' + intervalId + '">' +
            '<div class="inputWrap"><label for="inversion">Inversion</label><input type="range" id="chordEditInversion" class="rangeSelf" name="inversion" value="' + this.inversion + '" min="0" max="' + (this.notes.length - 1) + '"><span class="rangeVal">' + this.inversion + '</span></div>' +
            '<div class="inputWrap"><label for="octaveShift">Octave Offset</label><input type="range" id="chordEditOctave" class="rangeSelf" name="octaveShift" value="' + this.octaveShift + '" min="-3" max="4"><span class="rangeVal">' + this.octaveShift + '</span></div>';
  $('#modalFormInner').html(outHtml);
  $('.modalOverlay').removeClass('is-hidden');
};

Chord.prototype.clone = function() {
    return new Chord(this.notes.map(function(n){return n.id}), this.scaleRoot);
};
