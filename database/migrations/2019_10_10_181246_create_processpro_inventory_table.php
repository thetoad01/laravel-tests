<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcessproInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('pgsql')->create('processpro_inventory', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('newtech_store_number');
            $table->string('vin')->nullable();
            $table->string('stock_number')->nullable();
            $table->json('vehicle')->nullable();
            $table->timestamps();
            //index(s)
            $table->primary('id');
            $table->index('newtech_store_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('pgsql')->dropIfExists('processpro_inventory');
    }
}
