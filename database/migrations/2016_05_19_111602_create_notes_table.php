<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->integer('id');
            $table->string('name');
            $table->primary('id');
            $table->timestamps();
        });

        DB::table('notes')->insert(
            [
                ['id' => 0, 'name' => 'C'],
                ['id' => 1, 'name' => 'C#'],
                ['id' => 2, 'name' => 'D'],
                ['id' => 3, 'name' => 'D#'],
                ['id' => 4, 'name' => 'E'],
                ['id' => 5, 'name' => 'F'],
                ['id' => 6, 'name' => 'F#'],
                ['id' => 7, 'name' => 'G'],
                ['id' => 8, 'name' => 'G#'],
                ['id' => 9, 'name' => 'A'],
                ['id' => 10, 'name' => 'A#'],
                ['id' => 11, 'name' => 'B'],
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
        Schema::drop('notes');
    }
}
