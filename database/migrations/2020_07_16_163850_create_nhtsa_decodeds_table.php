<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhtsaDecodedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhtsa_decodeds', function (Blueprint $table) {
            $table->id();
            $table->string('clientIP')->nullable();
            $table->string('VIN')->nullable();
            $table->string('BodyCabType')->nullable();
            $table->string('BodyClass')->nullable();
            $table->string('DisplacementL')->nullable();
            $table->string('Doors')->nullable();
            $table->string('DriveType')->nullable();
            $table->string('EngineConfiguration')->nullable();
            $table->string('EngineCylinders')->nullable();
            $table->string('EngineHP')->nullable();
            $table->string('EngineModel')->nullable();
            $table->string('FuelTypePrimary')->nullable();
            $table->string('FuelTypeSecondary')->nullable();
            $table->string('GVWR')->nullable();
            $table->string('Make')->nullable();
            $table->string('Manufacturer')->nullable();
            $table->string('ManufacturerId')->nullable();
            $table->string('Model')->nullable();
            $table->string('ModelYear')->nullable();
            $table->string('NCSABodyType')->nullable();
            $table->string('NCSAMake')->nullable();
            $table->string('NCSAModel')->nullable();
            $table->string('PlantCity')->nullable();
            $table->string('PlantCountry')->nullable();
            $table->string('PlantState')->nullable();
            $table->string('Series')->nullable();
            $table->string('Series2')->nullable();
            $table->string('TransmissionSpeeds')->nullable();
            $table->string('TransmissionStyle')->nullable();
            $table->string('Trim')->nullable();
            $table->string('Trim2')->nullable();
            $table->string('Turbo')->nullable();
            $table->string('VehicleType')->nullable();
            $table->timestamps();
            // index(s)
            $table->index('VIN');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhtsa_decodeds');
    }
}
