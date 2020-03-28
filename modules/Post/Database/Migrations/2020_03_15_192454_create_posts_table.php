<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name");
            $table->string("title");
            $table->string("content")->nullable();
            $table->string("seo_content")->nullable();
            $table->string("seo_title")->nullable();
            $table->boolean("is_private")->default(0);
            $table->unsignedBigInteger("admin_id")->nullable();
            $table->softDeletes();

            $table->foreign("admin_id")->references("id")->on("admins");
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
        Schema::dropIfExists('posts');
    }
}
