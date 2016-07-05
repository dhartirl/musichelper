<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chords', function (Blueprint $table) {
            $table->integer('id');
            $table->string('name');
            $table->string('short_name');
            $table->string('notation_name');
            $table->primary('id');
        });

        DB::table('chords')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'Major',
                    'short_name' => 'Maj',
                    'notation_name' => '',
                ],
                [
                    'id' => 2,
                    'name' => 'Minor',
                    'short_name' => 'min',
                    'notation_name' => 'm',
                ],
                [
                    'id' => 3,
                    'name' => 'Fifth',
                    'short_name' => '5',
                    'notation_name' => '5',
                ],
                [
                    'id' => 4,
                    'name' => 'Augmented',
                    'short_name' => 'aug',
                    'notation_name' => '&#8314',
                ],
                [
                    'id' => 5,
                    'name' => 'Diminished',
                    'short_name' => 'dim',
                    'notation_name' => '&#176;',
                ],
                [
                    'id' => 6,
                    'name' => 'Major Seventh',
                    'short_name' => 'Maj&#8311;',
                    'notation_name' => 'Δ&#8311;',
                ],
                [
                    'id' => 7,
                    'name' => 'Minor Seventh',
                    'short_name' => 'min&#8311;',
                    'notation_name' => 'm&#8311;',
                ],
                [
                    'id' => 8,
                    'name' => 'Dominant Seventh',
                    'short_name' => 'dom7',
                    'notation_name' => '&#8311;',
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
        Schema::drop('chords');
    }
}
