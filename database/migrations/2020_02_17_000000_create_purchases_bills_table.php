<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases_bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('bill_number')->unique();
            $table->integer('quantity');
            $table->double('discount', 4, 2)->nullable();
            $table->double('tax', 4, 2)->nullable();
            $table->double('upstream_discount', 4, 2)->nullable();
            $table->double('cost_center', 4, 2)->nullable();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('suplier_id');
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
        Schema::dropIfExists('purchases_bills');
    }
}
