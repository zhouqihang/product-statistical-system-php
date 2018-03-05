<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('material_number')->default('')->unique()->nullable();
            $table->string('material_title')->default('')->unique()->nullable();
            $table->string('material_unit');
            $table->double('material_danger', 10, 3)->default(0.00)->unsigned();
            $table->double('material_count', 10, 3)->default(0.00);
            $table->string('material_remark')->default('')->nullable();
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
        Schema::dropIfExists('materials');
    }
}
