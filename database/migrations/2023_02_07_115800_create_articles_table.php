<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('adminId')->constrained('admins')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('categoryId')->constrained('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->string('title');
            $table->string('image');
            $table->text('content');
            $table->integer('read_estimation');
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
        Schema::dropIfExists('articles');
    }
}
