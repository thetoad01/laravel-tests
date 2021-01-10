<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAscsvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('ascsvs', function (Blueprint $table) {
            $table->id();
            $table->string('dealer_id')->nullable();
            $table->string('dealer_name')->nullable();
            $table->string('vin')->nullable();
            $table->string('stock_number')->nullable();
            $table->string('new_used')->nullable();
            $table->string('year')->nullable();
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->string('model_number')->nullable();
            $table->string('body')->nullable();
            $table->string('transmission')->nullable();
            $table->string('series')->nullable();
            $table->string('body_door_count')->nullable();
            $table->string('odometer')->nullable();
            $table->string('engine_cylinder_ct')->nullable();
            $table->string('engine_displacement')->nullable();
            $table->string('drivetrain_description')->nullable();
            $table->string('colour')->nullable();
            $table->string('interior_color')->nullable();
            $table->string('msrp')->nullable();
            $table->string('price')->nullable();
            $table->string('inventory_date')->nullable();
            $table->string('certified')->nullable();
            $table->text('description')->nullable();
            $table->text('features')->nullable();
            $table->text('photo_url_list')->nullable();
            $table->string('city_mpg')->nullable();
            $table->string('highway_mpg')->nullable();
            $table->string('photos_last_modified_date')->nullable();
            $table->string('series_detail')->nullable();
            $table->string('engine')->nullable();
            $table->string('fuel')->nullable();
            $table->string('age')->nullable();
            $table->string('vehicle_detail_link')->nullable();
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
        Schema::connection('mysql')->dropIfExists('ascsvs');
    }
}
