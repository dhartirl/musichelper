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
                    'id' => 1,
                    'name' => 'Major',
                ],
                [
                    'id' => 2,
                    'name' => 'Natural Minor',
                ],
                [
                    'id' => 3,
                    'name' => 'Harmonic Minor',
                ],
                [
                    'id' => 4,
                    'name' => 'Melodic Minor',
                ],
                [
                    'id' => 5,
                    'name' => 'Ionian',
                ],
                [
                    'id' => 6,
                    'name' => 'Dorian',
                ],
                [
                    'id' => 7,
                    'name' => 'Phrygian',
                ],
                [
                    'id' => 8,
                    'name' => 'Lydian',
                ],
                [
                    'id' => 9,
                    'name' => 'Mixolydian',
                ],
                [
                    'id' => 10,
                    'name' => 'Aeolian',
                ],
                [
                    'id' => 11,
                    'name' => 'Locrian',
                ],
                [
                    'id' => 12,
                    'name' => 'Harmonic Minor',
                ],
                [
                    'id' => 13,
                    'name' => 'Locrian #6',
                ],
                [
                    'id' => 14,
                    'name' => 'Ionian #5',
                ],
                [
                    'id' => 15,
                    'name' => 'Dorian #4',
                ],
                [
                    'id' => 16,
                    'name' => 'Phrygian Dominant',
                ],
                [
                    'id' => 17,
                    'name' => 'Lydian #2',
                ],
                [
                    'id' => 18,
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
