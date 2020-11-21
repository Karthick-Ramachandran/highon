<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecondCompletesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('second_completes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->text('skills')->nullable();
            $table->string('notice')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('waist')->nullable();
            $table->string('shoe')->nullable();
            $table->text('address')->nullable();
            $table->text('mailing_add')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('passport')->nullable();
            $table->text('copy')->nullable();
            $table->text('photo')->nullable();
            $table->boolean('is_completed')->default(0);
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
        Schema::dropIfExists('second_completes');
    }
}
