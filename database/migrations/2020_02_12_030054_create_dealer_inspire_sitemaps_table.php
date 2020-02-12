<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealerInspireSitemapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealer_inspire_sitemaps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sitemap_url')->unique();
            $table->string('state')->nullable();
            $table->string('http_response_code')->nullable();
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
        Schema::dropIfExists('dealer_inspire_sitemaps');
    }
}
