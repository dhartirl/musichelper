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
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        DB::table('scales')->insert(
            [
                [
                    'name' => 'Major',
                ],
                [
                    'name' => 'Natural Minor',
                ],
                [
                    'name' => 'Harmonic Minor',
                ],
                [
                    'name' => 'Melodic Minor',
                ],
                [
                    'name' => 'Ionian',
                ],
                [
                    'name' => 'Dorian',
                ],
                [
                    'name' => 'Phrygian',
                ],
                [
                    'name' => 'Lydian',
                ],
                [
                    'name' => 'Mixolydian',
                ],
                [
                    'name' => 'Aeolian',
                ],
                [
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
