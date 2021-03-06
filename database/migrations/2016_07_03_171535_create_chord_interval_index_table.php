<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChordIntervalIndexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('chord_interval_index', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('chord');
             $table->integer('interval');
             $table->integer('index');
             $table->foreign('chord')->references('id')->on('chords');
             $table->foreign('interval')->references('length')->on('intervals');
         });

         $chords = array_merge(
             $this->createBaseChords()
         );
         DB::table('chord_interval_index')->insert($chords);
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('chord_interval_index');
    }

    private function createChordFromRelativeIntervalArray($intervals, $chordId) {
        $ret = [];
        $currentInterval = 0;
        // Append root note
        $intervals = array_merge([0], $intervals);
        for($i = 0; $i < count($intervals); $i++) {
            $ret[] = [
                'chord' => $chordId,
                'interval' => ($currentInterval + $intervals[$i]),
                'index' => $i,
            ];
            $currentInterval += $intervals[$i];
        }
        return $ret;
    }

    private function createBaseChords() {
        return array_merge(
            $this->createChordFromRelativeIntervalArray([4, 3], 1),
            $this->createChordFromRelativeIntervalArray([3, 4], 2),
            $this->createChordFromRelativeIntervalArray([7], 3),
            $this->createChordFromRelativeIntervalArray([4, 4], 4),
            $this->createChordFromRelativeIntervalArray([3, 3], 5),
            $this->createChordFromRelativeIntervalArray([4, 3, 4], 6),
            $this->createChordFromRelativeIntervalArray([3, 4, 3], 7),
            $this->createChordFromRelativeIntervalArray([4, 3, 3], 8),
            $this->createChordFromRelativeIntervalArray([6, 1], 9),
            $this->createChordFromRelativeIntervalArray([2, 5], 10),
            $this->createChordFromRelativeIntervalArray([4, 2, 4], 11),
            $this->createChordFromRelativeIntervalArray([4, 3, 2], 12),
            $this->createChordFromRelativeIntervalArray([3, 4, 2], 13),
            $this->createChordFromRelativeIntervalArray([4, 3, 4, 3], 14),
            $this->createChordFromRelativeIntervalArray([3, 4, 4, 2], 15),
            $this->createChordFromRelativeIntervalArray([3, 4, 3, 3], 16),
            $this->createChordFromRelativeIntervalArray([3, 4, 6], 17)
        );
    }
}
