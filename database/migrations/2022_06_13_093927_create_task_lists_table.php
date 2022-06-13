<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('title', 250)->nullable();
            $table->string('dec', 700)->nullable();
            $table->string('date', 100)->nullable();
            $table->string('c_date', 100)->nullable();
            $table->tinyInteger('success_task')->default(0);

            $table->string('creator', 250)->nullable();
            $table->string('slug', 250)->nullable();
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
        Schema::dropIfExists('task_lists');
    }
}
