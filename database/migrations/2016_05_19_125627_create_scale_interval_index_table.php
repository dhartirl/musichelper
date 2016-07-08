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
            $table->integer('scale');
            $table->integer('interval');
            $table->integer('index');
            $table->foreign('scale')->references('id')->on('scales');
            $table->foreign('interval')->references('length')->on('intervals');
        });

        $scales = array_merge(
            $this->createBaseScales(),
            $this->createBaseModes(),
            $this->createHarmonicModes()
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
                'interval' => $currentInterval + $intervals[$i],
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
            $this->createScaleFromRelativeIntervalArray([2, 2, 1, 2, 2, 2, 1], 0),
            $this->createScaleFromRelativeIntervalArray([2, 1, 2, 2, 1, 2, 2], 1),
            $this->createScaleFromRelativeIntervalArray([2, 1, 2, 2, 1, 3, 1], 2),
            $this->createScaleFromRelativeIntervalArray([2, 1, 2, 2, 2, 2, 1], 3)
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
        $startIndex = 4;
        for($i = 0; $i < 7; $i++) {
            $ret = array_merge($ret, $this->createScaleFromRelativeIntervalArray($this->createModeFromScale($baseScale, $i), $startIndex));
            $startIndex++;
        }
        return $ret;
    }

    private function createHarmonicModes() {
        $baseScale = [2, 1, 2, 2, 1, 3, 1];
        $ret = [];
        $startIndex = 11;
        for($i = 0; $i < 7; $i++) {
            $ret = array_merge($ret, $this->createScaleFromRelativeIntervalArray($this->createModeFromScale($baseScale, $i), $startIndex));
            $startIndex++;
        }
        return $ret;
    }
}
