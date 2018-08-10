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
            $table->string('url', 255)->nullable();
            $table->string('avatar', 255)->nullable();
            $table->longText('imageData')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('code')->unique()->nullable();
            $table->string('langCode')->nullable();
            $table->integer('price')->nullable();
            $table->integer('salePrice')->nullable();
            $table->integer('qty')->nullable();
            $table->text('summary')->nullable();
            $table->text('sizeData')->nullable();
            $table->longText('content')->nullable();
            $table->longText('note')->nullable();
            $table->integer('sort')->nullable();
            $table->enum('status', array('active', 'inActive'))->default('active');
            $table->string('titleSeo', 255)->nullable();
            $table->string('descriptionSeo', 255)->nullable();
            $table->string('tags', 255)->nullable();
            
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
