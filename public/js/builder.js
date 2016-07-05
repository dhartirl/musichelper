var Builder = function(chords, scale, root, intervals) {
  this.allChords = chords;
  this.scale = scale;
  this.root = root;
  this.intervals = [];
  var context = this;
  intervals.forEach(function(interval, index) {
    var arrInterval = {
      note: {},
      availableChords: []
    };
    chords.forEach(function(chord) {
      if((interval.length + root.id) % 12 == chord.root.id) {
        arrInterval.note = chord.root;
        arrInterval.availableChords.push({
          name: chord.root.name + chord.chord.notation_name,
          notes: chord.notes,
          playData: chord.jsonData
        });
      }
    });
    context.intervals.push(arrInterval);
  });
  this.setProgression([1, 4, 5, 1], false);
  this.setChords([0, 0, 0, 0]);
};

Builder.prototype.setProgression = function(progression, redraw = true) {
  for (var i = 0; i < progression.length; i++) {
    progression[i]--;
  }
  this.progression = progression;
  if(redraw) this.draw();
};

Builder.prototype.setChords = function(chordIds) {
  var self = this;
  var updatedChords = [];
  chordIds.forEach(function(chordId, index) {
    updatedChords.push(self.intervals[self.progression[index]].availableChords[chordId]);
  });
  this.progressionChords = updatedChords;
};

Builder.prototype.play = function(noteLength = 1) {
  var delay = 0;
  this.progressionChords.forEach(function(item) {
    playChord(item.notes.map(function(note){return note.id}), 48, delay, noteLength);
    delay += noteLength;
  });
}

Builder.prototype.addInterval = function() {
  this.progression.push(0);
  var self = this;
  var temp = this.progressionChords.map(function(chord, index){return self.intervals[self.progression[index]].availableChords.indexOf(chord)});
  temp.push(0);
  this.setChords(temp);
  this.draw();
};

Builder.prototype.removeInterval = function() {
  if(this.progression.length < 2) return false;
  this.progression.pop();
  this.progressionChords.pop();
  this.draw();
};

Builder.prototype.getIntervalSelectorHTML = function() {
  var retHtml = '';
  var self = this;
  this.progression.forEach(function(item, index) {
    retHtml += '<select class="interval-selector" id="interval_' + index + '">';
    self.intervals.forEach(function(interval, intervalIndex) {
      retHtml += '<option value="' + (intervalIndex + 1) + '" ' + ((item == intervalIndex) ? 'selected="selected"': '') + '>' + (intervalIndex + 1) + '</option>';
    });
    retHtml += '</select>';
  });
  return retHtml;
};

Builder.prototype.getChordSelectorHTML = function() {
  var retHtml = '';
  var self = this;
  this.progression.forEach(function(item, index) {
    interval = self.intervals[item];
    retHtml += '<select class="chord-selector" id="chord_' + index + '">';
    interval.availableChords.forEach(function(chord, chordIndex) {
      retHtml += '<option value="' + chordIndex + '" ' + ((self.progressionChords[index] == interval.availableChords[chordIndex]) ? 'selected="selected"': '') +'>' + chord.name + '</option>';
    });
    retHtml += '</select>';
  });
  return retHtml;
};

Builder.prototype.draw = function() {
  $('#interval_section').html(builder.getIntervalSelectorHTML());
  $('#chord_section').html(builder.getChordSelectorHTML());
};
