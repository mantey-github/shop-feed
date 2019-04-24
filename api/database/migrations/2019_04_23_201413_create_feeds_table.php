<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('feeds')) {
            Schema::create('feeds', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('product_name');
                $table->string('product_brand');
                $table->float('product_pricing')->default(0.00);
                $table->string('channel', 20);
                $table->string('product_currency', 10)->default('GHS');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feeds');
    }
}
