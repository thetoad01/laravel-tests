<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealerInspireVdpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealer_inspire_vdps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('vdp_url');
            $table->boolean('visited')->default(0);
            $table->string('http_response_code')->nullable();
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
        Schema::dropIfExists('dealer_inspire_vdps');
    }
}
