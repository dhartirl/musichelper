<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntervalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intervals', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('length');
            $table->string('name');
            $table->string('interval_notation');
            $table->primary('id');
            $table->unique('length');
            $table->timestamps();
        });

        DB::table('intervals')->insert(
            [
                [
                    'id' => 0,
                    'length' => 0,
                    'name' => 'root',
                    'interval_notation' => '',
                ],
                [
                    'id' => 1,
                    'length' => 1,
                    'name' => 'minor second',
                    'interval_notation' => 'h',
                ],
                [
                    'id' => 2,
                    'length' => 2,
                    'name' => 'major second',
                    'interval_notation' => 'W',
                ],
                [
                    'id' => 3,
                    'length' => 3,
                    'name' => 'minor third',
                    'interval_notation' => '(W + h)',
                ],
                [
                    'id' => 4,
                    'length' => 4,
                    'name' => 'major third',
                    'interval_notation' => '(W + W)',
                ],
                [
                    'id' => 5,
                    'length' => 5,
                    'name' => 'perfect fourth',
                    'interval_notation' => '(W + W + h)',
                ],
                [
                    'id' => 6,
                    'length' => 6,
                    'name' => 'tritone',
                    'interval_notation' => 'if you see this something is wrong',
                ],
                [
                    'id' => 7,
                    'length' => 7,
                    'name' => 'perfect fifth',
                    'interval_notation' => 'if you see this something is wrong',
                ],
                [
                    'id' => 8,
                    'length' => 8,
                    'name' => 'minor sixth',
                    'interval_notation' => 'if you see this something is wrong',
                ],
                [
                    'id' => 9,
                    'length' => 9,
                    'name' => 'major sixth',
                    'interval_notation' => 'if you see this something is wrong',
                ],
                [
                    'id' => 10,
                    'length' => 10,
                    'name' => 'minor seventh',
                    'interval_notation' => 'if you see this something is wrong',
                ],
                [
                    'id' => 11,
                    'length' => 11,
                    'name' => 'major seventh',
                    'interval_notation' => 'if you see this something is wrong',
                ],
                [
                    'id' => 12,
                    'length' => 12,
                    'name' => 'octave',
                    'interval_notation' => '',
                ],
                [
                    'id' => 13,
                    'length' => 13,
                    'name' => 'minor ninth',
                    'interval_notation' => '',
                ],
                [
                    'id' => 14,
                    'length' => 14,
                    'name' => 'major ninth',
                    'interval_notation' => '',
                ],
                [
                    'id' => 15,
                    'length' => 15,
                    'name' => 'minor tenth',
                    'interval_notation' => '',
                ],
                [
                    'id' => 16,
                    'length' => 16,
                    'name' => 'major tenth',
                    'interval_notation' => '',
                ],
                [
                    'id' => 17,
                    'length' => 17,
                    'name' => 'perfect eleventh',
                    'interval_notation' => '',
                ],
                [
                    'id' => 18,
                    'length' => 18,
                    'name' => 'tritone +1',
                    'interval_notation' => '',
                ],
                [
                    'id' => 19,
                    'length' => 19,
                    'name' => 'perfect twlefth (tritave)',
                    'interval_notation' => '',
                ],
                [
                    'id' => 20,
                    'length' => 20,
                    'name' => 'minor thirteenth',
                    'interval_notation' => '',
                ],
                [
                    'id' => 21,
                    'length' => 21,
                    'name' => 'major thirteenth',
                    'interval_notation' => '',
                ],
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('intervals');
    }
}
