<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFooterTopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer_tops', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('icon_img', 300)->nullable();
            $table->string('title', 250)->nullable();
            $table->string('dec', 250)->nullable();

            $table->string('creator', 250)->nullable();
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
        Schema::dropIfExists('footer_tops');
    }
}
