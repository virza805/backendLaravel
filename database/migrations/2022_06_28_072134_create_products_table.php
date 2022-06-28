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
            $table->integer('user_id')->nullable();
            $table->integer('category_id')->nullable();
            // $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('tag')->nullable();
            $table->string('image')->nullable();
            $table->float('price')->nullable();
            $table->float('sell_price')->nullable();
            $table->string('stock')->default(1);
            $table->integer('status')->default(1);
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
