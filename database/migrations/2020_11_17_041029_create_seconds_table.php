<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecondsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seconds', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->string('firstName');
            $table->string('lastName')->nullable();
            $table->string('surname')->nullable();
            $table->string('dob');
            $table->string('age');
            $table->string('sex');
            $table->string('nationality');
            $table->string('qualification');
            $table->boolean('exp');
            $table->boolean('is_completed')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seconds');
    }
}
