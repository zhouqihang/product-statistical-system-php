<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsMaterialsRealTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_materials_real', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('task_info_id')->unsigned();
            $table->integer('material_id')->unsigned();
            $table->double('material', 10, 3)->default(0.00);
            $table->string('remark')->nullable()->default('');
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
        Schema::dropIfExists('products_materials_real');
    }
}
