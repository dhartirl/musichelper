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
            $table->increments('id');
            $table->string('name');
            $table->string('short_name');
            $table->string('notation_name');
            $table->timestamps();
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
                    'notation_name' => '^+^',
                ],
                [
                    'id' => 5,
                    'name' => 'Diminished',
                    'short_name' => 'dim',
                    'notation_name' => '^o^',
                ],
                [
                    'id' => 6,
                    'name' => 'Major Seventh',
                    'short_name' => 'Maj^7^',
                    'notation_name' => 'Δ^7^',
                ],
                [
                    'id' => 7,
                    'name' => 'Minor Seventh',
                    'short_name' => 'min^7^',
                    'notation_name' => 'm^7^',
                ],
                [
                    'id' => 8,
                    'name' => 'Dominant Seventh',
                    'short_name' => 'dom7',
                    'notation_name' => '^7^',
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
