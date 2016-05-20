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
            $table->increments('id');
            $table->integer('length');
            $table->string('name');
            $table->string('interval_notation');
            $table->unique('length');
            $table->timestamps();
        });

        DB::table('intervals')->insert(
            [
                [
                    'length' => 0,
                    'name' => 'root',
                    'interval_notation' => '',
                ],
                [
                    'length' => 1,
                    'name' => 'minor second',
                    'interval_notation' => 'h',
                ],
                [
                    'length' => 2,
                    'name' => 'major second',
                    'interval_notation' => 'W',
                ],
                [
                    'length' => 3,
                    'name' => 'minor third',
                    'interval_notation' => '(W + h)',
                ],
                [
                    'length' => 4,
                    'name' => 'major third',
                    'interval_notation' => '(W + W)',
                ],
                [
                    'length' => 5,
                    'name' => 'perfect fourth',
                    'interval_notation' => '(W + W + h)',
                ],
                [
                    'length' => 6,
                    'name' => 'tritone',
                    'interval_notation' => 'if you see this something is wrong',
                ],
                [
                    'length' => 7,
                    'name' => 'perfect fifth',
                    'interval_notation' => 'if you see this something is wrong',
                ],
                [
                    'length' => 8,
                    'name' => 'minor sixth',
                    'interval_notation' => 'if you see this something is wrong',
                ],
                [
                    'length' => 9,
                    'name' => 'major sixth',
                    'interval_notation' => 'if you see this something is wrong',
                ],
                [
                    'length' => 10,
                    'name' => 'minor seventh',
                    'interval_notation' => 'if you see this something is wrong',
                ],
                [
                    'length' => 11,
                    'name' => 'major seventh',
                    'interval_notation' => 'if you see this something is wrong',
                ],
                [
                    'length' => 12,
                    'name' => 'octave',
                    'interval_notation' => 'if you see this something is wrong',
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
