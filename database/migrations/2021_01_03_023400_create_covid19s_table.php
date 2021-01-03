<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCovid19sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('covid19s', function (Blueprint $table) {
            $table->id();
            $table->string('country');
            $table->string('country_code')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('city_code')->nullable();
            $table->string('lat')->nullable();
            $table->string('lon')->nullable();
            $table->unsignedInteger('confirmed')->nullable();
            $table->unsignedInteger('deaths')->nullable();
            $table->unsignedInteger('recovered')->nullable();
            $table->unsignedInteger('active')->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('covid19s');
    }
}
