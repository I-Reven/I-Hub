<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreatePartnersProductsFeaturesTable
 */
class CreatePartnersProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners_products', function (Blueprint $table) {
            $table->id();
            $table->timestamp('licence_expire_at');
            $table->unsignedBigInteger('product_id')->nullable(true);
            $table->unsignedBigInteger('partner_id')->nullable(true);
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('partner_id')->references('id')->on('partners');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partners_products');
    }
}
