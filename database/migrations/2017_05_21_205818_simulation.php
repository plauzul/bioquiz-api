<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Simulation extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('simulations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('proof_id');
            $table->text('question');
            $table->text('a');
            $table->text('b');
            $table->text('c');
            $table->text('d');
            $table->string('correct');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('simulations');
    }
}
