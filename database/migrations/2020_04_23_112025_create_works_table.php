<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->unsignedTinyInteger('type');
            $table->unsignedTinyInteger('category_id');
            // $table->unsignedTinyInteger('category');
            $table->unsignedInteger('max_price');
            $table->unsignedInteger('min_price');
            $table->text('content');
            $table->unsignedBigInteger('user_id');
            $table->boolean('is_closed')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('works');
    }
}
