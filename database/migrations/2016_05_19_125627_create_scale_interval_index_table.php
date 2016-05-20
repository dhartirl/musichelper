<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScaleIntervalIndexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('scale_interval_index', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('scale', false, true);
            $table->integer('interval');
            $table->integer('index');
            $table->foreign('scale')->references('id')->on('scales');
            $table->foreign('interval')->references('length')->on('intervals');
            $table->timestamps();
        });

        $scales = array_merge(
            $this->createBaseScales(),
            $this->createBaseModes()
        );
        DB::table('scale_interval_index')->insert($scales);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('scale_interval_index');
    }

    private function createScaleFromRelativeIntervalArray($intervals, $scaleId) {
        $ret = [];
        $currentInterval = 0;
        // Append root note
        $intervals = array_merge([0], $intervals);
        for($i = 0; $i < count($intervals) - 1; $i++) {
            $ret[] = [
                'scale' => $scaleId,
                'interval' => $currentInterval + $intervals[$i] + 1, // (+1 added for 0-1 offset on length vs id)
                'index' => $i,
            ];
            $currentInterval += $intervals[$i];
        }
        $totalIntervals = $currentInterval + $intervals[count($intervals) - 1];
        if ($totalIntervals != 12) {
            echo("WARNING: Invalid/Incomplete scale " . $scaleId . " contains " . $totalIntervals . " semitones!!");
        }
        return $ret;
    }

    private function createBaseScales() {
        return array_merge(
            $this->createScaleFromRelativeIntervalArray([2, 2, 1, 2, 2, 2, 1], 1),
            $this->createScaleFromRelativeIntervalArray([2, 1, 2, 2, 1, 2, 2], 2),
            $this->createScaleFromRelativeIntervalArray([2, 1, 2, 2, 1, 3, 1], 3),
            $this->createScaleFromRelativeIntervalArray([2, 1, 2, 2, 2, 2, 1], 4)
        );
    }

    private function createModeFromScale($scale, $offset) {
        for($i = 0; $i < $offset; $i++) {
            array_push($scale, array_shift($scale));
        }
        return $scale;
    }

    private function createBaseModes() {
        $baseScale = [2, 2, 1, 2, 2, 2, 1];
        $ret = [];
        $startIndex = 5;
        for($i = 0; $i < 7; $i++) {
            $ret = array_merge($ret, $this->createScaleFromRelativeIntervalArray($this->createModeFromScale($baseScale, $i), $startIndex));
            $startIndex++;
        }
        return $ret;
    }
}
