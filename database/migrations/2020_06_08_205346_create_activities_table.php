<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('calories_burned')->nullable();
            $table->integer('steps')->nullable();
            $table->float('distance', 10, 2)->nullable();
            $table->integer('floors')->nullable();
            $table->integer('minutes_sedentary')->nullable();
            $table->integer('minutes_lightly_active')->nullable();
            $table->integer('minutes_fairly_active')->nullable();
            $table->integer('minutes_very_active')->nullable();
            $table->integer('activity_calories')->nullable();
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
