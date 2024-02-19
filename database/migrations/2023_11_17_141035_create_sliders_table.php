<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('plain_key');
            $table->text('desc')->nullable();
            $table->tinyInteger('status');
            $table->timestamps();
        });

        Schema::create('slider_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('slider_id');
            $table->string('title');
            $table->text('link');
            $table->tinyInteger('position');
            $table->text('image');
            $table->text('mobile_image');
            $table->timestamps();
            $table->foreign('slider_id')->references('id')->on('sliders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
        Schema::dropIfExists('slider_items');
    }
};
