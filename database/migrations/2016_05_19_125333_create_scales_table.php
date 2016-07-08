<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scales', function (Blueprint $table) {
            $table->integer('id');
            $table->string('name');
            $table->primary('id');
        });

        DB::table('scales')->insert(
            [
                [
                    'id' => 0,
                    'name' => 'Major',
                ],
                [
                    'id' => 1,
                    'name' => 'Natural Minor',
                ],
                [
                    'id' => 2,
                    'name' => 'Harmonic Minor',
                ],
                [
                    'id' => 3,
                    'name' => 'Melodic Minor',
                ],
                [
                    'id' => 4,
                    'name' => 'Ionian',
                ],
                [
                    'id' => 5,
                    'name' => 'Dorian',
                ],
                [
                    'id' => 6,
                    'name' => 'Phrygian',
                ],
                [
                    'id' => 7,
                    'name' => 'Lydian',
                ],
                [
                    'id' => 8,
                    'name' => 'Mixolydian',
                ],
                [
                    'id' => 9,
                    'name' => 'Aeolian',
                ],
                [
                    'id' => 10,
                    'name' => 'Locrian',
                ],
                [
                    'id' => 11,
                    'name' => 'Harmonic Minor',
                ],
                [
                    'id' => 12,
                    'name' => 'Locrian #6',
                ],
                [
                    'id' => 13,
                    'name' => 'Ionian #5',
                ],
                [
                    'id' => 14,
                    'name' => 'Dorian #4',
                ],
                [
                    'id' => 15,
                    'name' => 'Phrygian Dominant',
                ],
                [
                    'id' => 16,
                    'name' => 'Lydian #2',
                ],
                [
                    'id' => 17,
                    'name' => 'Superlocrian',
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
        Schema::drop('scales');
    }
}
