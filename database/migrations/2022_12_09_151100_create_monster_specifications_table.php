<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonsterSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monster_specifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('monster_id');
            $table->unsignedBigInteger('specification_id');
            $table->string('value');
            $table->timestamps();
            $table->foreign('monster_id')->references('id')->on('monsters');
            $table->foreign('specification_id')->references('id')->on('specifications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monster_specifications');
    }
}
