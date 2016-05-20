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
            $table->timestamps();
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
