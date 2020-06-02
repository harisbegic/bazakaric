<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('ime');
            $table->integer('promjer_id');
            $table->integer('duv_id');
            $table->integer('vrstaIzolacije_id');
            $table->integer('materijal_id');
            $table->integer('debljinaStjenke_id');
            $table->integer('lokacija_id');
            $table->integer('categoryChild_id');
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
        Schema::dropIfExists('products');
    }
}
