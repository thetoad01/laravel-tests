<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealerInspireVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealer_inspire_vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dealer')->nullable();
            $table->string('url')->nullable();
            $table->string('vin')->nullable();
            $table->string('year')->nullable();
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->string('trim')->nullable();
            $table->string('name')->nullable();
            $table->string('exterior_color')->nullable();
            $table->string('interior_color')->nullable();
            $table->string('stock_number')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('dealer_inspire_vehicles');
    }
}
