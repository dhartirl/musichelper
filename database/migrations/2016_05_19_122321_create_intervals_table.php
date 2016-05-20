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
                    'id' => 1,
                    'length' => 0,
                    'name' => 'root',
                    'interval_notation' => '',
                ],
                [
                    'id' => 2,
                    'length' => 1,
                    'name' => 'minor second',
                    'interval_notation' => 'h',
                ],
                [
                    'id' => 3,
                    'length' => 2,
                    'name' => 'major second',
                    'interval_notation' => 'W',
                ],
                [
                    'id' => 4,
                    'length' => 3,
                    'name' => 'minor third',
                    'interval_notation' => '(W + h)',
                ],
                [
                    'id' => 5,
                    'length' => 4,
                    'name' => 'major third',
                    'interval_notation' => '(W + W)',
                ],
                [
                    'id' => 6,
                    'length' => 5,
                    'name' => 'perfect fourth',
                    'interval_notation' => '(W + W + h)',
                ],
                [
                    'id' => 7,
                    'length' => 6,
                    'name' => 'tritone',
                    'interval_notation' => 'if you see this something is wrong',
                ],
                [
                    'id' => 8,
                    'length' => 7,
                    'name' => 'perfect fifth',
                    'interval_notation' => 'if you see this something is wrong',
                ],
                [
                    'id' => 9,
                    'length' => 8,
                    'name' => 'minor sixth',
                    'interval_notation' => 'if you see this something is wrong',
                ],
                [
                    'id' => 10,
                    'length' => 9,
                    'name' => 'major sixth',
                    'interval_notation' => 'if you see this something is wrong',
                ],
                [
                    'id' => 11,
                    'length' => 10,
                    'name' => 'minor seventh',
                    'interval_notation' => 'if you see this something is wrong',
                ],
                [
                    'id' => 12,
                    'length' => 11,
                    'name' => 'major seventh',
                    'interval_notation' => 'if you see this something is wrong',
                ],
                [
                    'id' => 13,
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
