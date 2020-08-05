<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('');
            $table->string('image')->nullable();
            $table->bigInteger('uid')->unsigned();
            $table->foreign('uid')->references('id')->on('users')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->longText('body');
            $table->boolean('public')->default(1);
            $table->boolean('index_seo')->default(true);
            $table->integer('viewcount')->default(0);
            $table->text('meta_title')->nullable();
            $table->text('keywords')->nullable();
            $table->text('mdescription')->nullable();
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
        Schema::dropIfExists('pages');
    }
}
