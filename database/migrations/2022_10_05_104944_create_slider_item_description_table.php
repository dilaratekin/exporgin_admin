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
        Schema::create('slider_item_description', function (Blueprint $table) {
            $table->id();
            $table->string('item_id');
            $table->string('lang');
            $table->string('image_url');
            $table->string('background_url');
            $table->string('thumb_url');
            $table->string('title');
            $table->string('content');
            $table->string('target_link');
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
        Schema::dropIfExists('slider_item_description');
    }
};
