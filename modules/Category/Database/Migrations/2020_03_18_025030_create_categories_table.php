<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name");
            $table->string("title")->nullable();
            $table->string("description")->nullable();
            $table->string("seo_content")->nullable();
            $table->string("seo_title")->nullable();
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->integer("parent_id")->nullable();

            $table->foreign("admin_id")->references("id")->on("admins");
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('categoriesables', function (Blueprint $table) {
            $table->bigIncrements('category_id');
            $table->string("categoriesable_id");
            $table->string("categoriesable_type");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('categories');
        Schema::dropIfExists('categoriesables');
        Schema::enableForeignKeyConstraints();
    }
}
