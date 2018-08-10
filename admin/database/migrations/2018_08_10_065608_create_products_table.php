<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name', 255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->integer('category_id')->nullable();
            $table->string('code')->unique();
            $table->string('lang_code')->nullable();
            $table->integer('price')->nullable();
            $table->integer('sale_price')->nullable();
            $table->integer('qty')->nullable();
            $table->text('summary')->nullable();
            $table->longText('content')->nullable();
            $table->longText('note')->nullable();
            $table->enum('status', array('active', 'inActive'))->default('active');
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
