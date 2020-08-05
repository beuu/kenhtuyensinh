<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('title')->default('');
            $table->string('image')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('keysword')->nullable();
            $table->text('mdescription')->nullable();
            $table->longText('description')->nullable();
            $table->longText('body')->nullable();
            $table->boolean('public')->default(1);
            $table->bigInteger('pid')->default(0);
            $table->boolean('index_seo')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
