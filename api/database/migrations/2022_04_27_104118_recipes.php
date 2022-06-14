<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoryId')->references('id')->on('categories');
            $table->foreignId('userId')->references('id')->on('users');
            $table->string('title');
            $table->date('createdDate');
            $table->text('recipeHTML');
            $table->string('imageFile');
            $table->string('fileName');
            $table->string('description');
            $table->string('serves');
            $table->string('cookTime');
            $table->string('prepTime');
            $table->string('difficulty');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
};
