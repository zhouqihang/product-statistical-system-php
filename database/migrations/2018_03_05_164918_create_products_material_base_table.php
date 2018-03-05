<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsMaterialBaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_material_base', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('material_id');
            $table->double('material', 10, 3)->default(0.00);
            $table->string('string')->nullable();
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
        Schema::dropIfExists('products_material_base');
    }
}
