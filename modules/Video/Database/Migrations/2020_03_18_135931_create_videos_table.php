<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name");
            $table->string("title")->nullable();
            $table->string("content")->nullable();
            $table->string("summary")->nullable();
            $table->string("price")->nullable();
            $table->string("sale_price")->nullable();
            $table->string("sale_price_datetime_start")->nullable();
            $table->string("sale_price_datetime_end")->nullable();
            $table->enum("video_type", ["Simple", "Bundled", "Grouped", "Playlist"])->default("Simple");
            $table->softDeletes();
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
        Schema::dropIfExists('videos');
    }
}
