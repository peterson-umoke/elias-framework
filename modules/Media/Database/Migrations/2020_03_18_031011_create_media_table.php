<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText("file");
            $table->string("name");
            $table->string("title")->nullable();
            $table->string("description")->nullable();
            $table->string("seo_title")->nullable();
            $table->string("seo_content")->nullable();
            $table->string("type")->nullable();
            $table->string("mediaable_id");
            $table->string("mediaable_type");
            $table->boolean("is_private");
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
        Schema::dropIfExists('medias');
    }
}
